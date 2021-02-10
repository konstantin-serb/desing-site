<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "assignment_comments".
 *
 * @property int $id
 * @property int|null $parents_id
 * @property string|null $comment
 * @property int|null $commentator_id
 * @property int|null $project_id
 * @property string|null $user_type
 * @property int|null $path_type
 * @property int|null $date_create
 * @property int|null $date_update
 * @property int|null $status
 */
class AssignmentComments extends \yii\db\ActiveRecord
{
    const STATUS_VISIBLE = 1;
    const STATUS_DELETED = 0;
    const ADDED_COMMENT = 'added_comment';

    const GENERAL_PATH = 1;
    const WALL_PATH = 2;
    const FLOOR_PATH = 3;
    const FURNITURE_PATH = 4;
    const KITCHEN_PATH = 5;
    const BATHROOM_PATH = 6;
    const ROOMS_PATH = 7;
    const CHILD_PATH = 8;
    const LIVING_PATH = 9;
    const DOOR_PATH = 10;
    const DECOR_PATH = 11;

    const EMPLOYEE = 'employee';
    const ADMIN = 'admin';


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assignment_comments';
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parents_id' => 'Parents ID',
            'comment' => 'Comment',
            'commentator_id' => 'Commentator ID',
            'user_type' => 'User Type',
            'path_type' => 'Path Type',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'status' => 'Status',
        ];
    }

    public function init()
    {
        $this->on(self::ADDED_COMMENT, [Yii::$app->emailService, 'sendMail']);
        parent::init(); // TODO: Change the autogenerated stub
    }


    public static function getCommentArray($object, $type)
    {
        $commentArray = [];
        foreach ($object as $key => $value)
        {
            if ($value->path_type == $type) {
                $commentArray += [$value->id => [
                    'id' => $value->id,
                    'comment' => $value->comment,
                    'parents_id' => $value->parents_id,
                    'commentator_id' => $value->commentator_id,
                    'user_type' => $value->user_type,
                    'date_create' => $value->date_create,
                    'date_update' => $value->date_update,
                ]];
            }
        }
        return $commentArray;
    }
}