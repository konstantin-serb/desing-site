<?php
/**
 * @var $template \app\models\TemplateContract
 * @var $model \app\models\forms\template\AddContractCopyForm
 */

use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

$this->title = $template->title;

$model->title = $template->title. '-copy';
$model->id = $template->id;


?>



<div class="mainContent">
    <div class="myContainer">
<br>
        <div class="singleLink">
            <a href="<?= Url::to(['/admin/template/contracts-index']) ?>" class="a-link btn-gold">
                Все шаблоны договоров
            </a>
        </div>
        <h2>Шаблон договора:</h2>
        <h2><?=$template->title?></h2>


        <div class="doubleLink">
            <a href="<?= Url::to(['/admin/template/contracts-update', 'id' => $template->id]) ?>" class="a-link btn-gold">Изменить</a>
            <a href="javascript: history.back();" class="a-link btn-default">Назад</a>
        </div>

        <div class="singleLink">

            <?php Modal::begin([
                    'size' => 'modal-lg',
                'header' => '<h2>Создать копию шаблона договора</h2>',
                'toggleButton' => [
                        'label' => '+ Создать копию',
                    'tag' => 'a',
                    'class' => 'a-link btn-orange'
                ],
            ]);
            ?>

            <?php $form = ActiveForm::begin();?>
            <div class="formStyleBig">

            <?=$form->field($model, 'title')->textInput()->label('Создайте уникальное название шаблона')?>
                <?=$form->field($model, 'id')->hiddenInput()->label(false)?>
                <div class="modalDoubleButton">
                    <button type="submit" class="btn btn-gold">
                        Создать
                    </button>
                    <button type="button" class="close-my btn btn-default" data-dismiss="modal">
                        Закрыть
                    </button>
                </div>
            </div>
            <?php ActiveForm::end();?>
            <?php Modal::end();?>
        </div>
        <br>
        <div id="contract" data-id="<?=$template->id?>" class="contractView">
            <?=$template->generateText()?>
            <div class="doubleColumn">
                <?=$template->executor?>
                <div id="customerInfo" class="columnContract right">
                    <h4>ЗАМОВНИК</h4>
                </div>
            </div>
        </div>
        <div class="doubleLink">
            <a href="<?= Url::to(['/admin/template/contracts-update', 'id' => $template->id]) ?>" class="a-link btn-gold">Изменить</a>
            <a href="#" class="a-link btn-default">Назад</a>
        </div>

    </div>
</div>


