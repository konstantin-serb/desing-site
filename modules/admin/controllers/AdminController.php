<?php

namespace app\modules\admin\controllers;

use app\models\Clients;
use app\models\Employee;
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
        $staff = Employee::find()->where(['hash' => null])
            ->orderBy('create_at desc')
            ->limit(8)
            ->all();

        return $this->render('users', [
            'clients' => $clients,
            'staff' => $staff,
        ]);
    }



}
