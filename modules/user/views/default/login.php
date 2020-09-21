<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Login';
?>

<div class="mainContent guestPage">
    <section class="loginPage">
        <div class="myContainer">
            <h2>Вход</h2>
            <div class="formStyle">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <div class="form-group">
                        <?=$form->field($model, 'email')->label('Введите Email')?>
                    </div>
                    <div class="form-group">
                        <?=$form->field($model, 'password')->label('Введите пароль') -> passwordInput()?>
                        <br>
                        <button type="submit" class="submit" name="login-button">Вход</button>
                    </div>
                <?php ActiveForm::end();?>
            </div>
        </div>
    </section>
</div>


