<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string|null $city
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city'], 'trim'],
            [['city'], 'required'],
            [['city'], 'string', 'max' => 255],
            [['city'], 'unique', 'targetClass' => City::class],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
        ];
    }


    public function value()
    {
        $object = self::find()->orderBy('id desc')->all();
        $value = '';
        foreach ($object as $item) {
            $value .= '<option value="'.$item->id.'">'.$item->city.'</option>';
        }
        return $value;
    }
}
