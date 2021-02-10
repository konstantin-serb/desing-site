<?php

namespace app\models\forms\admin;

use app\components\Storage;
use app\models\User;
use Yii;
use yii\base\Model;
use app\models\Admin;

class UploadAvatarAdminForm extends Model
{
    public $avatar;


    public function rules()
    {
        return [
            [['avatar'], 'required'],
            [['avatar'], 'file',
//                'skipOnEmpty' => false,
                'extensions' => ['jpg', 'png'],
                'checkExtensionByMimeType' => true,
                ],
        ];
    }


    public function save($file, $userId)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'avatar/';
        $fileUpload->imageWidth = 200;
        $fileUpload->imageHeight = 270;
        $fileUpload->imageMethod = 'crop';
        $fileUpload->imageQuality = 90;
        $nameLength = 12;

        $admin = Admin::findOne($userId);
        if (!$admin) {
            $admin = new Admin();
        }

        if ($admin->avatar) {
            $currentAvatar = $admin->avatar;
        } else {
            $currentAvatar = null;
        }
         if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength, $currentAvatar)) {

             $admin->avatar = $fileTableName;
             if (!$admin->user_id) {
                 $admin->user_id = $userId;
             }

             if ($admin->save()) {
                 return true;
             }
         }
    }


    public function saveMini($file, $userId)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'avatar/mini/';
        $fileUpload->imageWidth = 100;
        $fileUpload->imageHeight = 100;
        $fileUpload->imageMethod = 'crop';
        $fileUpload->imageQuality = 90;
        $nameLength = 12;

        $admin = Admin::findOne($userId);

        if (($admin->mini)) {
            $currentAvatar = $admin->mini;
        } else {
            $currentAvatar = '';
        }
        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength, $currentAvatar)) {

            $admin->mini = $fileTableName;
            if ($admin->save()) {
                return true;
            }
        }
    }



}