<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "assignment".
 *
 * @property int $id
 * @property int|null $project_id
 * @property string|null $address
 * @property string|null $customer
 * @property string|null $description
 * @property int|null $time_create
 * @property int|null $time_update
 * @property int|null status
 */
class Assignment extends \yii\db\ActiveRecord
{
    const STATUS_CREATE = 1;
    const STATUS_FULL = 5;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assignment';
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'address' => 'Address',
            'customer' => 'Customer',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }


    public function checkQuestion()
    {
        $countQuestion = intval(Question::find()->where(['assignment_id' => $this->id])->count());
        $countAnswer = intval(Question::find()->where(['assignment_id' => $this->id])
            ->andWhere(['!=', 'answer', ''])->count());

        if ($countAnswer == 0) {
            return 'Заполнить анкету';
        } elseif ($countAnswer === $countQuestion) {
            return 'Редактировать анкету';
        } elseif ($countQuestion > $countAnswer) {
            return 'Добавить ответы ('. ($countQuestion - $countAnswer).')';
        }
    }


    public function checkCharacteristic()
    {
        $countQuestion = intval(Characteristic::find()->where(['assignment_id' => $this->id])->count());
        $countAnswer = intval(Characteristic::find()->where(['assignment_id' => $this->id])
            ->andWhere(['!=', 'answer', ''])->count());

        if ($countAnswer == 0) {
            return 'Заполнить характеристики';
        } elseif ($countAnswer === $countQuestion) {
            return 'Редактировать характеристики';
        } elseif ($countQuestion > $countAnswer) {
            return 'Добавить характеристики ('. ($countQuestion - $countAnswer).')';
        }
    }



}


