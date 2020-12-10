<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%template_contract}}`.
 */
class m201215_150544_create_template_contract_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%template_contract}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'picture' => $this->string(),
            'content' => $this->text(),
            'date_create' => $this->integer(),
            'date_update' => $this->integer(),
            'status' => $this->integer(),
            'executor' => $this->text(),
            'description' => $this->text(),
            'executorOrganization' => $this->string(),
            'executorDirector' => $this->string(),
            'contractCity' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%template_contract}}');
    }
}
