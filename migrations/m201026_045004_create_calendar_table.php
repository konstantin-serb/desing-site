<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%calendar}}`.
 */
class m201026_045004_create_calendar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%calendar}}', [
            'id' => $this->primaryKey(),
            'number_day' => $this->integer(),
            'year' => $this->integer(),
            'day' => $this->string(),
            'month' => $this->integer(),
            'holiday' => $this->integer(),
            'description' => $this->text(),
            'week_day' => $this->integer(),
            'type_holiday' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%calendar}}');
    }
}
