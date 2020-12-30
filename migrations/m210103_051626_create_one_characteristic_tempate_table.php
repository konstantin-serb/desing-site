<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%one_characteristic_tempate}}`.
 */
class m210103_051626_create_one_characteristic_tempate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%one_characteristic_tempate}}', [
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
        $this->dropTable('{{%one_characteristic_tempate}}');
    }
}
