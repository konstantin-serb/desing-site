<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "one_characteristic_tempate".
 *
 * @property int $id
 * @property int|null $template_id
 * @property string|null $question
 * @property string|null $description
 * @property int|null $sort
 */
class OneCharacteristicTempate extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'template_id' => 'Template ID',
            'question' => 'Question',
            'description' => 'Description',
            'sort' => 'Sort',
        ];
    }
}
