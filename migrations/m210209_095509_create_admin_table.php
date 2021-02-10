<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%admin}}`.
 */
class m210209_095509_create_admin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%admin}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'surname' => $this->string(),
            'username' => $this->string(),
            'last_name' => $this->string(),
            'status' => $this->integer(),
            'avatar' => $this->string(),
            'mini' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%admin}}');
    }
}
