<?php

namespace app\modules\admin\controllers;

use app\models\Admin;
use app\models\Clients;
use app\models\Employee;
use app\models\forms\admin\UploadAvatarAdminForm;
use Yii;
use app\components\AdminBase;
use yii\web\UploadedFile;

class AdminController extends \yii\web\Controller
{
    public $layout = 'adminTemplate';


    public function actionIndex()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $this->view->params['activePage'] = 'home';

        return $this->render('index');
    }


    public function actionAllUsers()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $this->view->params['activePage'] = 'users';

        $clients = Clients::find()->where(['hash' => null])
            ->orderBy('created_at desc')
            ->limit(8)
            ->all();
        $staff = Employee::find()->where(['hash' => null])
            ->orderBy('create_at desc')
            ->limit(8)
            ->all();

        return $this->render('users', [
            'clients' => $clients,
            'staff' => $staff,
        ]);
    }


    public function actionCustomization()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $model = new UploadAvatarAdminForm();
        $userId = Yii::$app->user->identity->getId();
        $admin = Admin::find()->where(['user_id' => $userId])->one();

        if ($model->load(Yii::$app->request->post())) {
            $avatar = UploadedFile::getInstance($model, 'avatar');

            if (is_uploaded_file($avatar->tempName)) {
                if ($model->save($avatar, $userId)) {
                    if ($model->saveMini($avatar, $userId)) {
                        return $this->refresh();
                    }

                }
            }
        }


        return $this->render('customization', [
            'model' => $model,
            'admin' => $admin,
        ]);
    }



}
