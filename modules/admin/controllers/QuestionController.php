<?php


namespace app\modules\admin\controllers;

use app\models\CharacteristicsTemplates;
use app\models\forms\assignment\AdminAddCharacteristicsForm;
use app\models\forms\assignment\AdminAddQuestionsForm;
use app\models\forms\template\AddCharacteristicTemplateForm;
use app\models\forms\template\AddQuestionTemplateForm;
use app\models\forms\template\CreateMainCharacteristicsForm;
use app\models\forms\template\CreateMainQuestionForm;
use app\models\OneCharacteristicTempate;
use app\models\Project;
use app\models\templates\OneQuestionTemplate;
use app\models\templates\QuestionsTemplates;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use app\components\AdminBase;
use yii\web\Response;

class QuestionController extends Controller
{
    public $layout = 'adminTemplate';

    public function actionIndex()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $questionsTemplates = QuestionsTemplates::find()->orderBy('id')->all();

        return $this->render('index', [
            'questionsTemplates' => $questionsTemplates,
        ]);
    }


    public function actionCharacteristicIndex()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $characteristics = CharacteristicsTemplates::find()
            ->orderBy('id')->all();


        return $this->render('characteristic-index', [
            'characteristics' => $characteristics,
        ]);
    }



    public function actionQuestionIndex()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $questions = QuestionsTemplates::find()
            ->orderBy('id')->all();

        return $this->render('question-index', [
            'questions' => $questions,
        ]);
    }


    public function actionCreateQuestionType()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $model = new AddQuestionTemplateForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['question-index']);
            }
        }

        return $this->render('create-question-type', [
            'model' => $model,
        ]);
    }


    public function actionUpdateQuestionType($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $model = new AddQuestionTemplateForm();
        $template = QuestionsTemplates::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            if ($model->update($id)) {
                return $this->redirect(['question-index']);
            }
        }

        return $this->render('update-question-type', [
            'model' => $model,
            'template' => $template,
        ]);
    }


    public function actionDeleteQuestionType($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $template = QuestionsTemplates::findOne($id);
        if (Yii::$app->request->post()) {
            $template->delete();
            $questions = OneQuestionTemplate::deleteAll(['template_id' => $id]);
            return $this->redirect('question-index');
        }

        return $this->render('delete-question-type', [
            'template' => $template,
        ]);
    }


    public function actionCreateCharacteristicType()
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $model = new AddCharacteristicTemplateForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['characteristic-index']);
            }
        }

        return $this->render('create-characteristic-type', [
            'model' => $model,
        ]);
    }


    public function actionUpdateCharacteristicType($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $model = new AddCharacteristicTemplateForm();
        $template = CharacteristicsTemplates::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            if ($model->update($id)) {
                return $this->redirect(['characteristic-index']);
            }
        }

        return $this->render('update-characteristic-type', [
            'model' => $model,
            'template' => $template,
        ]);
    }


    public function actionDeleteCharacteristicType($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $template = CharacteristicsTemplates::findOne($id);
        if (Yii::$app->request->post()) {
            $template->delete();
            $questions = OneCharacteristicTempate::deleteAll(['template_id' => $id]);
            return $this->redirect('characteristic-index');
        }

        return $this->render('delete-characteristic-type', [
            'template' => $template,
        ]);
    }



    public function actionQuestionsView($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $template = QuestionsTemplates::findOne($id);
        $model = new CreateMainQuestionForm();
        $newQuestions = OneQuestionTemplate::find()
            ->where(['template_id' => $id])
            ->orderBy('sort')->all();


        return $this->render('questions-view', [
            'template' => $template,
            'model' => $model,
            'newQuestions' => $newQuestions,
        ]);
    }


    public function actionCharacteristicView($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $template = CharacteristicsTemplates::findOne($id);
        $model = new CreateMainQuestionForm();
        $newQuestions = OneCharacteristicTempate::find()
            ->where(['template_id' => $id])
            ->orderBy('sort')->all();


        return $this->render('characteristics-view', [
            'template' => $template,
            'model' => $model,
            'newQuestions' => $newQuestions,
        ]);
    }


    public function actionCreateQuestionAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new CreateMainQuestionForm();
        $model->question = Yii::$app->request->post('question');
        $model->templateId = Yii::$app->request->post('templateId');
        $model->description = Yii::$app->request->post('description');


        if ($model->save()) {
            $value = $this->getQuestions($model->templateId);
            return [
                'value' => $value,
            ];
        }

        return 'actionCreateQuestion';
    }

    public function actionCreateCharacteristicAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new CreateMainCharacteristicsForm();
        $model->question = Yii::$app->request->post('question');
        $model->templateId = Yii::$app->request->post('templateId');
        $model->description = Yii::$app->request->post('description');

        if ($model->save()) {
            $value = $this->getCharacteristic($model->templateId);
            return [
                'value' => $value,
            ];
        }
    }


    public function actionCreateQuestionsForProjectAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new AdminAddQuestionsForm();
        $model->projectId = Yii::$app->request->post('projectId');
        $model->questionTemplateId = Yii::$app->request->post('templateId');
        if ($model->save()) {
            return [
                'value' => $this->getAssignmentBlock($model->projectId),
            ];
        }


    }


    public function actionCreateCharacteristicsForProjectAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new AdminAddCharacteristicsForm();
        $model->projectId = Yii::$app->request->post('projectId');
        $model->characteristicTemplateId = Yii::$app->request->post('templateId');
        if ($model->save()) {
            return [
                'value' => $this->getAssignmentBlock($model->projectId),
            ];
        }


    }

    public function getAssignmentBlock($projectId)
    {
        $this->layout = 'empty';
        $project = Project::findOne($projectId);
        $questionModel = new AdminAddQuestionsForm();
        $characteristicModel = new AdminAddCharacteristicsForm();
        $templateQuestions = QuestionsTemplates::find()->all();
        $questionsArray = ArrayHelper::map($templateQuestions, 'id', 'title');
        $templateCharacteristic = CharacteristicsTemplates::find()->all();
        $characteristicArray = ArrayHelper::map($templateCharacteristic, 'id', 'title');

        return $this->render('/project/party/blockAssignment', [
            'project' => $project,
            'characteristicModel' => $characteristicModel,
            'characteristicArray' => $characteristicArray,
            'questionModel' => $questionModel,
            'questionsArray' => $questionsArray,
        ]);

    }


    public function getQuestions($templateId)
    {
        $this->layout = 'empty';
        $newQuestions = OneQuestionTemplate::find()
            ->where(['template_id' => $templateId])
            ->orderBy('sort')->all();

        return $this->render('/question/party/questions', [
            'newQuestions' => $newQuestions,
        ]);
    }


    public function getCharacteristic($templateId)
    {
        $this->layout = 'empty';
        $newQuestions = OneCharacteristicTempate::find()
            ->where(['template_id' => $templateId])
            ->orderBy('sort')->all();

        return $this->render('/question/party/characteristic', [
            'newQuestions' => $newQuestions,
        ]);
    }


    public function actionUpdateQuestion($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $question = OneQuestionTemplate::findOne($id);
        $model = new CreateMainQuestionForm();
        $arrayBlank = OneQuestionTemplate::find()
            ->where(['template_id' => $question->template_id])
            ->orderBy('sort')->all();

        $nom = 0;
        $array = [];
        foreach ($arrayBlank as $item) {
            $nom = $nom + 1;
            $array += [$item->sort => $nom];
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->update($id)) {
                return $this->redirect(['questions-view', 'id' => $question->template_id,
                    '#' => 'question-'.$question->id]);
            }
        }

        return $this->render('update-question', [
            'question' => $question,
            'model' => $model,
            'array' => $array,
        ]);
    }


    public function actionUpdateCharacteristic($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $question = OneCharacteristicTempate::findOne($id);
        $model = new CreateMainCharacteristicsForm();
        $arrayBlank = OneCharacteristicTempate::find()
            ->where(['template_id' => $question->template_id])
            ->orderBy('sort')->all();

        $nom = 0;
        $array = [];
        foreach ($arrayBlank as $item) {
            $nom = $nom + 1;
            $array += [$item->sort => $nom];
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->update($id)) {
                return $this->redirect(['characteristic-view', 'id' => $question->template_id,
                    '#' => 'question-'.$question->id]);
            }
        }

        return $this->render('update-characteristic', [
            'question' => $question,
            'model' => $model,
            'array' => $array,
        ]);
    }


    public function actionDeleteQuestion($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $question = $question = OneQuestionTemplate::findOne($id);

        if (Yii::$app->request->post()) {
            $question->delete();
            return $this->redirect(['questions-view', 'id' => $question->template_id]);
        }

        return $this->render('delete-question', [
            'question' => $question,
        ]);
    }


    public function actionDeleteCharacteristic($id)
    {
        if (!AdminBase::isAdmin()) return $this->redirect(['/']);
        $question = $question = OneCharacteristicTempate::findOne($id);

        if (Yii::$app->request->post()) {
            $question->delete();
            return $this->redirect(['characteristic-view', 'id' => $question->template_id]);
        }

        return $this->render('delete-characteristic', [
            'question' => $question,
        ]);
    }








}