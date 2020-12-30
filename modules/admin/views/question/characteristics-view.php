<?php
/**
 * @var $template \app\models\templates\QuestionsTemplates
 * @var $model \app\models\forms\template\CreateMainQuestionForm
 * @var $newQuestions \app\models\templates\OneQuestionTemplate
 */

use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->registerJsFile('/files/js/question/addAdminCharacteristic.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->title = 'Шаблон характеристики: ' . $template->title;
?>

<div class="mainContent clients">
    <div class="myContainer">
        <br>

        <div class="singleLink">


        </div>
        <div class="top">
            <h2>Шаблон характеристики: <?= $template->title ?></h2>
        </div>
        <br>
        <div class="doubleLink">
            <a href="javascript:history.back()" class="a-link btn-default">Назад</a>
            <a href="<?= Url::to(['/admin/template']) ?>" class="a-link btn-gold">
                Все шаблоны
            </a>
        </div>

        <div id="divQuestions">
            <?=$this->render('/question/party/characteristic', [
                    'newQuestions' => $newQuestions,
            ]);?>
        </div>
<hr>
        <h2>Добавить вопрос в характеристики</h2>
        <div class="normalForm">
            <?php $form = ActiveForm::begin() ?>
            <div class="formStyle">
                <?= $form->field($model, 'question')->textInput() ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>
            </div>
            <div class="add-button">
                <a id="addQuestion"  class="a-link" data-id="<?=$template->id?>">Добавить вопрос</a>
            </div>
            <?php ActiveForm::end() ?>
        </div>

        <hr>
        <h2>Вы можете изменить или удалить шаблон характеристики</h2>
        <h5>Внимание! При удалении шаблона характеристики, удалятся все вопросы, которые входят в данный шаблон! Будьте внимательны и осторожны!</h5>

        <div class="doubleLink">
            <a class="a-link btn-gold" href="<?=Url::to(['update-characteristic-type', 'id' =>$template->id])?>">Изменить</a>
            <a class="a-link btn-del" href="<?=Url::to(['delete-characteristic-type', 'id' =>$template->id])?>">Удалить</a>
            <a href="javascript: history.back();" class="a-link btn-default">Назад</a>
        </div>

    </div>


</div>

