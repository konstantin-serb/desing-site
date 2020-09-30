<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%employee}}`.
 */
class m201003_073123_drop_position_column_from_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%employee}}', 'position');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%employee}}', 'position', $this->string());
    }
}
