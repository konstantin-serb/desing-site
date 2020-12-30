<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "characteristics_templates".
 *
 * @property int $id
 * @property string|null $title
 */
class CharacteristicsTemplates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'characteristics_templates';
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }


    public function getCountItems()
    {
        $count = OneCharacteristicTempate::find()
            ->where(['template_id' => $this->id])->count();
        return $count;
    }
}
