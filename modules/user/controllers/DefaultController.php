<?php

namespace app\modules\user\controllers;

use app\models\forms\LoginForm;
use Yii;
use yii\web\Controller;
use app\models\forms\RegisterForm;


class DefaultController extends Controller
{

    public function actionLogin()
    {
        $this->view->params['activePage'] = 'login';
        $model = new LoginForm;
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            return $this->redirect(['/site/index']);
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionRegister()
    {
        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'User registered');
            return $this->redirect(['/site/index']);
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





















