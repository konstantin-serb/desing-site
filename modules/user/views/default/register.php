<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Регистрация';

?>
<h1>Register</h1>

<?php //dumper($_SESSION) ?>

<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']);?>

        <?=$form->field($model, 'username') ->textInput(['autofocus' => true])?>

        <?=$form->field($model, 'email')?>

        <?=$form->field($model, 'password') -> passwordInput()?>

        <div class="form-group">
            <?=Html::submitButton('Register', ['class' => 'btn btn-primary', 'name' => 'signup-button'])?>
        </div>

        <?php ActiveForm::end();?>
    </div>
</div>