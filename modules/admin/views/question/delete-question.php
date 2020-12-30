<?php
/**
 * @var $question \app\models\templates\OneQuestionTemplate
 *
 */

use yii\helpers\Url;
use yii\widgets\ActiveForm;



$this->title = 'Удаление вопроса: ' . $question->question;
?>

<div class="mainContent clients">
    <div class="myContainer">
        <div class="top">
            <h2>Удаление вопроса</h2>
        </div>
        <div class="delete-block">
            <h3>Вы действительно хотите удалить вопрос: </h3>


        <h3><span class="del-red"><?=$question->question . '?'?></span></h3>

        <div class="normalForm">
            <?php $form = ActiveForm::begin() ?>
            <div class="formStyle">

            </div>
            <div class="modalDoubleButton">
                <button id="updateName" type="submit" class="btn btn-red">Удалить
                </button>
                <a href="javascript:history.back()" class="a-link btn-default btn">Отмена</a>
            </div>
            <?php ActiveForm::end() ?>
        </div>
        </div>

    </div>


</div>

