<?php

namespace app\models\templates;

use Yii;

/**
 * This is the model class for table "one_question_template".
 *
 * @property int $id
 * @property int|null $template_id
 * @property string|null $question
 * @property string|null $description
 * @property int|null $sort
 */
class OneQuestionTemplate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'one_question_template';
    }

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
