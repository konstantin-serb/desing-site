<?php

namespace app\modules\customer\controllers;


use app\models\Assignment;
use app\models\Clients;
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
        $userId = Yii::$app->user->identity->getId();
        if($userId) {
            $customerId = Clients::find()->where(['user_id' => $userId])->one()->id;
        }
        if ($customerId) {
            $undeformedProjects = Project::find()
                ->where(['customer' => $customerId])
                ->andWhere(['project_status' => Project::STATUS_FOR_ASSIGNMENT])->all();
        }



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














