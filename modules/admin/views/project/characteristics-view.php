<?php
/**
 * @var $model \app\models\forms\project\EditCharacteristicsForm
 * @var $questions \app\models\Characteristic
 * @var $question \app\models\Characteristic
 * @var $project \app\models\Project
 * @var $answerModel \app\models\forms\assignment\AddAnswerCharacteristics
 */

use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->registerJsFile('/files/js/project/addAdminProjectCharacteristic.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->title = 'Вопросы характеристик к проекту: ';
?>

<div class="mainContent clients">
    <div class="myContainer">

        <div class="top">
            <h2>Вопросы раздела характеристик к проекту: </h2>
            <h3><?=$project->nameProject?></h3>
        </div>
        <br>
        <div class="singleLink">
            <a href="<?=Url::to(['create-path2', 'id'=>$project->id, '#' => 'docs'])?>" class="a-link btn-default">Назад</a>
        </div>

        <div id="divQuestions">
            <?=$this->render('/project/party/characteristic', [
                    'questions' => $questions,
            ])?>
        </div>
    </div>
<hr>
    <div>

        <h2>Добавить вопрос в характеристики</h2>
        <div class="normalForm">
            <?php $form = ActiveForm::begin() ?>
            <div class="formStyle">
                <?= $form->field($model, 'question')->textInput() ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>

            </div>
            <div class="add-button">
                <a id="addQuestion"  class="a-link" data-id="<?=$project->id?>">Добавить вопрос</a>
            </div>
            <?php ActiveForm::end() ?>
        </div>


    </div>


</div>

