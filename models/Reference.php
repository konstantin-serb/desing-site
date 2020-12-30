<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reference".
 *
 * @property int $id
 * @property int|null $assignment_id
 * @property int|null $type
 * @property int|null $sort
 * @property int|null $date_create
 * @property int|null $date_update
 * @property string|null $image
 * @property string|null $full_image
 * @property string|null $description
 */
class Reference extends \yii\db\ActiveRecord
{
    const TYPE_GENERAL = 10;
    const TYPE_WALL = 9;
    const TYPE_FLOOR = 8;
    const TYPE_FURNITURE = 7;
    const TYPE_KITCHEN = 6;
    const TYPE_BATHROOM = 5;
    const TYPE_ROOMS = 4;
    const TYPE_CHILD = 3;
    const TYPE_LIVING = 2;
    const TYPE_DOOR = 1;
    const TYPE_DECOR = 11;



    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reference';
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'assignment_id' => 'Assignment ID',
            'type' => 'Type',
            'sort' => 'Sort',
            'image' => 'Image',
            'full_image' => 'Full Image',
            'description' => 'Description',
        ];
    }

    public function getImage()
    {
        if ($this->image) {
            return '/files/uploads/' . $this->image;
        } else {
            return '/files/uploads/project/no-image.jpg';
        }
    }

    public function getFullImage()
    {
        if ($this->full_image) {
            return '/files/uploads/' . $this->full_image;
        } else {
            return '/files/uploads/project/no-image.jpg';
        }
    }
}
