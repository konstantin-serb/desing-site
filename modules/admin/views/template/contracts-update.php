<?php
/**
 * @var $template \app\models\forms\template\EditContractForm
 * @var $templateContract \app\models\TemplateContract
 */
$this->title = 'Редактирование договора такого-то';

use yii\helpers\Url;
use yii\widgets\ActiveForm;

$template->title = $templateContract->title;
$template->content = $templateContract->content;
$template->executor = $templateContract->executor;
$template->description = $templateContract->description;
$template->executorOrganization = $templateContract->executorOrganization;
$template->executorDirector = $templateContract->executorDirector;
$template->contractCity = $templateContract->contractCity;

?>

<div class="mainContent">
    <br>
    <div class="singleLink">
        <a href="javascript: history.back()" class="a-link btn-default">Назад</a>
    </div>
    <h2>Редактирование шаблона на договор:</h2>
    <h3><?=$template->title?></h3>
    <section class="doc">
        <div class="myContainer">
            <?php $form = ActiveForm::begin();?>
            <div class="formStyleBig">
                <div class="form-path">
                    <?=$form->field($template, 'title')->textInput()
                    ->label('Название шаблона');?>
                </div>
            </div>

                <hr>
            <div class="formStyleBig">
                <h3>Короткое описание шаблона:</h3>
                <div class="form-path">
                    <?=$form->field($template, 'description')->textarea(['rows'=>3])
                        ->label('Описание шаблона');?>
                </div>
            </div>
            <div class="formStyleBig">
                <h3>Исполнитель:</h3>
                <div class="form-path">
                    <?=$form->field($template, 'contractCity')
                        ->textInput()
                        ->label('Ваш город');?>
                    <?=$form->field($template, 'executorOrganization')
                        ->textInput()
                        ->label('Название проектной организации');?>

                    <?=$form->field($template, 'executorDirector')
                        ->textInput()
                        ->label('Фамилия и инициалы директора');?>

                    <?=$form->field($template, 'executor')->textarea(['rows'=>6])
                        ->label('Ваши реквизиты');?>
                </div>
            </div>
            <hr>
            <div class="formStyleBig">
                <h3>Текст договора:</h3>
                <div class="form-path">
                    <?=$form->field($template, 'content')->textarea(['rows'=>25])
                    ->label(false);?>
                </div>
                <div class="modalDoubleButton">

                    <button type="submit" class="btn btn-gold">
                        Изменить
                    </button>
                    <button type="button" class="close-my btn btn-default" data-dismiss="modal">
                        Закрыть
                    </button>
                </div>

            </div>
            <?php ActiveForm::end();?>



        </div>
    </section>

</div>


