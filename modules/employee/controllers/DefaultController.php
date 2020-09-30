<?php

namespace app\modules\employee\controllers;

use app\models\forms\client\EditForm;
use app\models\forms\employee\EmailUpdateForm;
use Yii;
use app\components\AdminBase;
use app\models\Employee;
use app\modules\customer\models\forms\UploadAvatarUserForm;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\forms\employee\PasswordUpdateForm;

/**
 * Default controller for the `employee` module
 */
class DefaultController extends Controller
{
   public $layout = 'employeeTemplate';


    public function actionIndex()
    {
        if (!AdminBase::isEmployee()) return $this->redirect(['/']);
        $this->view->params['activePage'] = 'cabinet';
        $employeeId = AdminBase::getEmployeeId();
        $user = Employee::findOne($employeeId);

        return $this->render('index', [
            'user' => $user,
        ]);
    }



    public function actionPersonalData()
    {
        if (!AdminBase::isEmployee()) return $this->redirect(['/']);
        $employeeId = AdminBase::getEmployeeId();
        $user = Employee::findOne($employeeId);
        $modelEmail = new EmailUpdateForm();
        $modelSurname = new EditForm();
        $modelPhoto = new UploadAvatarUserForm();
        $modelPassword = new PasswordUpdateForm();


        if ($modelEmail->load(Yii::$app->request->post())) {
            if ($modelEmail->save($user->user->id)) {
                return $this->refresh();
            }
        }

        if ($modelSurname->load(Yii::$app->request->post())){
            if ($modelSurname->save()) {
                return $this->refresh();
            }
        }

        if ($modelPhoto->load(Yii::$app->request->post())) {
            $avatar = UploadedFile::getInstance($modelPhoto, 'avatar');
            if (is_uploaded_file($avatar->tempName)) {
                if ($modelPhoto->saveEmployeeAvatar($avatar, $employeeId)) {
                    return $this->redirect(['/employee/personal-data']);
                }
            }
        }

        if ($modelPassword->load(Yii::$app->request->post())) {
            if ($modelPassword->savePassword()) {
                Yii::$app->session->setFlash('success','Пароль изменен!');
                return $this->refresh();
            }
        }

        return $this->render('personal-data', [
            'user' => $user,
            'modelEmail' => $modelEmail,
            'modelSurname' => $modelSurname,
            'modelPhoto' => $modelPhoto,
            'modelPassword' => $modelPassword,
        ]);
    }






}


















