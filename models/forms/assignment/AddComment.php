<?php


namespace app\models\forms\assignment;

use app\components\Storage;
use app\models\Reference;
use Yii;
use app\models\Assignment;
use yii\base\Model;

class AddComment extends Model
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

            $allReferences = Reference::find()->where(['type' => $reference->type])
                ->andWhere(['!=','description', 'null'])
                ->andWhere(['assignment_id' => $reference->assignment_id])->all();
            $count = 1;
            foreach($allReferences as $oneReference) {
                $count = $count + 1;
            }
            $reference->sort = $count;

            if ($reference->save()) {
                $assignment->save();
                $constants = [
                    Reference::TYPE_GENERAL => '',
                    Reference::TYPE_WALL => 'Wall',
                    Reference::TYPE_FLOOR => 'Floor',
                    Reference::TYPE_FURNITURE =>'Furniture',
                    Reference::TYPE_KITCHEN =>'Kitchen',
                    Reference::TYPE_BATHROOM => 'Bathroom',
                    Reference::TYPE_ROOMS => 'Rooms',
                    Reference::TYPE_CHILD => 'Child',
                    Reference::TYPE_LIVING => 'Living',
                    Reference::TYPE_DOOR => 'Door',
                    Reference::TYPE_DECOR => 'Decor',
                ];

                foreach ($constants as $key => $val) {
                    if ($reference->type == $key) {
                        $empty = Reference::find()->where(['description' => null])
                            ->andWhere(['type' => $key])->all();
                    }
                }



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