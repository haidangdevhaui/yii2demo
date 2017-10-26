<?php

namespace app\controllers;

use app\models\Category;
use Yii;
use yii\data\Pagination;

class CategoryController extends \yii\web\Controller
{
    /**
     * action index category
     * @return render
     */
    public function actionIndex()
    {
        $query      = Category::find();
        $count      = $query->count();
        // configure pagination
        $pagination = new Pagination([
            'totalCount' => $count,
            'pageSize'   => 10,
        ]);
        $categories = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('index', compact('categories', 'pagination'));
    }

    /**
     * action create category
     * @return render
     */
    public function actionCreate()
    {
        $categoryId = Yii::$app->request->get('category_id');
        if ($categoryId) {
            $model = Category::findOne($categoryId);
        } else {
            $model = new Category;
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            return $this->redirect(['index']);
        }
        return $this->render('create', compact('model', 'categoryId'));
    }

    /**
     * action create category
     * @return render
     */
    public function actionDelete()
    {
        $categoryId = Yii::$app->request->get('category_id');
        Category::findOne($categoryId)->softDelete();
        return $this->redirect(['index']);
    }

    /**
     * before action hook
     * @param  object $action
     * @return parent
     */
    public function beforeAction($action)
    {
    	// set layout /views/layout/custom.php
        $this->layout = 'custom';
        return parent::beforeAction($action);
    }
}
