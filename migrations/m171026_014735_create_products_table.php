<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m171026_014735_create_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('products', [
            'id'          => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'name'        => $this->string(50)->notNull()->unique(),
            'image'       => $this->text(),
            'deleted_at'  => $this->dateTime(),
            'created_at'  => $this->dateTime(),
        ]);

        // create index
        $this->createIndex(
            'idx-products-category_id',
            'products',
            'category_id'
        );

        // add foreign key for table `categories`
        $this->addForeignKey(
            'fk-products-category_id',
            'products',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('products');
    }
}
