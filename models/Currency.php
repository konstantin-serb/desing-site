<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property int $id
 * @property string|null $currency
 * @property float|null $coef
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['currency'], 'trim'],
            [['currency'], 'required'],
            [['currency'], 'string', 'max' => 255],
            [['currency'], 'unique', 'targetClass' => Currency::class],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'currency' => 'Currency',
            'coef' => 'Coef',
        ];
    }

    public function value()
    {
        $object = self::find()->orderBy('id desc')->all();
        $value = '';
        foreach ($object as $item) {
            $value .= '<option value="'.$item->id.'">'.$item->currency.'</option>';
        }
        return $value;
    }
}
