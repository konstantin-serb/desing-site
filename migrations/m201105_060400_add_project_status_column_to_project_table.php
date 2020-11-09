<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%project}}`.
 */
class m201105_060400_add_project_status_column_to_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%project}}', 'project_status', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%project}}', 'project_status');
    }
}
