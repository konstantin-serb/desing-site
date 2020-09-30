<?php

namespace app\modules\admin\controllers;

use app\models\Clients;
use Yii;
use app\components\AdminBase;

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

        return $this->render('users', [
            'clients' => $clients,
        ]);
    }


    public function actionStaff()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);

        return $this->render('staff');
    }







}
