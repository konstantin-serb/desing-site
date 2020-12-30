<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%one_question_template}}`.
 */
class m201231_130530_create_one_question_template_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%one_question_template}}', [
            'id' => $this->primaryKey(),
            'template_id' => $this->integer(),
            'question' => $this->string(),
            'description' => $this->text(),
            'sort' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%one_question_template}}');
    }
}
