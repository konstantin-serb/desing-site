<?php

namespace app\modules\admin\controllers;

use app\components\AdminBase;
use app\models\City;
use app\models\forms\admin\AddProjectForm;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use app\models\Clients;


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


    public function actionCreate()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $model = new AddProjectForm();
        $customerObjects = Clients::find()->orderBy('created_at desc')->all();
        $customers = [];
        foreach ($customerObjects as $object) {
            $customers += [$object->id => $object->surname. ' '. $object->user_name . ' ' . $object->last_name];
        }
        $cityObject = City::find()->orderBy('city asc')->all();
        $city = ArrayHelper::map($cityObject, 'id', 'city');


        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['/admin/project/index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'customers' => $customers,
            'city' => $city,
        ]);
    }





}






















