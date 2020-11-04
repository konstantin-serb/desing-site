<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%calendar}}`.
 */
class m201028_050200_add_month_column_to_calendar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%calendar}}', 'month', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%calendar}}', 'month');
    }
}
