<?php


namespace app\modules\admin\controllers;

use app\components\AdminBase;
use app\models\Calendar;
use app\models\forms\calendar\NewCalendarForm;
use yii\web\Controller;


class CalendarController extends Controller
{
    public $layout = 'adminTemplate';

    public function actionIndex()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $year = getdate()['year'];
        $nextYear = $year + 1;
        $check = Calendar::find()->where(['year'=>$year])->one();
        if (!$check) {
            $this->actionCreateCalendar($year);
            $this->actionCreateCalendar($nextYear);
        }

        $data = Calendar::find()->where(['year' => $year])->andWhere(['holiday' => 1])->orderBy('number_day')->all();
        $holidayArray = [];
        foreach($data as $item) {
            $holidayArray += [$item->day . '/'.$item->month => $item->holiday];
        }


        return $this->render('index', [
            'currentCalendar' => $data,
            'holidayArray' => $holidayArray,
        ]);
    }


    public function actionCreateCalendar($year)
    {
        $newCalendar = new NewCalendarForm();
        if ($newCalendar->creat($year)) {
            return $this->redirect(['/admin/calendar']);
        }

    }


    public function actionCreateHoliday($code)
    {
        $holiday = new NewCalendarForm();
        $createHoliday = $holiday->createHoliday($code);
        return $this->redirect(['/admin/calendar']);
    }


    public function actionCleanHoliday()
    {
        $clean = new NewCalendarForm();
        $clean->cleanHoliday();
        return $this->redirect(['/admin/calendar']);
    }

}



