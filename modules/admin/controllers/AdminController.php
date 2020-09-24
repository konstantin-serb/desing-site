<?php

namespace app\modules\admin\controllers;

use Yii;
use app\components\AdminBase;

class AdminController extends \yii\web\Controller
{
    public $layout = 'adminTemplate';


    public function actionIndex()
    {
        if (!AdminBase::isAdmin(Yii::$app->user->identity)) $this->redirect(['/']);
        $this->view->params['activePage'] = 'home';

        return $this->render('index');
    }


    public function actionAllUsers()
    {
        if (!AdminBase::isAdmin(Yii::$app->user->identity)) $this->redirect(['/']);
        $this->view->params['activePage'] = 'users';

        return $this->render('users');
    }


    public function actionClients()
    {
        if (!AdminBase::isAdmin(Yii::$app->user->identity)) $this->redirect(['/']);

        return $this->render('clients');
    }


    public function actionStaff()
    {
        if (!AdminBase::isAdmin(Yii::$app->user->identity)) $this->redirect(['/']);

        return $this->render('staff');
    }

}
