<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lukash}}`.
 */
class m210115_170821_create_lukash_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lukash}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'date' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lukash}}');
    }
}
