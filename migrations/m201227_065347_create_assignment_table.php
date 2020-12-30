<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%assignment}}`.
 */
class m201227_065347_create_assignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%assignment}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer(),
            'address' => $this->string(),
            'customer' => $this->string(),
            'description' => $this->text(),
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
        $this->dropTable('{{%assignment}}');
    }
}
