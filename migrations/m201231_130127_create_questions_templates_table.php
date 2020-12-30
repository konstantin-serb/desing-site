<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%questions_templates}}`.
 */
class m201231_130127_create_questions_templates_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%questions_templates}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'type' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%questions_templates}}');
    }
}
