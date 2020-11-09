<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string|null $project_id
 * @property string|null $nameProject
 * @property string|null $date_start
 * @property int|null $customer
 * @property int|null $length
 * @property float|null $area
 * @property int|null $city
 * @property string|null $image
 * @property int|null $price_digital
 * @property string|null $price_words
 * @property int|null $currency
 * @property float|null $price_p1
 * @property float|null $price_p2
 * @property float|null $price_p3
 * @property float|null $price_p4
 * @property float|null $price_p5
 * @property int|null $status
 * @property int|null $project_status
 * @property int|null $time_create
 * @property int|null $time_update
 */
class Project extends \yii\db\ActiveRecord
{
    const STATUS_UNDERFILLED = 1;

    /**public const
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'nameProject' => 'Name Project',
            'date_start' => 'Date Start',
            'customer' => 'Customer',
            'length' => 'Length',
            'area' => 'Area',
            'city' => 'City',
            'image' => 'Image',
            'price_digital' => 'Price Digital',
            'price_words' => 'Price Words',
            'currency' => 'Currency',
            'price_p1' => 'Price P1',
            'price_p2' => 'Price P2',
            'price_p3' => 'Price P3',
            'price_p4' => 'Price P4',
            'price_p5' => 'Price P5',
            'status' => 'Status',
            'project_status' => 'Project Status',
            'time_create' => 'Time Create',
            'time_update' => 'Time Update',
        ];
    }
}
