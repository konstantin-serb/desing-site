<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%calendar}}`.
 */
class m201027_044603_add_week_day_column_to_calendar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%calendar}}', 'week_day', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%calendar}}', 'week_day');
    }
}
