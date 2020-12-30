<?php
/**
 * @var $mode \app\models\forms\template\AddQuestionTemplateForm
 */

use yii\widgets\ActiveForm;
?>

<div class="mainContent">
    <div class="myContainer">
        <div class="top">
            <h2>Создание типа шаблона для характеристики</h2>
        </div>
        <br><br>
        <div class="formStyle normalForm">
            <?php $form = ActiveForm::begin()?>

            <?= $form->field($model, 'title')->textInput()?>

            <div class="button-admin">
                <button type="submit">Добавить тип</button>
            </div>

            <?php ActiveForm::end()?>
        </div>


    </div>
</div>
