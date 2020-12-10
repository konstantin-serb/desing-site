<?php

namespace app\modules\admin\controllers;

use app\components\AdminBase;
use app\models\City;
use app\models\Contracts;
use app\models\Currency;
use app\models\forms\admin\AddProjectForm;
use app\models\forms\project\CalculateForm;
use app\models\forms\project\EditCityForm;
use app\models\forms\project\UpdateContractForm;
use app\models\forms\project\UpdateProjectCustomer;
use app\models\forms\project\UpdateProjectMoney;
use app\models\forms\project\UploadProjectPictureForm;
use app\models\forms\stage\AddStageForm;
use app\models\Project;
use app\models\Stage;
use app\models\TemplateContract;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use app\models\Clients;
use yii\web\Response;
use yii\web\UploadedFile;
use app\models\forms\project\UpdateProjectName;
use app\models\forms\project\AddFromTemplateContractForm;

class ProjectController extends Controller
{
    public $layout = 'adminTemplate';

    public function actionIndex()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $this->view->params['activePage'] = 'projects';
        $undeformeds = Project::find()->where(['project_status' => 9])
            ->orderBy('time_update desc')->limit(3)->all();

        return $this->render('index', [
            'underformeds' => $undeformeds,
        ]);
    }


    public function actionView()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);

        return $this->render('view');
    }


    public function actionUndeformeds()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);

        $undeformeds = Project::find()->where(['project_status' => 9])
            ->orderBy('time_update desc')->all();


        return $this->render('undeformeds', [
            'undeformeds' => $undeformeds,
        ]);
    }


    public function actionCreate()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $model = new AddProjectForm();
        $customerObjects = Clients::find()->orderBy('created_at desc')->all();
        $customers = [];
        foreach ($customerObjects as $object) {
            $customers += [$object->id => $object->surname . ' ' . $object->user_name . ' ' . $object->last_name];
        }
        $cityObject = City::find()->orderBy('city asc')->all();
        $city = ArrayHelper::map($cityObject, 'id', 'city');

        $currencyObject = Currency::find()->orderBy('currency asc')->all();
        $currency = ArrayHelper::map($currencyObject, 'id', 'currency');

        $modelPhoto = new UploadProjectPictureForm();
        $projectPhoto = UploadedFile::getInstance($modelPhoto, 'projectPhoto');

        if ($model->load(Yii::$app->request->post())) {
            if ($projectPhoto) {
                if (is_uploaded_file($projectPhoto->tempName)) {
                    $model->image = $modelPhoto->savePicture($projectPhoto);
                    $model->imageMin = $modelPhoto->savePictureMin($projectPhoto);
                }
            } else {
                $model->image = null;
                $model->imageMin = null;
            }
            if ($projectId = $model->save()) {
                return $this->redirect(['/admin/project/create-path2', 'id' => $projectId]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'customers' => $customers,
            'city' => $city,
            'currency' => $currency,
            'modelPhoto' => $modelPhoto,
        ]);
    }

    public function actionCalculateAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new CalculateForm();
        $model->sum = Yii::$app->request->post('price');
        $model->path1 = Yii::$app->request->post('volume1');
        $model->path2 = Yii::$app->request->post('volume2');
        $model->path3 = Yii::$app->request->post('volume3');
        $model->path4 = Yii::$app->request->post('volume4');
        $model->path5 = Yii::$app->request->post('volume5');

        $result = $model->calculate();

        return $result;
    }


    public function actionCreatePath2($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $project = Project::findOne($id);
        $model = new AddProjectForm();
        $stages = Stage::find()->where(['project_id' => $id])->orderBy('number')->all();
        $stageModel = new AddStageForm();

        $currencyObject = Currency::find()->orderBy('currency asc')->all();
        $currency = ArrayHelper::map($currencyObject, 'id', 'currency');

        //Добавляем массив шаблонов
        $templateContracts = TemplateContract::find()->where(['status' => 10])
            ->orderBy('title')->all();
        $contractsArray = [];
        foreach($templateContracts as $contract) {
            $contractsArray += [$contract->id => $contract->title];
        }

        $modelTemplateContract = new AddFromTemplateContractForm;

        $customerObjects = Clients::find()->orderBy('created_at desc')->all();
        $customers = [];
        foreach ($customerObjects as $object) {
            $customers += [$object->id => $object->surname . ' ' . $object->user_name . ' ' . $object->last_name];
        }

        $cityObject = City::find()->orderBy('city asc')->all();
        $city = ArrayHelper::map($cityObject, 'id', 'city');

        $modelPhoto = new UploadProjectPictureForm;

        //Договора:
        $contracts = Contracts::find()->where(['projectId' => $id])->orderBy('sort')->all();
        $updateContract = new UpdateContractForm();

        return $this->render('path2', [
            'project' => $project,
            'model' => $model,
            'stages' => $stages,
            'stageModel' => $stageModel,
            'customers' => $customers,
            'currency' => $currency,
            'modelPhoto' => $modelPhoto,
            'contractsArray' => $contractsArray,
            'modelTemplateContract' => $modelTemplateContract,
            'city' => $city,
            'contracts' => $contracts,
            'updateContract' => $updateContract,
        ]);
    }


    public function actionUpdateNameAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $projectName = new UpdateProjectName();
        $projectName->id = Yii::$app->request->post('projectId');
        $projectName->projectId = Yii::$app->request->post('ident');
        $projectName->nameProject = Yii::$app->request->post('title');

        if ($projectName->updateName()) {
            $project = Project::findOne($projectName->id);
            $title = $projectName->nameProject;
            $projectId = $projectName->projectId;
            return [
                'success' => true,
                'title' => $title,
                'projectId' => $projectId,
                'message' => 'Изменения успешно выполнены!',
            ];
        } else {
            return false;
        }

    }

    public function actionUpdateCustomerAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $projectCustomer = new UpdateProjectCustomer();
        $projectCustomer->projectId = Yii::$app->request->post('projectId');
        $projectCustomer->date = Yii::$app->request->post('date');
        $projectCustomer->customer = Yii::$app->request->post('customer');
        $projectCustomer->area = Yii::$app->request->post('area');
        $projectCustomer->length = Yii::$app->request->post('length');

        if ($projectCustomer->update($projectCustomer->projectId)) {
            $project = Project::findOne($projectCustomer->projectId);

            return [
                'success' => true,
                'date' => $project->getDate($project->date_start),
                'customer' => $project->client->surname . ' ' . $project->client->user_name
                    . ' ' . $project->client->last_name,
                'length' => $project->length,
                'area' => $project->area,
                'message' => 'Изменения успешно выполнены!',
            ];
        }

    }


    public function actionUpdateMoneyAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $money = new UpdateProjectMoney();
        $money->projectId = Yii::$app->request->post('projectId');
        $money->sum = Yii::$app->request->post('sum');
        $money->words = Yii::$app->request->post('words');
        $money->currency = Yii::$app->request->post('currency');
        $money->path1 = Yii::$app->request->post('path1');
        $money->path2 = Yii::$app->request->post('path2');
        $money->path3 = Yii::$app->request->post('path3');
        $money->path4 = Yii::$app->request->post('path4');
        $money->path5 = Yii::$app->request->post('path5');

        if ($money->update($money->projectId)) {
            $project = Project::findOne($money->projectId);
            $result = [
                'success' => true,
                'sum' => $project->price_digital,
                'words' => $project->price_words,
                'currency' => $project->valut->currency,
                'stringPrice' => $project->getStringPrice(),
                'path1' => $project->price_p1,
                'path2' => $project->price_p2,
                'path3' => $project->price_p3,
                'path4' => $project->price_p4,
                'path5' => $project->price_p5,
                'result1' => $project->result1,
                'result2' => $project->result2,
                'result3' => $project->result3,
                'result4' => $project->result4,
                'result5' => $project->result5,
                'deposit' => $this->getDeposit($money->projectId),
            ];
        }

        return $result;
    }


    public function getDeposit($id)
    {
        $this->layout = 'empty';
        $project = Project::findOne($id);

        $code = $this->render('/project/party/deposit', [
            'project' => $project,
        ]);

        return $code;
    }


    public function actionUpdatePhotoAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        if (isset($_POST) AND $_SERVER['REQUEST_METHOD'] == 'POST') {
            $file = new UploadedFile();
            $file->tempName = $_FILES['image']['tmp_name'];
            $file->name = $_FILES['image']['name'];
            $file->type = $_FILES['image']['type'];
            $file->size = $_FILES['image']['size'];
            $file->error = 0;

            $projectId = Yii::$app->request->post('id');
            $updatePhoto = new UploadProjectPictureForm();
            if ($updatePhoto->update($file, $projectId)) {

                $project = Project::findOne($projectId);
                $image = '<img src="'. $project->getImage() . '">';

                return [
                    'success' => true,
                    'image' => $image,
                ];
            }
        }


    }


    public function actionChangeCityAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;


        $project = new EditCityForm();
        $project->id = Yii::$app->request->post('projectId');
        $project->city = Yii::$app->request->post('city');


        if ($project->save()) {
            $newProject = Project::findOne($project->id);
            $answer = [
                'success' => true,
                'city' => $newProject->city_name->city,
            ];
        }

        return $answer;
    }


    public function actionAddContractFromTemplateAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $newContract = new AddFromTemplateContractForm();
        $newContract->projectId = Yii::$app->request->post('projectId');
        $newContract->templateId = Yii::$app->request->post('templateId');
        $newContract->dateContract = Yii::$app->request->post('contractDate');
        $newContract->dateStart = Yii::$app->request->post('projectStartDate');
        $newContract->customer = Yii::$app->request->post('customer');
        $newContract->address = Yii::$app->request->post('address');
        $newContract->priceWords = Yii::$app->request->post('priceWords');
        $newContract->currency = Yii::$app->request->post('currency');
        $newContract->customerInfo = Yii::$app->request->post('customerInfo');

        $result = $newContract->save();

        if ($result) {
            return [
                'success' => true,
                'result' => 'Договор успешно добавлен',
                'code' => $this->getContractsView($newContract->projectId),
            ];
        }
    }


    public function actionUpdateContract($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $model = new UpdateContractForm();
        $contract = Contracts::findOne($id);
        $model->id = $id;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['/admin/project/create-path2', 'id' => $contract->projectId, '#' => 'contractsView']);
            }
        }

        return $this->render('update-contract', [
            'contract' => $contract,
            'model' => $model,
        ]);
    }

    public function actionViewContract($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);

        $contract = Contracts::findOne($id);

        return $this->render('view-contract', [
            'contract' => $contract,
        ]);
    }

    public function actionDeleteContract($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);

        $contract = Contracts::findOne($id);

        if (Yii::$app->request->post()) {
            if ($contract->delete()) {
                return $this->redirect(['/admin/project/create-path2', 'id' => $contract->projectId, '#' => 'contractsView']);
            }
        }

        return $this->render('delete-contract', [
            'contract' => $contract,

        ]);
    }


    private function getContractsView($projectId)
    {
        $this->layout = 'empty';
        $contracts = Contracts::find()->where(['projectId' => $projectId])->orderBy('sort')->all();
        $updateContract = new UpdateContractForm();
        $code = $this->render('/project/party/contracts', [
            'contracts' => $contracts,
            'updateContract' => $updateContract,
        ]);

        return $code;
    }


}






















