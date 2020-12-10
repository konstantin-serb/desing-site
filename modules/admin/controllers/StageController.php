<?php


namespace app\modules\admin\controllers;

use app\models\Stage;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\forms\stage\AddStageForm;

class StageController extends Controller
{
    public $layout = 'adminTemplate';


    public function actionAddStageAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new AddStageForm();
        $model->number = Yii::$app->request->post('number');
        $model->title = Yii::$app->request->post('title');
        $model->date = Yii::$app->request->post('date');
        $model->length = Yii::$app->request->post('length');
        $model->projectId = Yii::$app->request->post('projectId');

        $array1 = $model->save();
        if ($array1['success'] == true) {
            $content = $this->getStages($model->projectId);
            $array2 = ['value' => $content];
            $result = array_merge($array1, $array2);
            return $result;
        }

        return $array1;
    }


    public function getStages($id)
    {
        $this->layout = 'empty';
        $stages = Stage::find()->where(['project_id' => $id])->orderBy('number')->all();
        return $this->render('stage',[
            'stages' => $stages,
        ]);
    }

}