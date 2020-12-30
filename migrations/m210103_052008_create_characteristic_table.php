<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%characteristic}}`.
 */
class m210103_052008_create_characteristic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%characteristic}}', [
            'id' => $this->primaryKey(),
            'assignment_id' => $this->integer(),
            'sort' => $this->integer(),
            'question' => $this->string(),
            'description' => $this->text(),
            'answer' => $this->text(),
            'answer_person' => $this->integer(),
            'time_create' => $this->integer(),
            'time_update' => $this->integer(),
            'status' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%characteristic}}');
    }
}
