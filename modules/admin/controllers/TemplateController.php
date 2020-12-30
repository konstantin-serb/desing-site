<?php


namespace app\modules\admin\controllers;

use app\models\CharacteristicsTemplates;
use app\models\forms\template\AddContractCopyForm;
use app\models\forms\template\EditContractForm;
use app\models\TemplateContract;
use app\models\templates\QuestionsTemplates;
use Yii;
use yii\web\Controller;
use app\components\AdminBase;
use yii\web\Response;

class TemplateController extends Controller
{
    public $layout = 'adminTemplate';

    public function actionIndex()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $countQuestions = QuestionsTemplates::find()
            ->count();
        $countCharacteristic = CharacteristicsTemplates::find()
            ->count();
        $countContracts = TemplateContract::find()->count();

        return $this->render('index', [
            'countQuestions' => $countQuestions,
            'countContracts' => $countContracts,
            'countCharacteristic' => $countCharacteristic,
        ]);
    }


    public function actionContractsIndex()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $templates = TemplateContract::find()->where(['status' => 10])
            ->orderBy('date_update desc')->all();

        return $this->render('contracts-index', [
            'templates' => $templates,
        ]);
    }


    public function actionContractsView($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $template = TemplateContract::findOne($id);
        $model = new AddContractCopyForm();
        if ($model->load(Yii::$app->request->post())) {
            if($newId = $model->save()) {
                return $this->redirect(['/admin/template/contracts-view', 'id' => $newId]);
            }
        }

        return $this->render('contracts-view', [
            'template' => $template,
            'model' => $model,
        ]);
    }

    public function actionContractsUpdate($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $template = new EditContractForm();
        $templateContract = TemplateContract::findOne($id);
        $template->id = $id;

        if ($template->load(Yii::$app->request->post())) {
            if ($template->save()) {
                return $this->redirect(['/admin/template/contracts-view', 'id'=>$id]);
            }
        }

        return $this->render('contracts-update', [
            'template' => $template,
            'templateContract' => $templateContract,
        ]);
    }



}