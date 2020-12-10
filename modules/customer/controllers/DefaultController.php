<?php

namespace app\modules\customer\controllers;

use app\models\forms\client\EditForm;
use app\models\forms\employee\EmailUpdateForm;
use app\models\forms\employee\PasswordUpdateForm;
use Yii;
use app\components\AdminBase;
use yii\web\Controller;
use app\models\Clients;
use app\modules\customer\models\forms\UploadAvatarUserForm;
use yii\web\UploadedFile;
use app\models\User;


class DefaultController extends Controller
{
   public $layout = 'customerTemplate';


    public function actionIndex()
    {
        if (!AdminBase::isCustomer()) return $this->redirect(['/']);

        $this->view->params['activePage'] = 'cabinet';
        $customerId = AdminBase::getCustomerId();

        $user = Clients::find()->where(['id' => $customerId])->one();

        return $this->render('index', [
            'user' => $user,
        ]);
    }

    public function actionPersonalData()
    {

        if (!AdminBase::isCustomer()) {return $this->redirect(['/']);}
        $customerId = AdminBase::getCustomerId();
        $user = Clients::findOne($customerId);

        $modelPhoto = new UploadAvatarUserForm();
        $modelSurname = new EditForm;
        $modelEmail = new EmailUpdateForm();
        $modelPassword = new PasswordUpdateForm();

        if ($modelPhoto->load(Yii::$app->request->post()))
        {
            $avatar = UploadedFile::getInstance($modelPhoto, 'avatar');

            if (is_uploaded_file($avatar->tempName)) {
                if ($modelPhoto->save($avatar, $customerId)) {
                    return $this->refresh();
                }
            }
        }

        if ($modelSurname->load(Yii::$app->request->post())) {

            if ($modelSurname->save()) {
                return $this->refresh();
            }
        }

        if ($modelEmail->load(Yii::$app->request->post())) {
            if ($modelEmail->save($user->user->id)) {
                return $this->refresh();
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
            'modelPhoto' => $modelPhoto,
            'modelSurname' => $modelSurname,
            'modelEmail' => $modelEmail,
            'modelPassword' => $modelPassword,
        ]);
    }

}














