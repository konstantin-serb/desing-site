<?php
/**
 *
 */

use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Создание нового техзадания';
?>

<div class="mainContent userPage">
    <div class="button">
        <a href="javascript:history.back()" class="a-link cancel">Отмена</a>
    </div>

    <div class="myContainer">
        <h2>Техническое задание на проектирование</h2>
        <div class="userForm">
            <?php $form = ActiveForm::begin() ?>
            <div class="procent-group">
                <?= $form->field($model, 'address')->textInput() ?>
                <?= $form->field($model, 'customer')->textInput() ?>
            </div>
            <div class="procent-group">
                <?= $form->field($model, 'description')->textarea(['rows'=> 4]) ?>
            </div>

            <div class="oneButton">
                <button type="submit" class="userButton">Далее...</button>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>


</div>
