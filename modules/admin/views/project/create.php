<?php
/**
 * @var $model \app\models\forms\admin\AddProjectForm
 */

$this->title = 'Создание нового проекта';

use dosamigos\datepicker\DatePicker;
use yii\widgets\ActiveForm;

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
                            <label class="control-label">Введите идентификатор проекта</label>
                            <input type="text" class="form-control">
                            <div class="help-block"></div>
                        </div>
                        <div class="form-group mod-group" id="block1-2">
                            <?=$form->field($model, 'customer')->dropDownList($customers)?>
<!--                            <div class="form-group field-simple-position">-->
<!--                                <label class="control-label">Заказчик</label>-->
<!--                                <select class="form-control">-->
<!--                                    <option value="1">Иванов Иван Иванович</option>-->
<!--                                </select>-->
<!--                                <div class="help-block"></div>-->
<!--                            </div>-->
                            <div class="form-group plus-link">
                                <a class="block-link">+</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="input-block" id="block2">
                        <div class="form-group" id="block2-1">
                            <div class="form-group">
                                <label class="control-label">Полное название проекта</label>
                                <input type="text" class="form-control">
                                <div class="help-block"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Площадь, на которую делается проект</label>
                                <input type="text" class="form-control">
                                <div class="help-block"></div>
                            </div>
                            <div class="form-group mod-group" id="block2-1-1">
                                <div class="form-group field-simple-position">
                                    <label class="control-label">Город</label>
                                    <select class="form-control">
                                        <option value="1">Киев</option>
                                    </select>
                                    <div class="help-block"></div>
                                </div>
                                <div class="form-group plus-link">
                                    <a class="block-link">+</a>
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
                                <label class="control-label">Дата завершения проекта, дней</label>
                                <input type="text" class="form-control">
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
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
                                        <input type="text">
                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Словами</label>
                                        <input type="text">
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
                                        <input type="text" placeholder="20">
                                        <div class="result">
                                            <span>300</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="contrColumt">
                                    <div class="form-group">
                                        <label>2(%)</label>
                                        <input type="text" placeholder="20">
                                        <div class="result">
                                            <span>300</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="contrColumt">
                                    <div class="form-group">
                                        <label>3(%)</label>
                                        <input type="text" placeholder="20">
                                        <div class="result">
                                            <span>300</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="contrColumt">
                                    <div class="form-group">
                                        <label>4(%)</label>
                                        <input type="text" placeholder="20">
                                        <div class="result">
                                            <span>300</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="contrColumt">
                                    <div class="form-group">
                                        <label>5(%)</label>
                                        <input type="text" placeholder="20">
                                        <div class="result">
                                            <span>300</span>
                                        </div>
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
