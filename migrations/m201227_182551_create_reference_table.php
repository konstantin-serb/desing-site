<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reference}}`.
 */
class m201227_182551_create_reference_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reference}}', [
            'id' => $this->primaryKey(),
            'assignment_id' => $this->integer(),
            'type' => $this->integer(),
            'sort' => $this->integer(),
            'date_create' => $this->integer(),
            'date_update' => $this->integer(),
            'image' => $this->string(),
            'full_image' => $this->string(),
            'description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reference}}');
    }
}
