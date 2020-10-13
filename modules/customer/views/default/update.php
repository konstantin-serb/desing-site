<?php
/**
 * @var $model \app\models\forms\client\EditForm
 * @var $user \app\models\User
 */

use yii\widgets\ActiveForm;

$this->title = 'Редактирование личных данных';

$model->surname = $user->surname;
$model->userName = $user->username;
$model->lastName = $user->lastName;

?>


<div class="mainContent userPage">
    <section class="registerPage">
        <div class="myContainer">
            <div class="top">
                <h2>Редактирование клиента</h2>
                <h5>Внесите измененияи нажмите кнопку "Сохранить"
                </h5>
            </div>
            <hr>
            <div class="formStyle">
                <?php $form = ActiveForm::begin(['id' => 'form-updateClient'])?>
                    <div class="form-group">
                        <?=$form->field($model, 'surname')->label('Фамилия')->textInput(['autofocus' => true])?>

                    </div>
                    <div class="form-group">
                        <?=$form->field($model, 'userName')->label('Имя')->textInput()?>
                    </div>

                    <div class="form-group">
                        <?=$form->field($model, 'lastName')->label('Отчество')->textInput()?>

                    </div>

                    <br>
                    <button type="submit" class="submit" name="add-button">Сохранить</button>
                <?php ActiveForm::end()?>
            </div>
        </div>
    </section>
</div>
