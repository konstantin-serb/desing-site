<?php


namespace app\models\forms\comments\assignment;

use app\models\AssignmentComments;
use yii\base\Model;
use app\models\events\UserAddCommentEvent;
use yii\helpers\Html;

class AddAnswerForm extends Model
{
    public $comment;
    public $commentatorId;
    public $pathType;
    public $userType;
    public $projectId;
    public $parents_id;
    public $type;


    public function rules()
    {
        return [
            [['comment', 'commentatorId', 'pathType', 'userType','parents_id'], 'required'],
            [['comment'], 'string', 'length' => [3, 400]],
            [['pathType', 'commentatorId', 'projectId', 'parents_id'], 'integer'],
            [['userType', 'type'], 'string'],

        ];
    }


    public function save()
    {
        if($this->validate()) {

            $comment = new AssignmentComments();
            $comment->parents_id = $this->parents_id;
            $comment->comment = Html::encode($this->comment);
            $comment->commentator_id = $this->commentatorId;
            $comment->project_id = $this->projectId;
            $comment->user_type = $this->userType;
            $comment->path_type = $this->pathType;
            $comment->date_create = time();
            $comment->status = AssignmentComments::STATUS_VISIBLE;

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