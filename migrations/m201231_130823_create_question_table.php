<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%question}}`.
 */
class m201231_130823_create_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%question}}', [
            'id' => $this->primaryKey(),
            'assignment_id' => $this->integer(),
            'question' => $this->string(),
            'description' => $this->text(),
            'answer' => $this->text(),
            'sort' => $this->integer(),
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
        $this->dropTable('{{%question}}');
    }
}
