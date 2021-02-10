<?php

namespace app\controllers;

use app\models\forms\StaffSignupForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
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


    public function actionTest()
    {
        $arr = array(
            1 => array(
                'id' => 1,
                'parent' => 0,
                'title' => 'asdasd'
            ),
            2 => array(
                'id' => 2,
                'parent' => 1,
                'title' => 'asdasd'
            ),
            3 => array(
                'id' => 3,
                'parent' => 2,
                'title' => 'asdasd'
            ),
            4 => array(
                'id' => 4,
                'parent' => 1,
                'title' => 'asdasd'
            ),
            5 => array(
                'id' => 5,
                'parent' => 4,
                'title' => 'asdasd'
            ),
            6 => array(
                'id' => 6,
                'parent' => 2,
                'title' => 'asdasd'
            ),
            7 => array(
                'id' => 7,
                'parent' => 6,
                'title' => 'new'
            ),
            8 => array(
                'id' => 8,
                'parent' => 7,
                'title' => 'new'
            ),
        );

        function build_tree_array($array) {
            $tree = array();
            if (!empty($array)) {
                foreach($array as $id => &$row){
                    if($row['parent'] === 0) {
                        $tree[$id] = &$row;
                    } else {
                        $array[$row['parent']]['children'][$id] = &$row;
                    }
                }
            }
            return $tree;
        }

        dumper(build_tree_array($arr)); die;


    }





}
