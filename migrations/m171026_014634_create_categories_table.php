<?php

use yii\db\Migration;

/**
 * Handles the creation of table `categories`.
 */
class m171026_014634_create_categories_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('categories', [
            'id'         => $this->primaryKey(),
            'name'       => $this->string()->notNull(),
            'deleted_at' => $this->dateTime(),
            'created_at' => $this->dateTime(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('categories');
    }
}
