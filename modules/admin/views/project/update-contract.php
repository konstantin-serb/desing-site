<?php

/**
 * @var $model \app\models\forms\project\UpdateContractForm
 * @var $contract \app\models\Contracts
 */

use yii\widgets\ActiveForm;

$this->title = 'Изменить договор';


$model->content = $contract->content;
$model->sort = $contract->sort;
$model->contract_start = $contract->contract_start;
$model->contract_date = $contract->contract_date;
$model->currency = $contract->currency;
$model->contract_city = $contract->contract_city;
$model->address = $contract->address;
$model->priceWords = $contract->price_words;
$model->customer = $contract->customer;
$model->executorInfo = $contract->executor_info;
$model->customerInfo = $contract->customer_info;
$model->executor_organization = $contract->executor_organization;
$model->executor_director = $contract->executor_director;
?>

<div class="mainContent adminPage">
    <div class="myContainer">
        <h2>Изменить договор:</h2>
        <h3><?=$contract->title?></h3>

        <br>
        <div class="singleLink">
            <a href="javascript: history.back()" class="a-link btn-default">Назад</a>
        </div>

        <?php $form = ActiveForm::begin()?>
        <div class="textAreaUpdate">

            <div class="">
                <div class="procent-group">
                    <?= $form->field($model, 'sort')->textInput()->label('Порядковый номер') ?>
                    <?= $form->field($model, 'contract_start')->textInput()->label('Начало работ') ?>
                    <?= $form->field($model, 'contract_date')->textInput()->label('Дата заключения') ?>
                </div>
                <div class="procent-group">
                    <?= $form->field($model, 'currency')->textInput()->label('В валюте...') ?>
                    <?= $form->field($model, 'priceWords')->textInput()->label('Цена словами') ?>
                    <?= $form->field($model, 'contract_city')->textInput()->label('Ваш город') ?>
                </div>
                <div class="procent-group">
                    <?= $form->field($model, 'address')->textInput()->label('Адрес проекта') ?>
                    <?= $form->field($model, 'customer')->textInput()->label('Заказчик') ?>
                </div>
                <div class="procent-group">
                    <?= $form->field($model, 'executorInfo')->textarea(['rows' => 6])
                        ->label('Данные исполнителя') ?>
                    <?= $form->field($model, 'customerInfo')->textarea(['rows' => 6])
                        ->label('Данные заказчика') ?>
                </div>
                <div class="procent-group">
                    <?= $form->field($model, 'executor_organization')->textInput()->label('Организация исполнителя') ?>
                    <?= $form->field($model, 'executor_director')->textInput()->label('Директор исполнителя') ?>
                </div>

            </div>
            <?= $form->field($model, 'content')->textarea(['rows' => 20])
                ->label('Тело договора') ?>

        </div>
        <div class="modalDoubleButton">

            <button id="updateName" type="submit" class="btn btn-gold">Изменить
            </button>
            <a href="javascript:history.back()" class="a-link btn-default btn">Отмена</a>
        </div>
        <?php ActiveForm::end()?>

</div>
