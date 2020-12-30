<?php

namespace app\models\forms\assignment;

use app\models\Assignment;
use Yii;
use app\models\Reference;
use yii\base\Model;
use app\components\Storage;

class UpdateReferencePictureForm extends Model
{
    public $image;


    public function rules()
    {
        return [
            [['image'], 'file',
                'extensions' => ['jpg', 'png'],
                'checkExtensionByMimeType' => true,
            ],
        ];
    }


    public function addImage($file, $referenceId)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'reference/';
        $fileUpload->imageWidth = 400;
        $fileUpload->imageHeight = 400;
        $fileUpload->imageMethod = 'crop';
        $fileUpload->imageQuality = 90;
        $nameLength = 15;

        $reference = Reference::findOne($referenceId);
        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength,
            $reference->image)) {
            $reference->image = $fileTableName;
            $reference->date_update = time();
            if ($reference->save()) {
                $assignment = Assignment::find()->where(['id' => $reference->assignment_id])->one();
                $assignment->time_update = time();
                $assignment->save();
                return true;
            }
        }
    }

    public function addFullImage($file, $referenceId)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'reference/full-image/';
        $fileUpload->imageWidth = 800;
        $fileUpload->imageHeight = 800;
        $fileUpload->imageMethod = 'auto';
        $fileUpload->imageQuality = 90;
        $nameLength = 15;

        $reference = Reference::findOne($referenceId);
        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength,
            $reference->full_image)) {
            $reference->full_image = $fileTableName;
            if ($reference->save()) {
                return true;
            }
        }
    }




}