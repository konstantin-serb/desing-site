<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project}}`.
 */
class m201105_054209_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->string(),
            'nameProject' => $this->string(),
            'date_start' => $this->string(),
            'customer' => $this->integer(),
            'length' => $this->integer(),
            'area' => $this->float(),
            'city' => $this->integer(),
            'image' => $this->string(),
            'price_digital' => $this->integer(),
            'price_words' => $this->string(),
            'currency' => $this->integer(),
            'price_p1' => $this->float(),
            'price_p2' => $this->float(),
            'price_p3' => $this->float(),
            'price_p4' => $this->float(),
            'price_p5' => $this->float(),
            'status' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%project}}');
    }
}
