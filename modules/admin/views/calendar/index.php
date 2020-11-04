<?php
/**
 * @var $currentCalendar \app\models\Calendar
 * @var $day \app\models\Calendar;
 */

use yii\helpers\Url;
use app\models\Calendar;

$month = 10;
$year = getDate()['year'];
$nextYear = $year + 1;


function draw_calendar($month, $year)
{

    $array = Calendar::find()->where(['year' => $year])->andWhere(['holiday' => 1])->orderBy('number_day')->all();
    $nameTypeHoliday = Calendar::find()->where(['!=','holiday', 'null'])->one();

    $calendar = '<table cellpadding="0" cellspacing="0" class="b-calendar__tb">';
    $headings = array('Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс');
    $calendar .= '<tr class="b-calendar__row">';

    $running_day = date('w', mktime(0, 0, 0, $month, 1, $year));
    $running_day = $running_day - 1;
    if ($running_day == -1) {
        $running_day = 6;
    }
    for ($head_day = 0; $head_day <= 6; $head_day++) {
        $calendar .= '<th class="b-calendar__head';

//        Выходные дни
        if ($array) {
            if ($nameTypeHoliday->type_holiday == 0) {
                if ($head_day == 6) {
                    $calendar .= ' b-calendar__weekend';
                }
            } elseif($nameTypeHoliday->type_holiday == 2) {
                if ($head_day == 5) {
                    $calendar .= ' b-calendar__weekend';
                }
                if ($head_day == 6) {
                    $calendar .= ' b-calendar__weekend';
                }
            }
        }

    $calendar .= '">';
    $calendar .= '<div class="b-calendar__number">' . $headings[$head_day] . '</div>';
    $calendar .= '</th>';
}

$calendar .= '</tr>';

//Количество дней в месяце
$days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));

$day_counter = 0;
$days_in_this_week = 1;
$dates_array = array();

$calendar .= '<tr class="b-calendar__row">';
for ($x = 0; $x < $running_day; $x++) {
    $calendar .= '<td class="b-calendar__np"></td>';
    $days_in_this_week++;
}

// дошли до чисел, будем их писать в первую строку
for ($list_day = 1; $list_day <= $days_in_month; $list_day++) {
    $calendar .= '<td class="b-calendar__day';

//         выделяем выходные дни
    foreach ($array as $day) {
        if ($day->month == $month) {
            if ($day->day == $list_day) {
                $calendar .= ' b-calendar__weekend';
            }
        }
    }


    $calendar .= '">';

    // пишем номер в ячейку
    $calendar .= '<div class="b-calendar__number"><a class="a-link" href="#" 
                data-target="' . $list_day . '-' . $month . '-' . $year . '">' . $list_day . '</a></div>';
    $calendar .= '</td>';

    // дошли до последнего дня недели
    if ($running_day == 6) {
        // закрываем строку
        $calendar .= '</tr>';
        // если день не последний в месяце, начинаем следующую строку
        if (($day_counter + 1) != $days_in_month) {
            $calendar .= '<tr class="b-calendar__row">';
        }
        // сбрасываем счетчики
        $running_day = -1;
        $days_in_this_week = 0;
    }

    $days_in_this_week++;
    $running_day++;
    $day_counter++;
}

// выводим пустые ячейки в конце последней недели
if ($days_in_this_week < 8) {
    for ($x = 1; $x <= (8 - $days_in_this_week); $x++) {
        $calendar .= '<td class="b-calendar__np"> </td>';
    }
}

$calendar .= '</tr>';

$calendar .= '</table>';
return $calendar;
}

?>


<div class="mainContent adminPage clients">
    <div class="myContainer">
        <h2>Календарь на <?=$year?> год</h2>

        <div class="add-button button-group">
            <a class="a-link" href="<?= Url::to(['/admin/calendar/clean-holiday']) ?>">Очистить все выходные</a>
            <a class="a-link" href="<?= Url::to(['/admin/calendar/create-holiday', 'code' => 'su']) ?>">Выходные вс</a>
            <a class="a-link" href="<?= Url::to(['/admin/calendar/create-holiday', 'code' => 'sa-su']) ?>">Выходные сб и вс</a>
        </div>

        <?php
        $months = Array(
            0 => 'Январь',
            1 => 'Февраль',
            2 => 'Март',
            3 => 'Апрель',
            4 => 'Май',
            5 => 'Июнь',
            6 => 'Июль',
            7 => 'Август',
            8 => 'Сентябрь',
            9 => 'Октябрь',
            10 => 'Ноябрь',
            11 => 'Декабрь'
        );
        ?>
        <div class="calendar-wrap">
        <?php
        for ($month = 1; $month <= 12; $month++) { ?>
            <div class="b-calendar b-calendar--many">
                <div class="b-calendar__title"><span class="b-calendar__month"><?= $months[$month-1] ?></span> <span class="b-calendar__year"><?=$year?></span></div>
                <?
                echo draw_calendar($month,$year);
                ?>
            </div>
        <?php }
        ?>
        </div>


        <h2>Календарь на <?=$nextYear?> год</h2>
        <div class="calendar-wrap">
            <?php
            for ($month = 1; $month <= 12; $month++) { ?>
                <div class="b-calendar b-calendar--many">
                    <div class="b-calendar__title"><span class="b-calendar__month"><?= $months[$month-1] ?></span> <span class="b-calendar__year"><?=$nextYear?></span></div>
                    <?
                    echo draw_calendar($month,$nextYear);
                    ?>
                </div>
            <?php }
            ?>
        </div>

    </div>


</div>
