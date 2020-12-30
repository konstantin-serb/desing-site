<?php

namespace app\models\templates;

use Yii;

/**
 * This is the model class for table "questions_templates".
 *
 * @property int $id
 * @property string|null $title


 */
class QuestionsTemplates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questions_templates';
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
        $count = OneQuestionTemplate::find()
            ->where(['template_id' => $this->id])->count();
        return $count;
    }
}
