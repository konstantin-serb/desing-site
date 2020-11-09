<?php


namespace app\modules\admin\controllers;

use app\components\AdminBase;
use app\models\City;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class CityController extends Controller
{

    public function actionAddAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new City();
        $model->city = Yii::$app->request->post('params')['city'];
        if ($model->save()) {
            $value = $model->value();
            return [
                'success' => true,
                'value' => $value,
            ];
        } return [
            'success' => false,
    ];
    }

}