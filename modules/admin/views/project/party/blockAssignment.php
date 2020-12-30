<?php
/**
 * @var $project \app\models\Project
 */

use yii\helpers\Url;
?>



    <div class="buttonGroup1">
        <div class="modalDoubleButton">
            <button id="" type="button" class="hiddenAssignmentBlock close-my btn btn-default">
                Закрыть
            </button>
        </div>
    </div>


    <hr>
    <div class="bigGroup hidden-group formStyle all-width">
        <div class="procent-group">
            <div>
                <?php use yii\widgets\ActiveForm;

                if ($project->checkIsCharacteristic()): ?>
                    <h4>Вопросы для характеристик выбраны</h4>
                    <div class="modalDoubleButton">
                        <a href="<?=Url::to(['/admin/project/characteristics-view'
                            ,'id' => $project->id])?>" class="a-link btn btn-gold">
                            Редактировать
                        </a>
                    </div>
                    <br>
                <?php else: ?>
                    <h4>Выбрать шаблон характеристик</h4>
                    <?php $form = ActiveForm::begin() ?>
                    <?= $form->field($characteristicModel, 'characteristicTemplateId')
                        ->dropDownList($characteristicArray, [
                            'prompt' => 'Выберите один вариант'
                        ])->label(false) ?>
                    <?php ActiveForm::end() ?>
                <?php endif; ?>
                <?php if (!$project->checkIsCharacteristic()): ?>
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <a id="createCharacteristics" class="a-link btn btn-gold"
                               data-id="<?= $project->id; ?>">
                                Создать
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div>
                <?php if ($project->checkIsQuestions()): ?>
                    <h4>Вопросы для анкеты выбраны</h4>
                    <div class="modalDoubleButton">
                        <a href="<?=Url::to(['/admin/project/questions-view'
                            ,'id' => $project->id])?>" class="a-link btn btn-gold">
                            Редактировать
                        </a>
                    </div>
                    <br>
                <?php else: ?>
                    <h4>Выбрать шаблон анкеты</h4>

                    <?php $form = ActiveForm::begin() ?>
                    <?= $form->field($questionModel, 'questionTemplateId')
                        ->dropDownList($questionsArray,
                            [
                                'prompt' => 'Выберите один вариант'
                            ])->label(false) ?>
                    <?php ActiveForm::end() ?>
                <?php endif; ?>

                <?php if (!$project->checkIsQuestions()): ?>
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <a id="createQuestions" class="a-link btn btn-gold"
                               data-id="<?= $project->id; ?>">
                                Создать
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <hr>

    <?php if($project->checkIsCharacteristic() &&
        $project->checkIsQuestions()):?>

        <div class="buttonGroup1">
            <span id="availableButton"><div class="modalDoubleButton <?php if($project->project_status == \app\models\Project::STATUS_FOR_ASSIGNMENT){
                    echo 'hiddenInputs';
                }?>">
                <a id="clientAvailable" class="hiddenAssignmentBlock btn btn-gold" data-id="<?=$project->id;?>">
                    Сделать доступным клиенту
                </a>
                </div></span>
        </div>
        <br>

    <?php endif;?>

    <div class="buttonGroup1">
        <div class="modalDoubleButton">
            <button id="" type="button" class="hiddenAssignmentBlock close-my btn btn-default">
                Закрыть
            </button>
        </div>
    </div>



