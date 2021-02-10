<?php

namespace app\modules\admin\controllers;

use app\components\AdminBase;
use app\components\Storage;
use app\components\Tree;
use app\models\Assignment;
use app\models\AssignmentComments;
use app\models\Characteristic;
use app\models\CharacteristicsTemplates;
use app\models\City;
use app\models\Contracts;
use app\models\Currency;
use app\models\forms\admin\AddProjectForm;
use app\models\forms\assignment\AddAnswerCharacteristics;
use app\models\forms\assignment\AddAnswerQuestions;
use app\models\forms\assignment\AdminAddCharacteristicsForm;
use app\models\forms\assignment\AdminAddQuestionsForm;
use app\models\forms\assignment\UpdateComment;
use app\models\forms\comments\assignment\AddAnswerForm;
use app\models\forms\comments\assignment\AddCommentForm;
use app\models\forms\comments\assignment\UpdateAnswerForm;
use app\models\forms\project\AddFromContractContractForm;
use app\models\forms\project\CalculateForm;
use app\models\forms\project\EditCharacteristicsForm;
use app\models\forms\project\EditCityForm;
use app\models\forms\project\EditQuestionsForm;
use app\models\forms\project\UpdateContractForm;
use app\models\forms\project\UpdateProjectCustomer;
use app\models\forms\project\UpdateProjectMoney;
use app\models\forms\project\UploadProjectPictureForm;
use app\models\forms\stage\AddStageForm;
use app\models\Project;
use app\models\Question;
use app\models\Reference;
use app\models\Stage;
use app\models\TemplateContract;
use app\models\templates\QuestionsTemplates;
use app\models\User;
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
    public $constants = [
        'referencesGeneral' => Reference::TYPE_GENERAL,
        'referencesWall' => Reference::TYPE_WALL,
        'referencesFloor' => Reference::TYPE_FLOOR,
        'referencesFurniture' => Reference::TYPE_FURNITURE,
        'referencesKitchen' => Reference::TYPE_KITCHEN,
        'referencesBathroom' => Reference::TYPE_BATHROOM,
        'referencesRooms' => Reference::TYPE_ROOMS,
        'referencesChild' => Reference::TYPE_CHILD,
        'referencesLiving' => Reference::TYPE_LIVING,
        'referencesDoor' => Reference::TYPE_DOOR,
        'referencesDecor' => Reference::TYPE_DECOR,
    ];

    public function actionIndex()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $this->view->params['activePage'] = 'projects';
        $undeformeds = Project::find()
            ->where(['in', 'project_status', [Project::STATUS_UNDERFORMED, Project::STATUS_FOR_ASSIGNMENT]])
            ->orderBy('time_update desc')
            ->limit(3)->all();

        return $this->render('index', [
            'underformeds' => $undeformeds,
        ]);
    }


    public function actionView()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);

        return $this->render('view');
    }


    public function actionProjectAssignment($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $assignment = Assignment::find()->where(['project_id'=>$id])->one();
        $assignmentId = $assignment->id;
        $commentModel = new AddCommentForm();

        $allComments = AssignmentComments::find()->where(['project_id'=> $id])->all();

        if ($commentModel->load(Yii::$app->request->post())) {
            $commentModel->commentatorId = Yii::$app->user->identity->getId();
            $commentModel->projectId = $id;
            if (Yii::$app->user->identity->status == User::STATUS_ADMIN) {
                $commentModel->userType = AssignmentComments::ADMIN;
            } else {
                $commentModel->userType = AssignmentComments::EMPLOYEE;

            }
            if ($commentModel->save()) {
                return $this->redirect(['project-assignment', 'id' => $id, '#' => $commentModel->type]);
            }
        }

        $answer = new AddAnswerForm();
        $updateAnswerModel = new UpdateAnswerForm();

        if ($answer->load(Yii::$app->request->post())) {
            $answer->commentatorId = Yii::$app->user->identity->getId();
            $answer->projectId = $id;
            $answer->userType = User::getUserStatus($answer->commentatorId);

            if ($answer->save()) {
                return $this->redirect(['project-assignment', 'id' => $id, '#' => $answer->type]);
            }
        }
        if($updateAnswerModel->load(Yii::$app->request->post())) {
            if($updateAnswerModel->save()){
                return $this->redirect(['project-assignment', 'id' => $id, '#' => $updateAnswerModel->type]);
            }
        }
        $constants = $this->constants;
        foreach($constants as $key => $value) {
            ${$key} = Reference::find()->where(['type' => $value])
                ->andWhere(['assignment_id' => $assignmentId])
                ->andWhere(['!=','description', 'null'])
                ->orderBy('sort')
                ->all();
        }

        return $this->render('assignment', [
            'assignment' => $assignment,
            'referencesGeneral' => $referencesGeneral,
            'referencesWall' => $referencesWall,
            'referencesFloor' => $referencesFloor,
            'referencesFurniture' => $referencesFurniture,
            'referencesKitchen' => $referencesKitchen,
            'referencesBathroom' => $referencesBathroom,
            'referencesRooms' => $referencesRooms,
            'referencesChild' => $referencesChild,
            'referencesLiving' => $referencesLiving,
            'referencesDoor' => $referencesDoor,
            'referencesDecor' => $referencesDecor,

            'commentModel' => $commentModel,
            'allComments' => $allComments,
            'answer' => $answer,
            'updateAnswerModel' => $updateAnswerModel,
            'userId' => Yii::$app->user->identity->getId(),
            'projectId' => $id,
        ]);
    }

    public function actionDeleteCommentAjax()
    {
        $type = Yii::$app->request->post('type');
        $id = Yii::$app->request->post('id');
        $projectId = Yii::$app->request->post('projectId');
        $comment = AssignmentComments::findOne($id);
        if ($comment && $comment->delete()) {
            return true;
        }
    }


    public function actionUndeformeds()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);

        $undeformeds = Project::find()->where(['in', 'project_status', [8, 9]])
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
                $assignment = new Assignment();
                $assignment->project_id = $projectId;
                $assignment->address = $model->address;
                $assignment->time_create = time();
                $assignment->status = Assignment::STATUS_CREATE;
                $assignment->time_update = $assignment->time_create;
                if ($assignment->save()) {
                    return $this->redirect(['/admin/project/create-path2', 'id' => $projectId]);
                }
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
        foreach ($templateContracts as $contract) {
            $contractsArray += [$contract->id => $contract->title];
        }
        $contracts = Contracts::find()->all();
        $projectContractArray = [];
        foreach ($contracts as $itemContract) {
            $projectContractArray += [$itemContract->id => $itemContract->title];
        }

        $templateQuestions = QuestionsTemplates::find()->all();
        $questionsArray = ArrayHelper::map($templateQuestions, 'id', 'title');
        $templateCharacteristic = CharacteristicsTemplates::find()->all();
        $characteristicArray = ArrayHelper::map($templateCharacteristic, 'id', 'title');
        $questionModel = new AdminAddQuestionsForm();
        $characteristicModel = new AdminAddCharacteristicsForm();

        $modelTemplateContract = new AddFromTemplateContractForm;
        $modelContract = new AddFromContractContractForm();

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
            'questionsArray' => $questionsArray,
            'characteristicArray' => $characteristicArray,
            'questionModel' => $questionModel,
            'characteristicModel' => $characteristicModel,
            'projectContractArray' => $projectContractArray,
            'modelContract' => $modelContract,
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
                $image = '<img src="' . $project->getImage() . '">';

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


    public function actionAddContractFromContractAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $newContract = new AddFromContractContractForm();
        $newContract->projectId = Yii::$app->request->post('projectId');
        $newContract->contractId = Yii::$app->request->post('contractId');
        $newContract->dateContract = Yii::$app->request->post('contractDate');
        $newContract->dateStart = Yii::$app->request->post('projectStartDate');
        $newContract->customer = Yii::$app->request->post('customer');
        $newContract->address = Yii::$app->request->post('address');
        $newContract->priceWords = Yii::$app->request->post('priceWords');
        $newContract->currency = Yii::$app->request->post('currency');
        $newContract->customerInfo = Yii::$app->request->post('customerInfo');

        if ($newContract->save()) {
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

    public function actionAddAvailableAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->post('projectId');
        $project = Project::findOne($id);
        $project->project_status = Project::STATUS_FOR_ASSIGNMENT;

        if ($project->save()) {
            $content = '<div class="hiddenInputs"></div>';
            return [
                'success' => true,
                'content' => $content,
            ];
        }
    }


    public function actionCharacteristicsView($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $assignment = Assignment::find()->where(['project_id' => $id])->one();
        $questions = Characteristic::find()->where(['assignment_id' => $assignment->id])
            ->orderBy('sort')->all();
        $model = new EditCharacteristicsForm();
        $project = Project::findOne($id);

        return $this->render('characteristics-view', [
            'model' => $model,
            'questions' => $questions,
            'project' => $project,

        ]);
    }


    public function actionQuestionsView($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $assignment = Assignment::find()->where(['project_id' => $id])->one();
        $questions = Question::find()->where(['assignment_id' => $assignment->id])
            ->orderBy('sort')->all();
        $model = new EditCharacteristicsForm();
        $project = Project::findOne($id);

        return $this->render('questions-view', [
            'model' => $model,
            'questions' => $questions,
            'project' => $project,

        ]);
    }


    public function actionCreateCharacteristicAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new EditCharacteristicsForm();
        $model->question = Yii::$app->request->post('question');
        $model->projectId = Yii::$app->request->post('projectId');
        $model->description = Yii::$app->request->post('description');

        if ($model->save()) {
            $value = $this->getCharacteristic($model->projectId);
            return [
                'value' => $value,
            ];
        }
    }


    public function actionCreateQuestionsAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new EditQuestionsForm();
        $model->question = Yii::$app->request->post('question');
        $model->projectId = Yii::$app->request->post('projectId');
        $model->description = Yii::$app->request->post('description');

        if ($model->save()) {
            $value = $this->getQuestion($model->projectId);
            return [
                'value' => $value,
            ];
        }
    }


    public function getCharacteristic($projectId)
    {
        $this->layout = 'empty';
        $assignment = Assignment::find()->where(['project_id' => $projectId])
            ->one();
        $assignmentId = $assignment->id;
        $newQuestions = Characteristic::find()
            ->where(['assignment_id' => $assignmentId])
            ->orderBy('sort')->all();

        return $this->render('/project/party/characteristic', [
            'questions' => $newQuestions,
        ]);
    }


    public function getQuestion($projectId)
    {
        $this->layout = 'empty';
        $assignment = Assignment::find()->where(['project_id' => $projectId])
            ->one();
        $assignmentId = $assignment->id;
        $newQuestions = Question::find()
            ->where(['assignment_id' => $assignmentId])
            ->orderBy('sort')->all();

        return $this->render('/project/party/characteristic', [
            'questions' => $newQuestions,
        ]);
    }


    public function actionUpdateCharacteristic($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $question = Characteristic::findOne($id);
        $assignment = Assignment::findOne($question->assignment_id);
        if ($question->status == Characteristic::NO_EDITED) {
            return $this->redirect(['characteristics-view', 'id' => $assignment->project_id,]);
        }
        $model = new EditCharacteristicsForm();
        $arrayBlank = Characteristic::find()
            ->where(['assignment_id' => $question->assignment_id])
            ->orderBy('sort')->all();

        $nom = 0;
        $array = [];
        foreach ($arrayBlank as $item) {
            $nom = $nom + 1;
            $array += [$item->sort => $nom];
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->update($id)) {

                return $this->redirect(['characteristics-view', 'id' => $assignment->project_id, '#' => 'question-' . $question->id]);
            }
        }

        return $this->render('update-characteristic', [
            'question' => $question,
            'model' => $model,
            'array' => $array,
        ]);
    }


    public function actionUpdateQuestion($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $question = Question::findOne($id);
        $assignment = Assignment::findOne($question->assignment_id);
        if ($question->status == Question::NO_EDITED) {
            return $this->redirect(['questions-view', 'id' => $assignment->project_id, ]);
        }
        $model = new EditQuestionsForm();
        $arrayBlank = Question::find()
            ->where(['assignment_id' => $question->assignment_id])
            ->orderBy('sort')->all();

        $nom = 0;
        $array = [];
        foreach ($arrayBlank as $item) {
            $nom = $nom + 1;
            $array += [$item->sort => $nom];
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->update($id)) {

                return $this->redirect(['questions-view', 'id' => $assignment->project_id, '#' => 'question-'.$question->id]);
            }
        }

        return $this->render('update-question', [
            'question' => $question,
            'model' => $model,
            'array' => $array,
        ]);
    }


    public function actionDeleteCharacteristic($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $question = $question = Characteristic::findOne($id);
        $assignment = Assignment::findOne($question->assignment_id);
        if ($question->status == Characteristic::NO_EDITED) {
            return $this->redirect(['characteristics-view', 'id' => $assignment->project_id,]);
        }

        if (Yii::$app->request->post()) {
            $question->delete();
            return $this->redirect(['characteristics-view', 'id' => $question->assignment_id]);
        }

        return $this->render('delete-characteristic', [
            'question' => $question,
        ]);
    }


    public function actionDeleteQuestion($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $question = $question = Question::findOne($id);
        $assignment = Assignment::findOne($question->assignment_id);
        if ($question->status == Question::NO_EDITED) {
            return $this->redirect(['questions-view', 'id' => $assignment->project_id,]);
        }

        if (Yii::$app->request->post()) {
            $question->delete();
            return $this->redirect(['questions-view', 'id' => $question->assignment_id]);
        }

        return $this->render('delete-question', [
            'question' => $question,
        ]);
    }


    public function actionReferenceView($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $reference = Reference::findOne($id);

        return $this->render('ref-view', [
            'reference' => $reference,
        ]);
    }

    public function actionQuestionsNewView($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $questions = Question::find()->where(['assignment_id' => $id])
            ->orderBy('sort')->all();

        return $this->render('questions-new-view', [
            'questions' => $questions,
        ]);
    }


    public function actionCharacteristicsNewView($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $questions = Characteristic::find()->where(['assignment_id' => $id])
            ->orderBy('sort')->all();

        return $this->render('characteristics-new-view', [
            'questions' => $questions,
        ]);
    }

}






















