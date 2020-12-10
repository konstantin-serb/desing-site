<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contracts}}`.
 */
class m201222_081720_create_contracts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contracts}}', [
            'id' => $this->primaryKey(),
            'projectId' => $this->integer(),
            'sort' => $this->integer(),
            'title' => $this->string(),
            'content' => $this->text(),
            'customer' => $this->string(),
            'date_create' => $this->integer(),
            'date_update' => $this->integer(),
            'executor_info' => $this->text(),
            'area' => $this->integer(),
            'address' => $this->string(),
            'price_numeral' => $this->integer(),
            'parts' => $this->integer(),
            'price_words' => $this->string(),
            'price_p1' => $this->float(),
            'price_p2' => $this->float(),
            'price_p3' => $this->float(),
            'price_p4' => $this->float(),
            'price_p5' => $this->float(),
            'result1' => $this->float(),
            'result2' => $this->float(),
            'result3' => $this->float(),
            'result4' => $this->float(),
            'result5' => $this->float(),
            'length' => $this->integer(),
            'customer_info' => $this->text(),
            'executor_organization' => $this->string(),
            'executor_director' => $this->string(),
            'contract_nom' => $this->string(),
            'contract_city' => $this->string(),
            'contract_date' => $this->string(),
            'contract_start' => $this->string(),
            'currency' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contracts}}');
    }
}
