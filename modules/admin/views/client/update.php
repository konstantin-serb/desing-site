<?php
/**
 * @var $model \app\models\forms\AdminEditForm;
 * @var $client \app\models\Clients
 */

use yii\widgets\ActiveForm;

$this->title = 'Редактирование клиента';

$model->surname = $client->surname;
$model->userName = $client->user_name;
$model->lastName = $client->last_name;

?>


<div class="mainContent userCreate admin-form">
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
