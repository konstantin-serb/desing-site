<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%calendar}}`.
 */
class m201028_050033_add_type_holiday_column_to_calendar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%calendar}}', 'type_holiday', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%calendar}}', 'type_holiday');
    }
}
