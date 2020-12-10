<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m201003_062845_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'user_name' => $this->string(),
            'last_name' => $this->string(),
            'surname' => $this->string(),
            'hash' => $this->string(),
            'create_at' => $this->integer(),
            'register_date' => $this->integer(),
            'status' => $this->integer(),
            'rating' => $this->integer(),
            'position' => $this->integer(),
            'avatar' => $this->string(),
            'info' => $this->text(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-employee-user_id}}',
            '{{%employee}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-employee-user_id}}',
            '{{%employee}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-employee-user_id}}',
            '{{%employee}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-employee-user_id}}',
            '{{%employee}}'
        );

        $this->dropTable('{{%employee}}');
    }
}
