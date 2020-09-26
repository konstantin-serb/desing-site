<?php
/**
 * @var $model \app\models\forms\client\AddClientForm;
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>


<div class="mainContent userCreate admin-form">
    <section class="registerPage">
        <div class="myContainer">
            <div class="top">
                <h2>Создание нового клиента</h2>
                <h5>Заполните форму
                </h5>
            </div>
            <hr>
            <div class="formStyle">
                <?php $form = ActiveForm::begin(['id' => 'form-addClient'])?>
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
                    <button type="submit" class="submit" name="add-button">Создать</button>
                <?php ActiveForm::end()?>
            </div>
        </div>
    </section>
</div>
