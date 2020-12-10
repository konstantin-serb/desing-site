<?php


namespace app\modules\admin\controllers;


use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Currency;

class CurrencyController extends Controller
{

    public function actionAddAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new Currency();
        $model->currency = Yii::$app->request->post('params')['currency'];
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