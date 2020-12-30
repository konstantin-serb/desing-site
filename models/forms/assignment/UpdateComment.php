<?php


namespace app\models\forms\assignment;

use app\components\Storage;
use app\models\Reference;
use Yii;
use app\models\Assignment;
use yii\base\Model;

class UpdateComment extends Model
{
    public $sort;
    public $referenceId;
    public $comment;

    public function rules()
    {
        return [
            [['referenceId', 'comment'], 'required'],
            [['referenceId', 'sort'], 'integer'],
            [['comment'], 'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'comment' => 'Комментарий',
            'sort' => 'Номер по порядку',
        ];
    }


    public function save()
    {
        if ($this->validate()) {
            $reference = Reference::findOne($this->referenceId);
            $reference->description = $this->comment;
            $assignment = Assignment::find()
                ->where(['id' => $reference->assignment_id])
                ->one();
            $assignment->time_update = time();
            $reference->sort = $this->sort;

            if ($reference->save()) {
                $assignment->save();
                $references = Reference::find()
                    ->where(['assignment_id'=>$reference->assignment_id])
                    ->andWhere(['type' => $reference->type])
                    ->orderBy('sort')
                    ->all();
                $countable = 0;
                foreach($references as $item) {
                    $countable = $countable + 1;
                    $item->sort = $countable;
                    $item->save();
                }
                return true;
            }
        }

    }

}