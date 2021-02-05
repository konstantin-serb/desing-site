<?php


namespace app\models\forms\assignment;

use app\components\Storage;
use app\models\Reference;
use app\models\Assignment;
use yii\base\Model;

class AddDoorComment extends Model
{
    public $referenceId;
    public $comment;

    public function rules()
    {
        return [
            [['referenceId', 'comment'], 'required'],
            [['referenceId'], 'integer'],
            [['comment'], 'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'comment' => 'Комментарий',
        ];
    }

    

}