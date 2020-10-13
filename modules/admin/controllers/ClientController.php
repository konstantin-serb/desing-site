<?php


namespace app\modules\admin\controllers;

use app\models\forms\client\AddClientForm;
use Yii;
use yii\web\Controller;
use app\components\AdminBase;
use app\models\Clients;
use app\models\forms\client\AdminEditForm;

class ClientController extends Controller
{
    public $layout = 'adminTemplate';


    public function actionIndex()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $clients = Clients::find()
            ->orderBy('created_at desc')
            ->all();


        return $this->render('index', [
            'clients' => $clients,
        ]);
    }


    public function actionAdd()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
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
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);

        $client = Clients::getOne($id);


        return $this->render('undeformed', [
            'user' => $client,
        ]);
    }


    public function actionUndeformeds()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $undeformeds = Clients::find()->where(['!=', 'hash', 'null'])->orderBy('created_at desc')->all();


        return $this->render('undeFormeds', [
            'undeformeds' => $undeformeds,
        ]);
    }


    public function actionView($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $client = Clients::getOne($id);
        $modelUpdateFIO = new AdminEditForm();
        $modelUpdateFIO->id = $client->id;
        if ($modelUpdateFIO->load(Yii::$app->request->post())) {

            if ($modelUpdateFIO->save()) {
                return $this->refresh();
            }
        }

        return $this->render('view', [
            'user' => $client,
            'modelUpdateFIO' => $modelUpdateFIO,
        ]);
    }

}


























