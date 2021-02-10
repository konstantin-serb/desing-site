<?php

namespace app\modules\customer\controllers;

use app\components\Tree;
use app\models\Assignment;
use app\models\AssignmentComments;
use app\models\Characteristic;
use app\models\forms\assignment\AddAnswerCharacteristics;
use app\models\forms\assignment\AddAnswerQuestions;
use app\models\forms\assignment\AddAssignment;
use app\models\forms\assignment\AddComment;
use app\models\forms\assignment\UpdateAssignmentForm;
use app\models\forms\assignment\UpdateComment;
use app\models\forms\assignment\UploadReferencePictureForm;
use app\models\forms\assignment\UpdateReferencePictureForm;
use app\models\forms\comments\assignment\AddAnswerForm;
use app\models\forms\comments\assignment\UpdateAnswerForm;
use app\models\Question;
use app\models\Reference;
use app\models\User;
use yii\web\Controller;
use app\components\AdminBase;
use Yii;
use yii\web\Response;
use yii\web\UploadedFile;
use app\components\Storage;

class AssignmentController extends Controller
{
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


   public $layout = 'customerTemplate';


    public function actionIndex()
    {
        if (!AdminBase::isCustomer()) return $this->redirect(['/']);
        return $this->render('index', [

        ]);
    }


    public function actionView($id)
    {
        if (!AdminBase::isCustomer()) return $this->redirect(['/']);

        $assignment = Assignment::find()->where(['project_id' => $id])->one();
        $model = new UpdateAssignmentForm();
        $model->assignmentId = $assignment->id;

        $referenceModel = new UploadReferencePictureForm();
        $questionNotAnswer = Question::find()->where(['assignment_id'=>$assignment->id])
            ->andWhere(['answer' => ''])->count();

        $constants = $this->constants;
        foreach($constants as $key => $value) {
            ${$key} = Reference::find()->where(['type' => $value])
                ->andWhere(['assignment_id' => $assignment->id])
                ->andWhere(['!=','description', 'null'])
                ->orderBy('sort')
                ->all();
        }

        $allComments = AssignmentComments::find()->where(['project_id'=> $id])->all();
        $answer = new AddAnswerForm();
        if ($answer->load(Yii::$app->request->post())) {
            $answer->commentatorId = Yii::$app->user->identity->getId();
            $answer->projectId = $id;
            $answer->userType = User::getUserStatus($answer->commentatorId);


            if ($answer->save()) {
                return $this->redirect(['view', 'id' => $id, '#' => $answer->type]);
            }
        }

        $updateAnswerModel = new UpdateAnswerForm();
        if($updateAnswerModel->load(Yii::$app->request->post())) {
            if($updateAnswerModel->save()){
                return $this->redirect(['view', 'id' => $id, '#' => $updateAnswerModel->type]);
            }
        }


        return $this->render('view', [
            'assignment' => $assignment,
            'referenceModel' => $referenceModel,
            'references' => $referencesGeneral,
            'questionNotAnswer' => $questionNotAnswer,
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

            'allComments' => $allComments,
            'answer' => $answer,
            'updateAnswerModel' => $updateAnswerModel,
            'userId' => Yii::$app->user->identity->getId(),
            'projectId' => $id,
            'model' => $model,
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


    private function getArray($object)
    {
        $globCommArray = [];
        foreach ($object as $key => $value)
        {
            $globCommArray += [$value->id => [
                'id' => $value->id,
                'comment' => $value->comment,
                'parents_id' => $value->parents_id,
                'commentator_id' => $value->commentator_id,
                'user_type' => $value->user_type,
                'date_create' => $value->date_create,
                'date_update' => $value->date_update,
            ]];
        }
        return $globCommArray;
    }

    public function actionReferenceView($id)
    {
        if (!AdminBase::isCustomer()) return $this->redirect(['/']);
        $reference = Reference::findOne($id);
        $model = new UpdateComment();

        if (Yii::$app->request->post()) {
            $assignment = Assignment::findOne($reference->assignment_id);
            Storage::clean($reference->image);
            Storage::clean($reference->full_image);

            $constants = [
                Reference::TYPE_GENERAL => '',
                Reference::TYPE_WALL => 'Wall',
                Reference::TYPE_FLOOR => 'Floor',
                Reference::TYPE_FURNITURE =>'Furniture',
                Reference::TYPE_KITCHEN =>'Kitchen',
                Reference::TYPE_BATHROOM => 'Bathroom',
                Reference::TYPE_ROOMS => 'Rooms',
                Reference::TYPE_CHILD => 'Child',
                Reference::TYPE_LIVING => 'Living',
                Reference::TYPE_DOOR => 'Door',
                Reference::TYPE_DECOR => 'Decor',
            ];

            foreach ($constants as $key => $val) {
                if ($reference->type == $key) {
                    $path = 'referenceBlock'.$val;
                }
            }

            if ($reference->delete()) {
                $assignment->time_update = time();
                $assignment->save();
            }

            return $this->redirect(['/customer/assignment/view',
                'id' => $assignment->project_id, '#' => $path]);
        }

        return $this->render('ref-view', [
            'reference' => $reference,
            'model' => $model,
        ]);
    }


    public function actionCreate($id)
    {
        if (!AdminBase::isCustomer()) return $this->redirect(['/']);

        $model = new AddAssignment();
        $model->projectId = $id;

        if ($model->load(Yii::$app->request->post())) {
            if ($assignmentId = $model->save()) {
                return $this->redirect(['/customer/assignment/view', 'assignment' => $assignmentId]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }


    public function actionAddPhotoAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        if (isset($_POST) AND $_SERVER['REQUEST_METHOD'] == 'POST') {
            $file = new UploadedFile();
            $file->tempName = $_FILES['image']['tmp_name'];
            $file->name = $_FILES['image']['name'];
            $file->type = $_FILES['image']['type'];
            $file->size = $_FILES['image']['size'];
            $file->error = 0;

            $assignmentId = Yii::$app->request->post('id');
            $referenceType = Yii::$app->request->post('type');
            $newPhoto = new UploadReferencePictureForm();
            $newPhoto->type = $referenceType;


            if ($idReference = $newPhoto->addImage($file, $assignmentId)) {
                $newPhoto->addFullImage($file, $idReference);

                $reference = Reference::findOne($idReference);
                $image = '<img class="preliminary" src="'. $reference->getFullImage() . '">';

                $constants = [
                    Reference::TYPE_GENERAL => '',
                    Reference::TYPE_WALL => 'Wall',
                    Reference::TYPE_FLOOR => 'Floor',
                    Reference::TYPE_FURNITURE =>'Furniture',
                    Reference::TYPE_KITCHEN =>'Kitchen',
                    Reference::TYPE_BATHROOM => 'Bathroom',
                    Reference::TYPE_ROOMS => 'Rooms',
                    Reference::TYPE_CHILD => 'Child',
                    Reference::TYPE_LIVING => 'Living',
                    Reference::TYPE_DOOR => 'Door',
                    Reference::TYPE_DECOR => 'Decor',
                ];

                foreach($constants as $key => $val) {
                    if ($newPhoto->type == $key) {
                        $imageType = 'image'.$val;
                        $commentForm = $this->getNewCommentForm($idReference, $val);
                    }
                }

                return [
                    $imageType => $image,
                    'commentForm' => $commentForm,
                ];
            }

            return false;
        }
        return false;
    }

    public function getNewCommentForm($idReference, $name)
    {
        $this->layout = 'empty';
        $nameFunction = 'app\models\forms\assignment\Add'.$name.'Comment';

        $model = new $nameFunction;
        return $this->render('/assignment/party/add-comment', [
            'model' => $model,
            'idReference' => $idReference,
            'buttonId' => 'addReference'.$name,
        ]);
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

            $referenceId = Yii::$app->request->post('id');
            $newPhoto = new UpdateReferencePictureForm();
            if ($newPhoto->addImage($file, $referenceId)) {
                $newPhoto->addFullImage($file, $referenceId);

                $reference = Reference::findOne($referenceId);
                $image = '<img src="'. $reference->getFullImage() . '">';

                return [
                    'image' => $image,
                ];
            }

            return false;
        }
        return false;
    }


    public function actionAddCommentAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $reference = new AddComment();
        $reference->referenceId = Yii::$app->request->post('referenceId');
        $reference->comment = Yii::$app->request->post('comment');
        $oldReference = Reference::findOne($reference->referenceId);

        $constants = [
            Reference::TYPE_GENERAL => '',
            Reference::TYPE_WALL => 'Wall',
            Reference::TYPE_FLOOR => 'Floor',
            Reference::TYPE_FURNITURE =>'Furniture',
            Reference::TYPE_KITCHEN =>'Kitchen',
            Reference::TYPE_BATHROOM => 'Bathroom',
            Reference::TYPE_ROOMS => 'Rooms',
            Reference::TYPE_CHILD => 'Child',
            Reference::TYPE_LIVING => 'Living',
            Reference::TYPE_DOOR => 'Door',
            Reference::TYPE_DECOR => 'Decor',
        ];

        if ($reference->save()) {
            foreach ($constants as $key => $val) {
                if ($oldReference->type == $key) {
                    $referenceName = 'references'.$val;
                    $referenceAll = $this->getReferences($oldReference->assignment_id,
                        $key);
                }
            }

            return [
                'success' => true,
                $referenceName => $referenceAll,
            ];
        }


        return 'actionAddCommentAjax';
    }

    public function actionUpdateCommentAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $reference = new UpdateComment();
        $reference->referenceId = Yii::$app->request->post('referenceId');
        $reference->comment = Yii::$app->request->post('comment');
        $reference->sort = Yii::$app->request->post('sort');

        if ($reference->save()) {
            return [
                'success' => true,
                'comment' => $reference->comment,
            ];
        }
        return false;
    }


    public function getReferences($assignmentId, $type)
    {
        $this->layout = 'empty';
        $references = Reference::find()->where(['type' => $type])
            ->andWhere(['assignment_id' => $assignmentId])
            ->orderBy('sort')
            ->all();

        return $this->render('/assignment/party/references', [
            'references' => $references,
        ]);
    }


    public function actionQuestionsView($id)
    {
        if (!AdminBase::isCustomer()) return $this->redirect(['/']);
        $questions = Question::find()->where(['assignment_id' => $id])
        ->orderBy('sort')->all();
        $model = new AddAnswerQuestions();

        return $this->render('questions-view', [
            'questions' => $questions,
            'model' => $model,
        ]);
    }


    public function actionCharacteristicsView($id)
    {
        if (!AdminBase::isCustomer()) return $this->redirect(['/']);
        $questions = Characteristic::find()->where(['assignment_id' => $id])
            ->orderBy('sort')->all();
        $model = new AddAnswerCharacteristics();

        return $this->render('characteristics-view', [
            'questions' => $questions,
            'model' => $model,
        ]);
    }


    public function actionAddAnswerAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new AddAnswerQuestions();
        $model->answer = Yii::$app->request->post('answer');
        $model->question_id = Yii::$app->request->post('questionId');

        if ($model->save()) {
            $question = Question::findOne($model->question_id);
            $content = $this->getContentQuestion($question->id);
            if ($content) {
                $button = 'Изменить ответ';
            } else { $button='Добавить ответ';}

            if ($content) {
                $ok = ' <svg width="110" height="98" viewBox="0 0 110 98" fill="none" xmlns="http://www.w3.org/2000/svg">
<ellipse cx="51.8953" cy="82.8181" rx="51.5336" ry="6.47059" transform="rotate(-9.48803 51.8953 82.8181)" fill="url(#paint0_radial)"/>
<path d="M40.6723 45.2941C30.5042 39.5168 23.5714 46.6807 20.5672 50.3782L26.8067 53.3824L40.6723 45.2941Z" fill="url(#paint1_linear)"/>
<path d="M37.8992 44.8319C33.2773 45.2017 28.4244 50.3782 26.5756 52.9202C28.9636 53.8445 34.5714 57.3109 37.8992 63.7815C41.2269 70.2521 45.2941 80.6513 46.9118 85.042C49.6849 82.2689 56.0784 77.2619 58.9286 75.105C74.2731 41.0882 99.8319 10.8613 110 3.0042L107.689 0C84.5798 14.0504 61.0854 47.2969 52.2269 62.1639L47.3739 52.458C46.1414 49.7619 42.521 44.4622 37.8992 44.8319Z" fill="url(#paint2_linear)"/>
<path d="M107.689 0C84.5798 14.0504 61.0854 47.2969 52.2269 62.1639L48.0672 53.8445C48.6219 52.1807 56.4636 41.1345 60.3151 35.8193C70.6681 22.5084 88.2773 6.2395 97.2899 0.92437L107.689 0Z" fill="url(#paint3_radial)"/>
<path d="M37.8991 63.7815C41.2269 70.2521 45.2941 80.6513 46.9118 85.042C46.6807 85.2731 46.4496 85.1961 46.2185 85.042L39.8103 81.1513C39.8084 81.187 39.7854 81.1698 39.7479 81.1135L39.8103 81.1513C39.8239 80.8944 38.7472 77.8936 34.2017 67.0168C29.0252 54.6303 23.5714 52.6891 20.7983 50.6093L26.5756 52.9202C28.9636 53.8445 34.5714 57.3109 37.8991 63.7815Z" fill="url(#paint4_linear)"/>
<defs>
<radialGradient id="paint0_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(51.8953 82.8181) rotate(92.7263) scale(4.85844 38.694)">
<stop stop-color="#D7D7D7"/>
<stop offset="1" stop-color="#C4C4C4" stop-opacity="0"/>
</radialGradient>
<linearGradient id="paint1_linear" x1="39.7479" y1="40.6723" x2="24.0336" y2="51.5336" gradientUnits="userSpaceOnUse">
<stop stop-color="#1BD10D"/>
<stop offset="1" stop-color="#0EA605"/>
</linearGradient>
<linearGradient id="paint2_linear" x1="68.2878" y1="0" x2="68.2878" y2="85.042" gradientUnits="userSpaceOnUse">
<stop stop-color="#1CB213"/>
<stop offset="1" stop-color="#1BAA12"/>
</linearGradient>
<radialGradient id="paint3_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(49.2227 58.9286) rotate(-49.887) scale(44.1169 43.2777)">
<stop stop-color="#0A5506"/>
<stop offset="1" stop-color="#1CF10D"/>
</radialGradient>
<linearGradient id="paint4_linear" x1="24.2647" y1="50.3782" x2="46.6807" y2="85.042" gradientUnits="userSpaceOnUse">
<stop stop-color="#87F37D"/>
<stop offset="1" stop-color="#2BD81E"/>
</linearGradient>
</defs>
</svg>';
            } else { $ok='';}
            return [
                'success' => true,
                'content' => $content,
                'button' => $button,
                'ok' => $ok,
                'checkAnswer' => $this->checkAnswer($question->id),
                'createUpdate' => $question->getDateTime(),
            ];
        }
    }


    public function getContentQuestion($id)
    {

        $question = Question::findOne($id);

        return $question->answer;
    }

    private function checkAnswer($id)
    {
        $question = Question::findOne($id);
        if ($question->answer) {
            return true;
        }
        return false;
    }


    public function actionAddAnswerCharacteristicAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new AddAnswerCharacteristics();
        $model->answer = Yii::$app->request->post('answer');
        $model->question_id = Yii::$app->request->post('questionId');

        if ($model->save()) {
            $question = Characteristic::findOne($model->question_id);
            $content = $this->getContentCharacteristic($question->id);
            if ($content) {
                $button = 'Изменить ответ';
            } else { $button='Добавить ответ';}

            if ($content) {
                $ok = ' <svg width="110" height="98" viewBox="0 0 110 98" fill="none" xmlns="http://www.w3.org/2000/svg">
<ellipse cx="51.8953" cy="82.8181" rx="51.5336" ry="6.47059" transform="rotate(-9.48803 51.8953 82.8181)" fill="url(#paint0_radial)"/>
<path d="M40.6723 45.2941C30.5042 39.5168 23.5714 46.6807 20.5672 50.3782L26.8067 53.3824L40.6723 45.2941Z" fill="url(#paint1_linear)"/>
<path d="M37.8992 44.8319C33.2773 45.2017 28.4244 50.3782 26.5756 52.9202C28.9636 53.8445 34.5714 57.3109 37.8992 63.7815C41.2269 70.2521 45.2941 80.6513 46.9118 85.042C49.6849 82.2689 56.0784 77.2619 58.9286 75.105C74.2731 41.0882 99.8319 10.8613 110 3.0042L107.689 0C84.5798 14.0504 61.0854 47.2969 52.2269 62.1639L47.3739 52.458C46.1414 49.7619 42.521 44.4622 37.8992 44.8319Z" fill="url(#paint2_linear)"/>
<path d="M107.689 0C84.5798 14.0504 61.0854 47.2969 52.2269 62.1639L48.0672 53.8445C48.6219 52.1807 56.4636 41.1345 60.3151 35.8193C70.6681 22.5084 88.2773 6.2395 97.2899 0.92437L107.689 0Z" fill="url(#paint3_radial)"/>
<path d="M37.8991 63.7815C41.2269 70.2521 45.2941 80.6513 46.9118 85.042C46.6807 85.2731 46.4496 85.1961 46.2185 85.042L39.8103 81.1513C39.8084 81.187 39.7854 81.1698 39.7479 81.1135L39.8103 81.1513C39.8239 80.8944 38.7472 77.8936 34.2017 67.0168C29.0252 54.6303 23.5714 52.6891 20.7983 50.6093L26.5756 52.9202C28.9636 53.8445 34.5714 57.3109 37.8991 63.7815Z" fill="url(#paint4_linear)"/>
<defs>
<radialGradient id="paint0_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(51.8953 82.8181) rotate(92.7263) scale(4.85844 38.694)">
<stop stop-color="#D7D7D7"/>
<stop offset="1" stop-color="#C4C4C4" stop-opacity="0"/>
</radialGradient>
<linearGradient id="paint1_linear" x1="39.7479" y1="40.6723" x2="24.0336" y2="51.5336" gradientUnits="userSpaceOnUse">
<stop stop-color="#1BD10D"/>
<stop offset="1" stop-color="#0EA605"/>
</linearGradient>
<linearGradient id="paint2_linear" x1="68.2878" y1="0" x2="68.2878" y2="85.042" gradientUnits="userSpaceOnUse">
<stop stop-color="#1CB213"/>
<stop offset="1" stop-color="#1BAA12"/>
</linearGradient>
<radialGradient id="paint3_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(49.2227 58.9286) rotate(-49.887) scale(44.1169 43.2777)">
<stop stop-color="#0A5506"/>
<stop offset="1" stop-color="#1CF10D"/>
</radialGradient>
<linearGradient id="paint4_linear" x1="24.2647" y1="50.3782" x2="46.6807" y2="85.042" gradientUnits="userSpaceOnUse">
<stop stop-color="#87F37D"/>
<stop offset="1" stop-color="#2BD81E"/>
</linearGradient>
</defs>
</svg>';
            } else { $ok='';}
            return [
                'success' => true,
                'content' => $content,
                'button' => $button,
                'ok' => $ok,
                'checkAnswer' => $this->checkAnswer2($question->id),
                'createUpdate' => $question->getDateTime(),
            ];
        }
    }


    public function getContentCharacteristic($id)
    {

        $question = Characteristic::findOne($id);

        return $question->answer;
    }

    private function checkAnswer2($id)
    {
        $question = Characteristic::findOne($id);
        if ($question->answer) {
            return true;
        }
        return false;
    }




}














