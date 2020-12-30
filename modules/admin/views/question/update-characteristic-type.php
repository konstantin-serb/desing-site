<?php
/**
 * @var $model \app\models\forms\template\AddQuestionTemplateForm
 * @var $template \app\models\CharacteristicsTemplates
 */

use yii\widgets\ActiveForm;

$model->title = $template->title;
?>

<div class="mainContent">
    <div class="myContainer">
        <div class="top">
            <h2>Редактирование типа шаблона для характеристики</h2>
        </div>
        <br><br>

        <div class="formStyle normalForm">
            <?php $form = ActiveForm::begin()?>

            <?= $form->field($model, 'title')->textInput()?>

            <div class="button-admin">
                <button type="submit">Изменить название типа</button>
            </div>

            <?php ActiveForm::end()?>
        </div>
        <div class="singleLink">
            <a href="javascript:history.back()" class="a-link btn-default">Отмена</a>
        </div>


    </div>
</div>
