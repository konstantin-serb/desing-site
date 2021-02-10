<?php


namespace app\models\forms\comments\assignment;

use app\models\AssignmentComments;
use yii\base\Model;
use app\models\events\UserAddCommentEvent;
use yii\helpers\Html;

class UpdateAnswerForm extends Model
{
    public $comment;
    public $commentId;
    public $type;


    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment', 'type'], 'string', 'length' => [3, 400]],
            [['commentId'], 'integer'],
        ];
    }


    public function save()
    {
        if($this->validate()) {
            $comment = AssignmentComments::findOne($this->commentId);
            $oldComment = $comment->comment;
            $parentsId = $comment->parents_id;
            $comment->comment = Html::encode($this->comment);
            $comment->date_update = time();

            if ($comment->save()) {
//                $event = new UserAddCommentEvent();
//                $event->user = $this->commentatorId;
//                $event->parentsId = $this->parents_id;
//                $event->subject = $this->comment;
//                $comment->trigger(AssignmentComments::ADDED_COMMENT, $event);

                return true;
            }
        }
        return false;
    }



}