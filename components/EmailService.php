<?php


namespace app\components;

use yii\base\Component;
use Yii;

class EmailService extends Component
{
    public function mailer($user, $subject)
    {
        return Yii::$app->mailer->compose()
            ->setFrom('admin@i-des.net')
            ->setTo($user->email)
            ->setSubject($subject['title'])
            ->setTextBody($subject['body'])
            ->send();
    }

    public function mail($user, $subject)
    {
        $message = $subject['title'];
        $to = $user->email;
        $body = $subject['body'];
        return mail($to, $body, $message);
    }

    public function sendMail($event)
    {
        if ($this->mailer($event->getUser(), $event->getSubject())) {
            return true;
        } elseif($this->mail($event->getUser(), $event->getSubject())) {
            return true;
        } else {
            return false;
        }
    }

}