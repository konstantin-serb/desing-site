<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calendar".
 *
 * @property int $id
 * @property int|null $number_day
 * @property int|null $year
 * @property string|null $day
 * @property int|null $holiday
 * @property string|null $description
 * @property int|null $week_day
 * @property int|null $type_holiday
 * @property int|null $month
 */
class Calendar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendar';
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number_day' => 'Number Day',
            'year' => 'Year',
            'day' => 'Day',
            'holiday' => 'Holiday',
            'description' => 'Description',
            'week_day' => 'Week Day',
            'type_holiday' => 'Type Holiday',
            'month' => 'Month',
        ];
    }
}
