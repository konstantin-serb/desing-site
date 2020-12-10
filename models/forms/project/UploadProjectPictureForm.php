<?php

namespace app\models\forms\project;

use yii\base\Model;
use app\models\Project;
use app\components\Storage;

class UploadProjectPictureForm extends Model
{
    public $projectPhoto;

    public function rules()
    {
        return [
            [['projectPhoto'], 'file',
                'extensions' => ['jpg', 'png'],
                'checkExtensionByMimeType' => true,
            ],
        ];
    }


    public function savePicture($projectPhoto)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'project/';
        $fileUpload->imageWidth = 1000;
        $fileUpload->imageHeight = 600;
        $fileUpload->imageMethod = 'width';
        $fileUpload->imageQuality = 90;
        $nameLength = 12;

        $fileTableName = $fileUpload->saveUploadedImage($projectPhoto, $nameLength);
        return $fileTableName;
    }


    public function savePictureMin($projectPhoto)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'project/min/';
        $fileUpload->imageWidth = 300;
        $fileUpload->imageHeight = 150;
        $fileUpload->imageMethod = 'crop';
        $fileUpload->imageQuality = 90;
        $nameLength = 12;

        $fileTableName = $fileUpload->saveUploadedImage($projectPhoto, $nameLength);
        return $fileTableName;
    }

    public function update($file, $projectId)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'project/';
        $fileUpload->imageWidth = 1000;
        $fileUpload->imageHeight = 600;
        $fileUpload->imageMethod = 'width';
        $fileUpload->imageQuality = 90;
        $nameLength = 12;

        $project = Project::findOne($projectId);
        $currentImage = $project->image;
        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength, $currentImage)) {

            $project->image = $fileTableName;
            $project->time_update = time();
            if ($project->save()) {
                $this->updatePictureMin($file, $projectId);
                return true;
            }
        }
    }

    public function updatePictureMin($file, $projectId)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'project/min/';
        $fileUpload->imageWidth = 300;
        $fileUpload->imageHeight = 150;
        $fileUpload->imageMethod = 'crop';
        $fileUpload->imageQuality = 90;
        $nameLength = 12;

        $project = Project::findOne($projectId);
        $currentImage = $project->image_min;
        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength, $currentImage)) {
            $project->image_min = $fileTableName;
            if ($project->save()) {
                return true;
            }
        }
    }

}