<?php
/**
 * @var $model \app\models\forms\employee\UpdatePositionForm
 * @var $user \app\models\Employee
 */

use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

$this->title = 'Редактирование должости сотрудника';

$this->registerJsFile('/files/js/addPositionAJAX.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$model->position = $user->position;

?>

<div class="mainContent userCreate admin-form">
    <section id="updatePosition" class="UpdatePage">
        <div class="myContainer">
            <div class="top">
                <h2>Изменить должность сотрудника:</h2>
                <h3><?=$user->surname.' '.$user->user_name.' '.$user->last_name?></h3>
                <hr>
                <h5>Заполните форму
                </h5>
            </div>
            <hr>
            <div class="formStyle">
                <?php $form = ActiveForm::begin(['id' => 'form-addStaff']) ?>
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

                    <br>

                    <button type="submit" class="submit" name="add-button">Изменить</button>
                </div>
                <?php ActiveForm::end() ?>
            </div>


        </div>
    </section>
</div>
