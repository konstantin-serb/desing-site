<?php


namespace app\modules\customer\models\forms;


use app\components\Storage;
use app\models\Clients;
use app\models\Employee;
use app\models\User;
use Yii;
use yii\base\Model;


class UploadAvatarUserForm extends Model
{
    public $avatar;


    public function rules()
    {
        return [
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

        $customer = Clients::findOne($userId);
        $currentAvatar = $customer->avatar;
         if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength, $currentAvatar)) {

             $customer->avatar = $fileTableName;
             if ($customer->save()) {
                 $user = User::findOne($customer->user_id);
                 $user->updated_at = time();
                 $user->save();
                 return true;
             }
         }
    }


    public function saveEmployeeAvatar($file, $userId)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'avatar/';
        $fileUpload->imageWidth = 200;
        $fileUpload->imageHeight = 270;
        $fileUpload->imageMethod = 'crop';
        $fileUpload->imageQuality = 90;
        $nameLength = 12;

        $employee = Employee::findOne($userId);
        $currentAvatar = $employee->avatar;
        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength, $currentAvatar)) {

            $employee->avatar = $fileTableName;
            if ($employee->save()) {
                $user = User::findOne($employee->user_id);
                $user->updated_at = time();
                $user->save();
                return true;
            }
        }
    }
}