<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%assignment_comments}}`.
 */
class m210206_193015_create_assignment_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%assignment_comments}}', [
            'id' => $this->primaryKey(),
            'parents_id' => $this->integer(),
            'project_id' => $this->integer(),
            'comment' => $this->text(),
            'commentator_id' => $this->integer(),
            'user_type' => $this->string(),
            'path_type' => $this->integer(),
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
        $this->dropTable('{{%assignment_comments}}');
    }
}
