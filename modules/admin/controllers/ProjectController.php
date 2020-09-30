<?php

namespace app\modules\admin\controllers;

use app\components\AdminBase;
use Yii;
use yii\web\Controller;

class ProjectController extends Controller
{
    public $layout = 'adminTemplate';

    public function actionIndex()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $this->view->params['activePage'] = 'projects';

        return $this->render('index');
    }


    public function actionView()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);

        return $this->render('view');
    }


}