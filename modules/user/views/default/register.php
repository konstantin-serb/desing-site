<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Регистрация';

?>

<div class="mainContent guestPage">
    <section class="registerPage">
        <div class="myContainer">
            <h2>Резервная регистрация</h2>
            <p class="subtitle1">
                Только для разработчкика
            </p>
            <div class="formStyle">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']);?>
                    <div class="form-group">
                        <?=$form->field($model, 'username') ->textInput(['autofocus' => true])?>
                        <?=$form->field($model, 'email')?>
                    </div>
                    <div class="form-group">
                        <?=$form->field($model, 'password') -> passwordInput()?>
                    </div>

                    <br>
                    <button type="submit" class="submit" name="signup-button">Регистрация</button>
                <?php ActiveForm::end();?>
            </div>
        </div>
    </section>
</div>

