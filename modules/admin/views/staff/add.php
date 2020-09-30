<?php
/**
 * @var $model \app\models\forms\employee\SignupEmployeeForm
 * @var $position \app\models\Position
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;

$this->title = 'Создание нового сотрудника';

$this->registerJsFile('/files/js/addPositionAJAX.js', [
        'depends' => \yii\web\JqueryAsset::class,
]);

?>


<div class="mainContent userCreate admin-form">
    <section class="registerPage">
        <div class="myContainer">
            <div class="top">
                <h2>Создание нового сотрудника</h2>
                <h5>Заполните форму
                </h5>
            </div>
            <hr>
            <div class="formStyle">
                <?php $form = ActiveForm::begin(['id' => 'form-addStaff']) ?>
                <div class="form-group">
                    <?= $form->field($model, 'surname')->label('Фамилия')->textInput(['autofocus' => true]) ?>

                </div>
                <div class="form-group">
                    <?= $form->field($model, 'userName')->label('Имя')->textInput() ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'lastName')->label('Отчество')->textInput() ?>
                </div>
                <div id="drop" class="form-group flex-input">
                    <?= $form->field($model, 'position')->label('Должность')->dropDownList($position) ?>
                    <div class="form-group plus-link-add-position">
                        <?php
                        Modal::begin([
                            'size' => 'modal-lg',
                            'header' => '<h2>Добавить должность в список</h2>',
                            'toggleButton' => [
                                'label' => '+',
                                'tag' => 'a'
                            ],
//                            'footer' => 'Низ окна'
                        ]); ?>
                        <div class="form-group">
                            <label class="label-modal">Добавьте должность</label>
                            <input type="text" id="addpositionform-position" class="form-control" name="AddPositionForm[position]" aria-required="true">
<!--                            --><?//=$form->field($newPosition, 'position')->textInput()?>
                            <div id="successMessage">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="addPosition" type="button" class="btn btn-primary">Сохранить</button>
                        </div>
                        <?php Modal::end();
                        ?>
                    </div>
                    <?=$form->field($model, 'info')->textarea(['rows' => 10])?>
                    <br>
                    <button type="submit" class="submit" name="add-button">Создать</button>
                </div>
            </div>

            <?php ActiveForm::end() ?>
        </div>
    </section>

</div>
