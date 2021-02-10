<?php

namespace app\models\events;

use app\models\AssignmentComments;
use app\models\User;
use yii\base\Event;

class UserAddCommentEvent extends Event
{
    public $user;
    public $subject;
    public $parentsId;

    public function getSubject()
    {
        $subject = [];
        $subject['title'] = 'Новое сообщение от такого-то юзера';
        $subject['body'] = $this->subject;
        return $subject;
    }

    public function getUser()
    {
        $comment = AssignmentComments::findOne($this->parentsId);
        $user = $this->getUserById($comment->commentator_id);
        return $user;
    }

    private function getUserById($id)
    {
        $user = User::findOne($id);
        return $user;
    }

}