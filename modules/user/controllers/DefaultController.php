<?php

namespace app\modules\user\controllers;

use app\models\forms\LoginForm;
use Yii;
use yii\web\Controller;
use app\models\forms\RegisterForm;
use app\components\AdminBase;


class DefaultController extends Controller
{

    public function actionLogin()
    {
        $this->view->params['activePage'] = 'login';
        $model = new LoginForm;
        if ($model->load(Yii::$app->request->post()) && $user = $model->login()) {

           if (AdminBase::isAdmin()) {
               return $this->redirect(['/admin']);
           } elseif (AdminBase::isCustomer()) {
               return $this->redirect(['/customer']);
           } elseif (AdminBase::isEmployee()) {
               return $this->redirect(['/employee']);
           } else {
               return $this->redirect(['/']);
           }

        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionRegister72()
    {
        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $user = $model->save()) {
            Yii::$app->user->login($user);
            return $this->redirect(['/']);
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}





















