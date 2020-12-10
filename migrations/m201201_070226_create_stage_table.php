<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%stage}}`.
 */
class m201201_070226_create_stage_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%stage}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer(),
            'number' => $this->integer(),
            'title' => $this->string(),
            'start' => $this->string(),
            'length' => $this->integer(),
            'date_create' => $this->integer(),
            'date_update' => $this->integer(),
            'status' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%stage}}');
    }
}
