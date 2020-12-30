<?php


namespace app\models\forms\assignment;

use app\components\Storage;
use app\models\Reference;
use app\models\Assignment;
use yii\base\Model;

class AddWallComment extends Model
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


    public function save()
    {
        if ($this->validate()) {
            $reference = Reference::findOne($this->referenceId);
            $reference->description = htmlspecialchars_decode($this->comment);
            $assignment = Assignment::find()
                ->where(['id' => $reference->assignment_id])
                ->one();
            $assignment->time_update = time();

            $allReferences = Reference::find()->where(['type' => Reference::TYPE_WALL])
                ->andWhere(['!=','description', 'null'])
                ->andWhere(['assignment_id' => $reference->assignment_id])->all();
            $count = 1;
            foreach($allReferences as $oneReference) {
                $count = $count + 1;
            }
            $reference->sort = $count;

            if ($reference->save()) {
                $assignment->save();
                $empty = Reference::find()->where(['description' => null])
                    ->andWhere(['type' => Reference::TYPE_WALL])->all();

                if ($empty) {
                    foreach($empty as $item) {
                        Storage::clean($item->image);
                        Storage::clean($item->full_image);
                        $item->delete();
                    }

                }
                return true;
            }
        }

    }

}