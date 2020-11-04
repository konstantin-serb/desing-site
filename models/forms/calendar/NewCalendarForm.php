<?php

namespace app\models\forms\calendar;

use app\models\Calendar;

class NewCalendarForm
{
    public $year;
    public $number_day;
    public $day;
    public $holiday;
    public $description;
    public $week_day;


    public function rules()
    {
        return [
            [['year', 'number_day', 'day', 'holiday', 'week_day'], 'required'],
            [['year', 'number_day', 'holiday', 'week_day'], 'integer'],
            [['description'], 'string'],
        ];
    }

    public function creat($year)
    {
        $check = Calendar::find()->where(['year' => $year])->one();
        if (!$check) {
            $day = gregoriantojd(1, 1, $year);

            $dayTime = strtotime(jdtogregorian($day));
            $date = date('L', $dayTime);

            if($date == 1) {
                $maxDay = 366;
            } else {
                $maxDay = 365;
            }

            for($i=0; $i<$maxDay; $i++)
            {
                $calendar = new Calendar();
                $yearDay = $day + $i;
                $new = jdtogregorian($yearDay);
                $array = explode('/',$new);
                $newformat = strtotime($new);

                $calendar->year = $array[2];
                $calendar->day = $array[1];
                $calendar->week_day = date('w', $newformat);
                $calendar->number_day  = $yearDay;
                $calendar->month = $array[0];
                $calendar->save();
            }

           return true;
        }
        return true;
    }


    public function createHoliday($code)
    {
        if ($code == 'su') {
            $this->cleanHoliday();
            $array = Calendar::find()->where(['week_day' => 0])->all();
            foreach ($array as $item) {
                $item->type_holiday = '0';
                $item->holiday = '1';
                $item->save();
            }
        }

        if ($code == 'sa-su') {
            $this->cleanHoliday();
            $array = Calendar::find()->where(['week_day' => [6,0]])->all();
            foreach ($array as $item) {
                $item->type_holiday = 2;
                $item->holiday = 1;
                $item->save();
            }
        }

        return true;

    }

    public function cleanHoliday()
    {
        $array = Calendar::find()->where(['week_day' => [0,6]])->all();

        foreach($array as $item) {
            $item->holiday = null;
            $item->type_holiday = null;
            $item->save();
        }
        return true;
    }


}