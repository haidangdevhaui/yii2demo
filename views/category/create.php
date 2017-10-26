<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<div class="col-xs-offset-3 col-xs-6">
	<h4>category/<?= isset($categoryId) ?'update by ID = '.$categoryId : 'create' ?></h4>
	<?= Html::a('<i class="glyphicon glyphicon-list-alt"></i> List category', Url::to(['category/index']), ['class' => 'btn btn-success', 'style' => 'margin-bottom: 10px']) ?>
	<?php $form = ActiveForm::begin(['id' => 'create-category-form']); ?>

        <?= $form->field($model, 'name')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'create-category-button']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
