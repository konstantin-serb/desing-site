<?php
/**
 * @var $question \app\models\templates\OneQuestionTemplate
 * @var $model \app\models\templates\OneQuestionTemplate
 */

use yii\helpers\Url;
use yii\widgets\ActiveForm;

$model->question = $question->question;
$model->description = $question->description;
$model->sort = $question->sort;

$this->title = 'Изменить вопрос: ' . $question->question;
?>

<div class="mainContent clients">
    <div class="myContainer">
        <div class="top">
            <h2>Редактирование вопроса</h2>
        </div>
        <br>
        <div class="doubleLink">
            <a href="<?=Url::to(['delete-characteristic', 'id' => $question->id])?>" class="a-link btn-delete">Удалить</a>
            <a href="javascript:history.back()" class="a-link btn-default">Назад</a>
        </div>

        <div class="normalForm">
            <?php $form = ActiveForm::begin() ?>
            <div class="formStyle">
                <?= $form->field($model, 'question')->textInput() ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>
                <div class="procent-group">
                <?= $form->field($model, 'sort')->dropDownList($array) ?>
                </div>
            </div>
            <div class="doubleLink">
                <button type="submit" class="a-link btn-gold">Изменить</button>
                <a href="javascript:history.back()" class="a-link btn-default">Назад</a>
            </div>
            <?php ActiveForm::end() ?>
        </div>

    </div>


</div>

