<?php


namespace app\models\forms\comments\assignment;

use app\models\AssignmentComments;
use yii\base\Model;
use yii\helpers\Html;

class AddCommentForm extends Model
{
    public $comment;
    public $commentatorId;
    public $pathType;
    public $userType;
    public $projectId;
    public $type;


    public function rules()
    {
        return [
            [['comment', 'commentatorId', 'pathType', 'userType'], 'required'],
            [['comment'], 'string', 'length' => [3, 400]],
            [['pathType', 'commentatorId', 'projectId'], 'integer'],
            [['userType', 'type'], 'string'],

        ];
    }


    public function save()
    {
        if($this->validate()) {

            $comment = new AssignmentComments();
            $comment->parents_id = 0;
            $comment->comment = Html::encode($this->comment);
            $comment->commentator_id = $this->commentatorId;
            $comment->project_id = $this->projectId;
            $comment->user_type = $this->userType;
            $comment->path_type = $this->pathType;
            $comment->date_create = time();
            $comment->status = AssignmentComments::STATUS_VISIBLE;

            if ($comment->save()) {
                return true;
            }
        }
        return false;
    }



}