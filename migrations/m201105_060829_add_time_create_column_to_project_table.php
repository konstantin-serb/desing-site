<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%project}}`.
 */
class m201105_060829_add_time_create_column_to_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%project}}', 'time_create', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%project}}', 'time_create');
    }
}
