<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $lastName
 * @property string $surname
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $admin_status
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_ADMIN = 10;
    const STATUS_EMPLOYEE = 8;
    const STATUS_CLIENT = 9;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'lastName' => 'Last Name',
            'surname' => 'Surname',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'admin_status' => 'Admin Status',
        ];
    }

    public static function findByEmail($email)
    {
        return self::find()->where(['email' => $email])->one();
    }


    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }


    public function getClient()
    {
        return $this->hasOne(Clients::class, ['user_id' => 'id']);
    }

    public function getSurnamePlus()
    {
        $surname = $this->surname;
        $name = $this->username;
        $lastName = $this->lastName;

        return $surname . ' ' . $name . ' ' . $lastName;
    }


    public static function getUsernameForComment($userId)
    {
        $user = self::findOne($userId);
        if ($user) {

            switch ($user->status) {
                case 10:
                    echo 'Admin';
                    break;

                case 9:
                    $client = Clients::find()->where(['user_id' => $userId])->one();
                    echo $client->surname . ' ' . $client->user_name . ' ' . $client->last_name;
                    break;

                case 8:
                    $employee = Employee::find()->where(['user_id' => $userId])->one();
                    echo $employee->surname . ' ' . $employee->user_name . ' ' . $employee->last_name;
                    break;
            }
        }
    }


    public static function getUserAvaForComment($userId)
    {
        $user = self::findOne($userId);
        if ($user) {

            switch ($user->status) {
                case 10:
                    $user = Admin::find()->where(['user_id' => $userId])->one();
                    if($user) {
                        return $user->getMini();
                    } else {
                        return '/files/uploads/avatar/mini/no-foto.png';
                    }

                    break;

                case 9:
                    $client = Clients::find()->where(['user_id' => $userId])->one();
                    return $client->getMini();
                    break;

                case 8:
                    $employee = Employee::find()->where(['user_id' => $userId])->one();

                    break;
            }
        }
    }


    public static function getUserStatus($userId)
    {
        $user = self::findOne($userId);
        if ($user) {

            switch ($user->status) {
                case 10:
                    return 'Admin';
                    break;

                case 9:
                    return 'client';
                    break;

                case 8:
                    return 'employee';
                    break;
            }
        }
    }


}
