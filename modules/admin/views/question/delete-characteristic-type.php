<?php
/**
 * @var $model \app\models\forms\template\AddQuestionTemplateForm
 * @var $template \app\models\CharacteristicsTemplates
 */

use yii\widgets\ActiveForm;

?>

<div class="mainContent">
    <div class="myContainer">
        <div class="top">
            <h2>Удаление шаблона для характеристики</h2>
        </div>
        <br><br>

        <div class="singleLink">
            <a href="javascript: history.back()" class="a-link btn-default">Отмена</a>
        </div>

        <div class="delete-block">
            <?php $form = ActiveForm::begin()?>
            <h3>Вы действительно хотите удалить тип характеристки:</h3>
            <h3><span class="del-red"><?=$template->title?>?</span></h3>
            <br>
            <div class="modalDoubleButton">
                <button id="updateName" type="submit" class="btn btn-red">Удалить
                </button>
                <a href="javascript:history.back()" class="a-link btn-default btn">Отмена</a>
            </div>
            <h5><span class="del-red">При удалении типа характеристики, будут удалены и все вопросы, которые относятся к этому типу</span></h5>
            <?php ActiveForm::end();?>
        </div>


    </div>
</div>
