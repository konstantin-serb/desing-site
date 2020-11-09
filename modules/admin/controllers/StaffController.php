<?php


namespace app\modules\admin\controllers;

use app\components\AdminBase;
use app\models\Employee;
use app\models\forms\employee\AdminEditForm;
use app\models\forms\employee\SignupEmployeeForm;
use app\models\forms\employee\UpdatePositionForm;
use app\models\forms\position\AddPositionForm;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use app\models\Position;

class StaffController extends Controller
{
    public $layout = 'adminTemplate';

    public function actionIndex()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $staff = Employee::find()
            ->orderBy('create_at desc')->all();
        return $this->render('index', [
            'users' => $staff,
        ]);
    }

    public function actionCreate()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $newPosition = new AddPositionForm();
        $model = new SignupEmployeeForm();
        $allPosition = Position::find()->orderBy('id')->all();
        $position = ArrayHelper::map($allPosition, 'id', 'position');
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['/admin/staff/index']);
            }
        }

        return $this->render('add', [
            'model' => $model,
            'position' => $position,
            'newPosition' => $newPosition,
        ]);
    }

    public function actionPositionAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new AddPositionForm();

        $model->position = Yii::$app->request->post('params')['position'];

        if ($model->validate()) {
            if ($model->save()) {
                $value = $model->value();
                return [
                    'success' => true,
                    'value' => $value,
                ];
            }
            return false;
        } else {
            return 'Не проходит валидацию';
        }

    }


    public function actionUndeFormeds()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);

        $users = Employee::find()->where(['!=', 'hash', 'null'])
        ->orderBy('create_at desc')
        ->all();


        return $this->render('undeFormeds', [
            'users' => $users,
        ]);
    }


    public function actionUndeFormed($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $user = Employee::findOne($id);

        return $this->render('undeformed', [
            'user' => $user,
        ]);
    }


    public function actionView($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $user = Employee::findOne($id);
        $modelUpdateFIO = new AdminEditForm();

        $modelUpdateFIO->id = $id;

        if ($modelUpdateFIO->load(Yii::$app->request->post())) {
            if ($modelUpdateFIO->save()) {
                return $this->refresh();
            }
        }

        return $this->render('view', [
            'user' => $user,
            'modelUpdateFIO' => $modelUpdateFIO,

        ]);
    }


    public function actionEditPosition($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $user = Employee::findOne($id);
        $model = new UpdatePositionForm();
        $allPosition = Position::find()->orderBy('id')->all();
        $position = ArrayHelper::map($allPosition, 'id', 'position');

        if ($model->load(Yii::$app->request->post())) {
            $model->id = $id;
            if ($model->save()) {
                return $this->redirect(['/admin/staff/view', 'id' => $id]);
            }
        }

        return $this->render('edit-position', [
            'position' => $position,
            'model' => $model,
            'user' => $user,
        ]);
    }


}