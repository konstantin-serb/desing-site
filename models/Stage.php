<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stage".
 *
 * @property int $id
 * @property int|null $project_id
 * @property int|null $number
 * @property string|null $title
 * @property string|null $start
 * @property int|null $length
 * @property int|null $date_create
 * @property int|null $date_update
 * @property int|null $status
 */
class Stage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stage';
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'number' => 'Number',
            'title' => 'Title',
            'start' => 'Start',
            'length' => 'Length',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'status' => 'Status',
        ];
    }


    public function getDate($stamp)
    {
        $strTime = $stamp;

        $_monthsList = array(".01." => "января", ".02." => "февраля",
            ".03." => "марта", ".04." => "апреля", ".05." => "мая", ".06." => "июня",
            ".07." => "июля", ".08." => "августа", ".09." => "сентября",
            ".10." => "октября", ".11." => "ноября", ".12." => "декабря");

        $data = date('d', $strTime) . ' ' . $_monthsList[date('.m.', $strTime)]
            . ' ' . date('Y', $strTime) . 'г.';

        return $data;
    }

}
