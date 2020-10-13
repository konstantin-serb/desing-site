<?php

namespace app\controllers;

use app\models\forms\StaffSignupForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\forms\SignupForm;
use app\models\User;

class SiteController extends Controller
{
    const STATUS_CLIENT = 9;
    const STATUS_ADMIN = 10;
    const STATUS_STAFF = 11;


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
        $this->view->params['activePage'] = 'home';

        return $this->render('index');
    }


    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) return $this->redirect(['/']);
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $userId = $model->save()) {
                $user = User::find()->where(['id' => $userId])->one();
                Yii::$app->user->login($user);
            return $this->redirect(['/customer']);
            }

        return $this->render('register', [
            'model' => $model,
        ]);
    }


    public function actionStaffRegister()
    {
        if (!Yii::$app->user->isGuest) return $this->redirect(['/']);
        $model = new StaffSignupForm();

        if ($model->load(Yii::$app->request->post()) && $userId = $model->save()) {
            $user = User::findOne($userId);
            Yii::$app->user->login($user);
           return $this->redirect(['/employee']);
        }

        return $this->render('staff-register',[
            'model' => $model,
        ]);
    }





}
