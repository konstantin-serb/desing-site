<?php

namespace app\models\forms\assignment;

use app\models\Assignment;
use Yii;
use app\models\Reference;
use yii\base\Model;
use app\components\Storage;

class UploadReferencePictureForm extends Model
{
    public $image;
    public $type;


    public function rules()
    {
        return [
            [['image'], 'file',
                'extensions' => ['jpg', 'png'],
                'checkExtensionByMimeType' => true,
            ],
            [['type'], 'integer']
        ];
    }

    public function addImage($file, $assignmentId)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'reference/';
        $fileUpload->imageWidth = 400;
        $fileUpload->imageHeight = 400;
        $fileUpload->imageMethod = 'crop';
        $fileUpload->imageQuality = 90;
        $nameLength = 15;

        $reference = new Reference;
        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength)) {
            $reference->image = $fileTableName;
            $reference->assignment_id = $assignmentId;
            $reference->date_create = time();
            if ($reference->save()) {
                return Yii::$app->db->getLastInsertID();
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
        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength)) {
            $reference->full_image = $fileTableName;
            $reference->type = $this->type;
            if ($reference->save()) {
                return true;
            }
        }
    }







}