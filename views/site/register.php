<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Регистрация';

?>

<div class="mainContent guestPage">
    <section class="registerPage">
        <div class="myContainer">
            <h2>Регистрация</h2>
            <p class="subtitle1">
                На данном этапе Вы проходите только минимальную регистрацию, для записи Вашего Email и установки пароля,  который будете знать только Вы. <br>
                Вы в дальнейшем, в своем личном кабинете на сайте, сможете изменить информацию о себе и пароль.
            </p>
            <div class="formStyle">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']);?>
                    <div class="form-group">
                        <?=$form->field($model, 'email') ->textInput(['autofocus' => true])?>

                    </div>
                    <div class="form-group">
                        <?=$form->field($model, 'password') -> passwordInput()?>
                        <?=$form->field($model, 'repeatPassword')
                            ->label('Повторите пароль')-> passwordInput()?>

                        <?=$form->field($model, 'code')
                            ->label('Введите код, полученный от администратора')-> textInput()?>
                    </div>

                    <br>
                    <button type="submit" class="submit" name="signup-button">Регистрация</button>
                <?php ActiveForm::end();?>
            </div>
        </div>
    </section>
</div>

