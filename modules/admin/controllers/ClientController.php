<?php


namespace app\modules\admin\controllers;



use app\models\forms\client\AddClientForm;
use Yii;
use yii\web\Controller;
use app\components\AdminBase;
use app\models\Clients;

class ClientController extends Controller
{
    public $layout = 'adminTemplate';


    public function actionIndex()
    {
        if (!AdminBase::isAdmin(Yii::$app->user->identity)) $this->redirect(['/']);

        return $this->render('index');
    }


    public function actionAdd()
    {
        if (!AdminBase::isAdmin(Yii::$app->user->identity)) $this->redirect(['/']);
        $model = new AddClientForm();

        if ($model->load(Yii::$app->request->post()) && $client = $model->save()) {

            return $this->redirect(['/admin/client/unde-formed', 'id' => $client->id]);
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }


    public function actionUndeFormed($id)
    {
        if (!AdminBase::isAdmin(Yii::$app->user->identity)) $this->redirect(['/']);

        $client = Clients::getOne($id);


        return $this->render('undeformed', [
            'user' => $client,
        ]);
    }


    public function actionUndeformeds()
    {
        if (!AdminBase::isAdmin(Yii::$app->user->identity)) $this->redirect(['/']);
        $undeformeds = Clients::find()->where(['!=', 'hash', 'null'])->orderBy('created_at desc')->all();


        return $this->render('undeFormeds', [
            'undeformeds' => $undeformeds,
        ]);
    }


    public function actionView($id)
    {
        if (!AdminBase::isAdmin(Yii::$app->user->identity)) $this->redirect(['/']);
        $client = Clients::getOne($id);

        return $this->render('view', [
            'user' => $client,
        ]);
    }

}


























