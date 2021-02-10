<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $surname
 * @property string|null $username
 * @property string|null $last_name
 * @property int|null $status
 * @property string|null $avatar
 * @property string|null $mini
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'surname' => 'Surname',
            'username' => 'Username',
            'last_name' => 'Last Name',
            'status' => 'Status',
            'avatar' => 'Avatar',
            'mini' => 'Mini',
        ];
    }


    public function getAvatar()
    {

        if ($this->avatar) {
            return '/files/uploads/'.$this->avatar;
        } else {
            return '/files/uploads/avatar/no-foto.png';
        }
    }


    public function getMini()
    {

        if ($this->mini) {
            return '/files/uploads/'.$this->mini;
        } else {
            return '/files/uploads/avatar/mini/no-foto.png';
        }
    }
}
