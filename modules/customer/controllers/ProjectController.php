<?php

namespace app\modules\customer\controllers;


use app\models\Assignment;
use yii\web\Controller;
use app\models\Project;
use app\components\AdminBase;
use Yii;

class ProjectController extends Controller
{
   public $layout = 'customerTemplate';


    public function actionIndex()
    {
        if (!AdminBase::isCustomer()) return $this->redirect(['/']);

        $this->view->params['activePage'] = 'projects';

        $undeformedProjects = Project::find()
            ->where(['customer' => Yii::$app->user->identity->getId()])
            ->andWhere(['project_status' => Project::STATUS_FOR_ASSIGNMENT])->all();


        return $this->render('index', [
            'undeformedProjects' => $undeformedProjects,
        ]);
    }


    public function actionView($id)
    {
        if (!AdminBase::isCustomer()) return $this->redirect(['/']);
        $project = Project::findOne($id);
        $assignment = Assignment::find()->where(['project_id' => $id])->one();


        return $this->render('view', [
            'project' => $project,
            'assignment' => $assignment
        ]);

    }



}














