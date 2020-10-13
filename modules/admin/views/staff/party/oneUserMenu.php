<?php
/**
 * @var $user \app\models\Employee
 * @var $modelUpdateFIO \app\models\forms\employee\AdminEditForm
 */

use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

$modelUpdateFIO->surname = $user->surname;
$modelUpdateFIO->userName = $user->user_name;
$modelUpdateFIO->lastName = $user->last_name;


?>

<div class="wrapMenu">
    <a class="a-link" href="<?=Url::to(['/admin/staff'])?>">Все сотрудники</a>

    <?php Modal::begin([
        'size' => 'modal-lg',
        'header' => '<h2>Редактировать ФИО</h2>',
        'toggleButton' => [
                'label' => 'Редактировать ФИО',
            'tag' => 'a',
            'class' => 'a-link',
        ],]);?>

    <div class="formStyle">
        <?php $form = ActiveForm::begin(['id' => 'form-updateClient'])?>
        <div class="form-group">
            <?=$form->field($modelUpdateFIO, 'surname')->label('Фамилия')->textInput(['autofocus' => true])?>

        </div>
        <div class="form-group">
            <?=$form->field($modelUpdateFIO, 'userName')->label('Имя')->textInput()?>
        </div>

        <div class="form-group">
            <?=$form->field($modelUpdateFIO, 'lastName')->label('Отчество')->textInput()?>
        </div>


        <br>
        <button type="submit" class="submit" name="add-button">Сохранить</button>
        <?php ActiveForm::end()?>
    </div>

    <?php Modal::end()?>

    <a href="#" class="a-link">Добавить проект</a>
    <a href="#" class="a-link">Написать сообщение</a>
    <a href="#" class="a-link">Заблокировать</a>
    <a href="#" class="a-link">Удалить</a>
</div>

