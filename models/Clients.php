<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $user_name
 * @property string|null $last_name
 * @property string|null $surname
 * @property string|null $hash
 * @property int|null $created_at
 * @property int|null $register_date
 * @property int|null $status
 *
 * @property User $user
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
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
            'created_at' => 'Created At',
            'register_date' => 'Register Date',
            'status' => 'Status',
        ];
    }



    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }


    public static function getOne($id)
    {
        return self::find()->where(['id' => $id])->one();
    }
}
