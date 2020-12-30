<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%characteristics_templates}}`.
 */
class m210103_051326_create_characteristics_templates_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%characteristics_templates}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%characteristics_templates}}');
    }
}
