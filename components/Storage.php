<?php


namespace app\components;


use Exception;
use Yii;

class Storage
{
    public $folder;
    public $imageWidth;
    public $imageHeight;
    public $imageMethod;
    public $imageQuality;
    public $uploadsPath = '/files/uploads/';

    public function saveUploadedImage($file, $length, $currentAvatar=null)
    {
        $filename = Yii::$app->security->generateRandomString($length);

        $ext = strtolower(($file->extension));
        $tableName = $this->folder . $filename . '.' . $ext;
        $newFileName = $this->uploadsPath . $tableName;
        $newName = $_SERVER['DOCUMENT_ROOT'] . $newFileName;
        if ($currentAvatar) {
            $currentFile = $this->uploadsPath . $currentAvatar;
            $existsFile = $_SERVER['DOCUMENT_ROOT'] . $currentFile;
        }

        try {
            $obj = new Resize($file->tempName);
            $obj->resize($this->imageWidth, $this->imageHeight, $this->imageMethod);
            if ($obj->save($newName, $this->imageQuality)) {
                if ($currentAvatar && file_exists($existsFile)) {
                    unlink($existsFile);
                }
                return $tableName;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return false;
    }

}