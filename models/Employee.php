<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $user_name
 * @property string|null $last_name
 * @property string|null $surname
 * @property string|null $hash
 * @property int|null $create_at
 * @property int|null $register_date
 * @property int|null $status
 * @property int|null $rating
 * @property int|null $position
 * @property string|null $avatar
 * @property string|null $info
 *
 * @property User $user
 */
class Employee extends \yii\db\ActiveRecord
{
    const STATUS_UNDEREGISTERED = 9;
    const STATUS_REGISTERED = 10;

    public static function tableName()
    {
        return 'employee';
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'last_name' => 'Last Name',
            'surname' => 'Surname',
            'hash' => 'Hash',
            'create_at' => 'Create At',
            'register_date' => 'Register Date',
            'status' => 'Status',
            'rating' => 'Rating',
            'position' => 'Position',
            'info' => 'Info',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getPos()
    {
        return $this->hasOne(Position::class, ['id' => 'position']);
    }


    public function getImage()
    {
        if ($this->avatar) {
            return '/files/uploads/'.$this->avatar;
        } else {
            return '/files/uploads/avatar/no-foto.png';
        }
    }


    public function getStatus()
    {
        switch ($this->status) {
            case self::STATUS_UNDEREGISTERED :
                $result = 'Недооформленный';
                break;
            case self::STATUS_REGISTERED :
                $result = 'Клиент';
                break;
            default:
                $result = '?';
        }
        return $result;
    }

    public function getCssStyle()
    {
        switch ($this->status) {
            case self::STATUS_UNDEREGISTERED :
                $result = 'class="status-warning"';
                break;
            case self::STATUS_REGISTERED :
                $result = 'class="status-success"';
                break;
            default:
                $result = '';
        }
        return $result;
    }
}
