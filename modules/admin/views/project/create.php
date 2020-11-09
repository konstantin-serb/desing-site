<?php
/**
 * @var $model \app\models\forms\admin\AddProjectForm
 * @var $customers \app\models\Clients
 * @var $city \app\models\City
 *
 */

$this->title = 'Создание нового проекта';

use dosamigos\datepicker\DatePicker;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

$model->pricePart1 = 20;
$model->pricePart2 = 20;
$model->pricePart3 = 20;
$model->pricePart4 = 20;
$model->pricePart5 = 20;

$this->registerJsFile('/files/js/addCustomerAJAX.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/files/js/addCityAJAX.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);


?>


<div class="mainContent adminPage">

    <section class="top">
        <div class="myContainer">
            <div class="">
                <h2>Создание нового проекта</h2>
            </div>
            <hr>
        </div>
    </section>
    <section class="create general">
        <div class="myContainer">
            <form>

            </form>
        </div>
    </section>

    <section class="addProject">
        <div class="myContainer">
            <?php $form = ActiveForm::begin() ?>
            <div class="formStyle all-width">

                <h3 class="create-subtitle">Общие сведения</h3>
                <div class="formBlock">
                    <div class="input-block" id="block1">
                        <div class="form-group field-simple-position">
                            <?=$form->field($model, 'projectId')->textInput()
                            ->label('Введите идентификатор проекта')?>
                            <div class="help-block"></div>
                        </div>
                        <div class="form-group mod-group" id="block1-2">
                            <?=$form->field($model, 'customer')->dropDownList($customers)?>

                            <div class="form-group plus-link">
                                <?php Modal::begin([
                                        'size' => 'modal-lg',
                                    'header' => '<h2>Добавить нового заказчка</h2>',
                                    'toggleButton' => [
                                            'label' => '+',
                                        'tag' => 'a',
                                        'class' => 'a-link plus-button',
                                    ],
                                ])?>
                                <div id="successMessage">

                                </div>
                                <div class="form-group">
                                    <label class="label-modal">Фамилия</label>
                                    <input type="text" id="customer-surname"
                                           class="form-control"  aria-required="true">
                                </div>
                                <div class="form-group">
                                    <label class="label-modal">Имя</label>
                                    <input type="text" id="customer-name"
                                           class="form-control"  aria-required="true">
                                </div>
                                <div class="form-group">
                                    <label class="label-modal">Отчество</label>
                                    <input type="text" id="customer-lastName"
                                           class="form-control"  aria-required="true">
                                </div>

                                <div class="modal-footer">
                                    <button id="addCustomer" type="button" class="btn btn-primary">Сохранить</button>
                                </div>

                                <?php Modal::end();?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="input-block" id="block2">
                        <div class="form-group" id="block2-1">
                            <div class="form-group">
                                <?=$form->field($model, 'nameProject')->textInput()->label('
                                Полное название проекта')?>
                                <div class="help-block"></div>
                            </div>
                            <div class="form-group">
                                <?=$form->field($model, 'area')
                                ->textInput()->label('Площадь, на которую делается проект')?>
                                <div class="help-block"></div>
                            </div>
                            <div class="form-group mod-group" id="block2-1-1">
                                <div class="form-group field-simple-position">
                                    <?=$form->field($model, 'city')->dropDownList($city)?>

                                </div>
                                <div class="form-group plus-link">
                                    <?php Modal::begin([
                                        'size' => 'modal-lg',
                                        'header' => '<h2>Добавить город</h2>',
                                        'toggleButton' => [
                                            'label' => '+',
                                            'tag' => 'a',
                                            'class' => 'a-link plus-button',
                                        ],
                                    ])?>
                                    <div id="successCityMessage">

                                    </div>
                                    <div class="form-group">
                                        <label class="label-modal">Город</label>
                                        <input type="text" id="city"
                                               class="form-control"  aria-required="true">
                                    </div>

                                    <div class="modal-footer">
                                        <button id="addCity" type="button" class="btn btn-primary">Добавить</button>
                                    </div>

                                    <?php Modal::end();?>
                                </div>
                            </div>

                        </div>

                        <div class="form-group" id="block2-2">
                            <div class="form-group">

                                <div class="photoDate">
                                    <?= $form->field($model, 'dateStart')->label('Дата начала проекта')->widget(
                                        DatePicker::className(), [
                                        // inline too, not bad
                                        'inline' => true,
                                        // modify template for custom rendering
                                        'template' => '<div class="well well-sm" style="background-color: #fff; width:270px">{input}</div>',
                                        'clientOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd-M-yyyy'
                                        ]
                                    ]); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?=$form->field($model, 'length')
                                ->textInput()->label('Дата завершения проекта, дней')?>
                                <div class="help-block"></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?=$form->field($model, 'image')->fileInput()->label('Выберете фото для проекта')?>
                </div>
                <br>
                <hr>
                <div class="bigGroup">
                    <h3 class="create-subtitle">Ценообразование</h3>

                    <div class="wrap-group">
                        <div class="price-group">
                            <h5>Цена проекта</h5>
                            <div class="price-wrap">
                                <div id="price__group1">
                                    <div class="form-group">
                                        <label>Цифрой</label>
                                        <?=$form->field($model, 'priceDigital')
                                            ->label(false)?>
                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Словами</label>
                                        <?=$form->field($model, 'priceWords')
                                            ->label(false)?>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="mod-group" id="price__group2">
                                    <div class="form-group">
                                        <label>В валюте:</label>
                                        <select class="form-control">
                                            <option value="1">Долларов</option>
                                            <option value="2">Лари</option>
                                        </select>
                                    </div>
                                    <div class="form-group plus-link">
                                        <a class="block-link">+</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contribution-group">
                            <h5>Распределение взносов</h5>
                            <div class="contribution-wrap">
                                <div class="contrColumt">
                                    <div class="form-group">
                                        <label>1(%)</label>
                                        <?=$form->field($model, 'pricePart1')->label(false)?>
                                    </div>
                                </div>
                                <div class="contrColumt">
                                    <div class="form-group">
                                        <label>2(%)</label>
                                        <?=$form->field($model, 'pricePart2')->label(false)?>
                                    </div>
                                </div>
                                <div class="contrColumt">
                                    <div class="form-group">
                                        <label>3(%)</label>
                                        <?=$form->field($model, 'pricePart3')->label(false)?>
                                    </div>
                                </div>
                                <div class="contrColumt">
                                    <div class="form-group">
                                        <label>4(%)</label>
                                        <?=$form->field($model, 'pricePart4')->label(false)?>
                                    </div>
                                </div>
                                <div class="contrColumt">
                                    <div class="form-group">
                                        <label>5(%)</label>
                                        <?=$form->field($model, 'pricePart5')->label(false)?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <hr>
            </div>
            <h4 class="create-subtitle">Стадии</h4>
            <div class="stages clients">

                <div class="wrap">

                    <div class="stagesItem stageInWork">
                        <a class="block-link" href="#">
                            <h3>1</h3>
                            <h4>Вычерчивание планов квартиры и анализ существующей ситуации</h4>
                        </a>
                    </div>
                    <div class="stagesItem stageInWork">
                        <a class="block-link" href="#">
                            <h3>1</h3>
                            <h4>Вычерчивание планов квартиры и анализ существующей ситуации</h4>
                        </a>
                    </div>
                    <div class="stagesItem stageInWork">
                        <a class="block-link" href="#">
                            <h3>1</h3>
                            <h4>Вычерчивание планов квартиры и анализ существующей ситуации</h4>
                        </a>
                    </div>
                    <div class="stagesItem stageInWork">
                        <a class="block-link" href="#">
                            <h3>1</h3>
                            <h4>Вычерчивание планов квартиры и анализ существующей ситуации</h4>
                        </a>
                    </div>
                    <div class="stagesItem stageInWork">
                        <a class="block-link" href="#">
                            <h3>1</h3>
                            <h4>Вычерчивание планов квартиры и анализ существующей ситуации</h4>
                        </a>
                    </div>
                </div>
                <div class="add-button">
                    <a href="#" class="a-link">Добавить стадию...</a>
                </div>

                <hr>
            </div>
            <div class="formStyle endSelect">
                <label>Статус показа</label>
                <select class="form-control">
                    <option value="1">Видит только администратор сайта</option>
                    <option value="1">Видит администратор и назначенные исполнители</option>
                </select>
            </div>
            <h5 class="helpMessage">Нажав на кнопку "Создать новый проект" - вы создатите проект, который пока будете
                видеть только вы и который
                нужно будет отредатктировать и доработать прежде, чем его сможет увидеть заказчик</h5>
            <div class="formStyle">
                <button class="addProject">
                    Создать новый проект
                </button>
            </div>
            <?php ActiveForm::end();?>
        </div>

    </section>
</div>
