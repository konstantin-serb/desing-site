<?php
/**
 * @var $project \app\models\Project
 * @var $model \app\models\forms\admin\AddProjectForm
 * @var $modelTemplateContract \app\models\forms\project\AddFromTemplateContractForm
 * @var $contracts \app\models\Contracts
 * @var $contract \app\models\Contracts
 */

use dosamigos\datepicker\DatePicker;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

$this->registerJsFile('/files/js/addStage.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/files/js/project/updateName.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/files/js/project/form.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/files/js/project/updatePhoto.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/files/js/calculatePercentsAJAX.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/files/js/project/addCityProjectAJAX.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/files/js/project/addContractFromTemplateAjax.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/files/js/project/addContractFromContractAjax.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/files/js/project/showHiddenAssignmentBlock.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/files/js/assignment/addQuestions.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);


$this->title = 'Завершение редактирования проекта';


$model->projectId = $project->project_id;
$model->nameProject = $project->nameProject;
$model->customer = $project->customer;
$model->dateStart = $project->date_start;
$model->length = $project->length;
$model->area = $project->area;
$model->city = $project->city;
$model->priceDigital = $project->price_digital;
$model->priceWords = $project->price_words;
$model->currency = $project->currency;
$model->pricePart1 = $project->price_p1;
$model->pricePart2 = $project->price_p2;
$model->pricePart3 = $project->price_p3;
$model->pricePart4 = $project->price_p4;
$model->pricePart5 = $project->price_p5;



$modelTemplateContract->dateStart = $project->getDate($project->date_start);
$modelTemplateContract->dateContract = $project->getDate($project->date_start);
$modelTemplateContract->dateContract = $project->getDate($project->date_start);
$modelTemplateContract->address = $project->address;
$modelTemplateContract->priceWords = $project->price_words;
$modelTemplateContract->customer = $project->client->surname . ' ' . $project->client->user_name
    . ' ' . $project->client->last_name;
$modelTemplateContract->customerInfo = '<h4>ЗАКАЗЧИК:</h4><br>' . $project->client->surname . ' ' . $project->client->user_name
    . ' ' . $project->client->last_name . '<br>'
    . 'Місце проживання:   <br>'
    . 'Паспорт:   <br>'
    . 'Серія:  <br> ';

if ($project->currency) {
    $modelTemplateContract->currency = $project->valut->currency;
} else {
    $modelTemplateContract->currency = 'В неизвестной валюте';
}


?>

<div class="mainContent adminPage">

    <section class="top">
        <div class="myContainer">
            <h2>Завершение редактирования проекта</h2>
            <br>
            <div class="singleLink">
                <a href="<?=Url::to(['index'])?>" class="a-link btn-default">Назад</a>
            </div>

            <div class="topFrame frame">
                <h2 class="inFrame">Проект: ID <span id="projectId"><?= $project->project_id ?></span></h2>
            </div>
            <h5><span id="title"><?= $project->nameProject ?></span>
                <?php Modal::begin([
//                    'size' => 'modal-lg',
                    'header' => '<h2>Изменить данные</h2>',
                    'toggleButton' => [
                        'label' => '<div class="svgIcon"><svg width="44" height="45" viewBox="0 0 44 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d)">
                                <path d="M17.6938 9.71484C12.4516 14.9114 1.89891 25.3729 1.6254 25.6466L7.09552 26.5353L6.68526 29.8174H10.3776L10.9246 34.9456L26.8563 18.9455L17.6938 9.71484Z"
                                      fill="url(#paint0_linear)"/>
                                <path d="M17.6783 7.79907V9.80108L26.8494 18.9384L28.9714 18.6855L32.4751 15.0254C32.5272 14.4414 32.6002 13.2172 32.4751 12.992C32.3499 12.7667 26.3332 6.87092 23.3405 3.95117H21.2445C20.0558 5.10864 17.6783 7.49867 17.6783 7.79907Z"
                                      fill="#D0D0D0"/>
                                <path d="M25.937 1.51078L23.3719 3.98199L32.5064 12.9916L34.7588 10.4577C35.9851 8.98117 35.2698 7.59013 34.7588 7.07918L29.0653 1.51078C27.8641 0.33456 26.4793 1.02069 25.937 1.51078Z"
                                      fill="#FA6692"/>
                                <path d="M0.108465 36.2355C-0.217704 36.2856 1.55052 26.6192 1.62576 25.6406L7.13398 26.5253L6.70743 29.7872H10.3707L10.9283 34.943C7.4239 35.3529 0.3694 36.1955 0.108465 36.2355Z"
                                      fill="url(#paint1_linear)"/>
                                <path d="M0.108053 36.2361C-0.0397616 36.2588 0.255582 34.2769 0.62978 32.0117L4.37566 35.7274C2.10742 35.9944 0.239766 36.2159 0.108053 36.2361Z"
                                      fill="#777777"/>
                            </g>
                            <defs>
                                <filter id="filter0_d" x="0.0683594" y="0.861328" width="43.3675" height="43.3749"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                   values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                    <feOffset dx="4" dy="4"/>
                                    <feGaussianBlur stdDeviation="2"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                                </filter>
                                <linearGradient id="paint0_linear" x1="7.1639" y1="28.9285" x2="21.4546" y2="14.1592"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF8642"/>
                                    <stop offset="1" stop-color="#FFB08F"/>
                                </linearGradient>
                                <linearGradient id="paint1_linear" x1="5.50831" y1="25.5975" x2="5.50831" y2="36.2363"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FFC48E"/>
                                    <stop offset="1" stop-color="#FFC666"/>
                                </linearGradient>
                            </defs>
                        </svg></div>',
                        'tag' => 'a',
                        'class' => 'block-link'
                    ],
                ]) ?>

                <?php $form = ActiveForm::begin(); ?>
                <div class="formStyle label-modal all-width">
                    <?= $form->field($model, 'projectId') ?>
                    <?= $form->field($model, 'nameProject') ?>
                </div>

                <div class="modalDoubleButton">

                    <button id="updateName" data-id="<?= $project->id ?>" type="button" class="btn btn-gold">Изменить
                    </button>

                    <button type="button" class="close-my btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
                <div class="success-message" id="successNameMessage">

                </div>
                <?php ActiveForm::end(); ?>


                <?php Modal::end(); ?></h5>
        </div>
    </section>
    <section class="topInfo">
        <div class="myContainer">
            <div class="frame">
                <div class="stringBlock">
                    <div class="stringWrap">
                        <div class="stringBold">
                            Город:
                        </div>
                        <div class="stringRegular"><span
                                    id="cityName"><?php
                                if (!empty($project->city)) {
                                    echo $project->city_name->city;
                                } else {
                                    echo 'Город не известный';
                                } ?></span>
                            <?php Modal::begin([
                                'size' => 'modal-lg',
                                'header' => '<h2>Изменить город</h2>',
                                'toggleButton' => [
                                    'label' => '<div class="svgIcon">
                                    <svg width="44" height="45" viewBox="0 0 44 45" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g filter="url(#filter0_d)">
                                            <path d="M17.6938 9.71484C12.4516 14.9114 1.89891 25.3729 1.6254 25.6466L7.09552 26.5353L6.68526 29.8174H10.3776L10.9246 34.9456L26.8563 18.9455L17.6938 9.71484Z"
                                                  fill="url(#paint0_linear)"/>
                                            <path d="M17.6783 7.79907V9.80108L26.8494 18.9384L28.9714 18.6855L32.4751 15.0254C32.5272 14.4414 32.6002 13.2172 32.4751 12.992C32.3499 12.7667 26.3332 6.87092 23.3405 3.95117H21.2445C20.0558 5.10864 17.6783 7.49867 17.6783 7.79907Z"
                                                  fill="#D0D0D0"/>
                                            <path d="M25.937 1.51078L23.3719 3.98199L32.5064 12.9916L34.7588 10.4577C35.9851 8.98117 35.2698 7.59013 34.7588 7.07918L29.0653 1.51078C27.8641 0.33456 26.4793 1.02069 25.937 1.51078Z"
                                                  fill="#FA6692"/>
                                            <path d="M0.108465 36.2355C-0.217704 36.2856 1.55052 26.6192 1.62576 25.6406L7.13398 26.5253L6.70743 29.7872H10.3707L10.9283 34.943C7.4239 35.3529 0.3694 36.1955 0.108465 36.2355Z"
                                                  fill="url(#paint1_linear)"/>
                                            <path d="M0.108053 36.2361C-0.0397616 36.2588 0.255582 34.2769 0.62978 32.0117L4.37566 35.7274C2.10742 35.9944 0.239766 36.2159 0.108053 36.2361Z"
                                                  fill="#777777"/>
                                        </g>
                                        <defs>
                                            <filter id="filter0_d" x="0.0683594" y="0.861328" width="43.3675"
                                                    height="43.3749" filterUnits="userSpaceOnUse"
                                                    color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                                <feOffset dx="4" dy="4"/>
                                                <feGaussianBlur stdDeviation="2"/>
                                                <feColorMatrix type="matrix"
                                                               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                         result="effect1_dropShadow"/>
                                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow"
                                                         result="shape"/>
                                            </filter>
                                            <linearGradient id="paint0_linear" x1="7.1639" y1="28.9285" x2="21.4546"
                                                            y2="14.1592" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FF8642"/>
                                                <stop offset="1" stop-color="#FFB08F"/>
                                            </linearGradient>
                                            <linearGradient id="paint1_linear" x1="5.50831" y1="25.5975" x2="5.50831"
                                                            y2="36.2363" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FFC48E"/>
                                                <stop offset="1" stop-color="#FFC666"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>',
                                    'tag' => 'a',
                                    'class' => 'block-link',
                                ],
                            ]); ?>
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="formStyle label-modal all-width">
                                <div class="groupForFlex">
                                    <div class="flex__length cityInput">
                                        <?= $form->field($model, 'city')->dropDownList($city)
                                            ->label('Город') ?>
                                    </div>
                                </div>
                                <div class="buttonGroup1">
                                    <div class="modalDoubleButton">
                                        <button id="updateCity" data-id="<?= $project->id ?>" type="button"
                                                class="btn btn-gold" data-dismiss="modal">
                                            Изменить
                                        </button>
                                        <button type="button" class="close-my btn btn-default" data-dismiss="modal">
                                            Закрыть
                                        </button>
                                    </div>
                                </div>
                                <div class="success-message" id="successCustomerMessage">

                                </div>
                                <?= $form->field($model, 'addCity')->textInput()
                                    ->label('Добавить город') ?>
                                <div class="buttonGroup1">
                                    <div class="modalDoubleButton">
                                        <button id="addCity" type="button" class="btn btn-gold">Добавить</button>
                                    </div>

                                </div>
                                <p id="successCityMessage">

                                </p>
                            </div>
                            <?php ActiveForm::end(); ?>
                            <?php Modal::end(); ?>

                        </div>
                    </div>
                    <div class="stringWrap">
                        <div class="stringBold">
                            Заказчик:
                        </div>
                        <div class="stringRegular"><span
                                    id="customerName"><?= $project->client->surname . ' ' . $project->client->user_name
                                . ' ' . $project->client->last_name ?></span>
                            <?php Modal::begin([
                                'size' => 'modal-lg',
                                'header' => '<h2>Изменить данные</h2>',
                                'toggleButton' => [
                                    'label' => '<div class="svgIcon">
                                    <svg width="44" height="45" viewBox="0 0 44 45" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g filter="url(#filter0_d)">
                                            <path d="M17.6938 9.71484C12.4516 14.9114 1.89891 25.3729 1.6254 25.6466L7.09552 26.5353L6.68526 29.8174H10.3776L10.9246 34.9456L26.8563 18.9455L17.6938 9.71484Z"
                                                  fill="url(#paint0_linear)"/>
                                            <path d="M17.6783 7.79907V9.80108L26.8494 18.9384L28.9714 18.6855L32.4751 15.0254C32.5272 14.4414 32.6002 13.2172 32.4751 12.992C32.3499 12.7667 26.3332 6.87092 23.3405 3.95117H21.2445C20.0558 5.10864 17.6783 7.49867 17.6783 7.79907Z"
                                                  fill="#D0D0D0"/>
                                            <path d="M25.937 1.51078L23.3719 3.98199L32.5064 12.9916L34.7588 10.4577C35.9851 8.98117 35.2698 7.59013 34.7588 7.07918L29.0653 1.51078C27.8641 0.33456 26.4793 1.02069 25.937 1.51078Z"
                                                  fill="#FA6692"/>
                                            <path d="M0.108465 36.2355C-0.217704 36.2856 1.55052 26.6192 1.62576 25.6406L7.13398 26.5253L6.70743 29.7872H10.3707L10.9283 34.943C7.4239 35.3529 0.3694 36.1955 0.108465 36.2355Z"
                                                  fill="url(#paint1_linear)"/>
                                            <path d="M0.108053 36.2361C-0.0397616 36.2588 0.255582 34.2769 0.62978 32.0117L4.37566 35.7274C2.10742 35.9944 0.239766 36.2159 0.108053 36.2361Z"
                                                  fill="#777777"/>
                                        </g>
                                        <defs>
                                            <filter id="filter0_d" x="0.0683594" y="0.861328" width="43.3675"
                                                    height="43.3749" filterUnits="userSpaceOnUse"
                                                    color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                                <feOffset dx="4" dy="4"/>
                                                <feGaussianBlur stdDeviation="2"/>
                                                <feColorMatrix type="matrix"
                                                               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                         result="effect1_dropShadow"/>
                                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow"
                                                         result="shape"/>
                                            </filter>
                                            <linearGradient id="paint0_linear" x1="7.1639" y1="28.9285" x2="21.4546"
                                                            y2="14.1592" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FF8642"/>
                                                <stop offset="1" stop-color="#FFB08F"/>
                                            </linearGradient>
                                            <linearGradient id="paint1_linear" x1="5.50831" y1="25.5975" x2="5.50831"
                                                            y2="36.2363" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FFC48E"/>
                                                <stop offset="1" stop-color="#FFC666"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>',
                                    'tag' => 'a',
                                    'class' => 'block-link',
                                ],
                            ]); ?>
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="formStyle label-modal all-width">
                                <div class="groupForFlex">
                                    <div class="photoDate2">
                                        <?= $form->field($model, 'dateStart')->label('Дата начала стадии')->widget(
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
                                    <div class="flex__length">
                                        <?= $form->field($model, 'length') ?>
                                        <?= $form->field($model, 'area') ?>
                                        <?= $form->field($model, 'customer')->dropDownList($customers) ?>
                                    </div>
                                </div>
                                <div class="modalDoubleButton">

                                    <button id="updateCustomer" data-id="<?= $project->id ?>" type="button"
                                            class="btn btn-gold">Изменить
                                    </button>

                                    <button type="button" class="close-my btn btn-default" data-dismiss="modal">
                                        Закрыть
                                    </button>
                                </div>
                                <div class="success-message" id="successCustomerMessage">

                                </div>

                            </div>
                            <?php ActiveForm::end(); ?>
                            <?php Modal::end(); ?>

                        </div>
                    </div>

                    <div class="stringWrap">
                        <div class="stringBold">Дата начала проекта:</div>
                        <div id="date_start" class="stringRegular"><?= $project->getDate($project->date_start) ?></div>
                    </div>
                    <div class="stringWrap">
                        <div class="stringBold">На разработку проектка выделено:</div>
                        <div class="stringRegular"><span id="project_length"><?= $project->length ?></span> рабочих дней
                        </div>
                    </div>
                    <div class="stringWrap">
                        <div class="stringBold">Площадь дизайна:</div>
                        <div class="stringRegular"><span id="project_area"><?= $project->area ?></span> кв. м.</div>
                    </div>
                </div>
                <div class="stringBlock">
                    <div class="stringWrap">
                        <div class="stringBold">Стоимость проекта:</div>
                        <div class="stringRegular"><span id="resultDigital"><?= $project->price_digital ?>
                            </span> <span class="resultCurrency"><?php
                                if ($project->currency) {
                                    echo $project->valut->currency;
                                } else {
                                    echo 'В неизвестной валюте';
                                }
                                ?></span>
                            <a id="valutButton" class="block-link">
                                <div class="svgIcon">
                                    <svg width="44" height="45" viewBox="0 0 44 45" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g filter="url(#filter0_d)">
                                            <path d="M17.6938 9.71484C12.4516 14.9114 1.89891 25.3729 1.6254 25.6466L7.09552 26.5353L6.68526 29.8174H10.3776L10.9246 34.9456L26.8563 18.9455L17.6938 9.71484Z"
                                                  fill="url(#paint0_linear)"/>
                                            <path d="M17.6783 7.79907V9.80108L26.8494 18.9384L28.9714 18.6855L32.4751 15.0254C32.5272 14.4414 32.6002 13.2172 32.4751 12.992C32.3499 12.7667 26.3332 6.87092 23.3405 3.95117H21.2445C20.0558 5.10864 17.6783 7.49867 17.6783 7.79907Z"
                                                  fill="#D0D0D0"/>
                                            <path d="M25.937 1.51078L23.3719 3.98199L32.5064 12.9916L34.7588 10.4577C35.9851 8.98117 35.2698 7.59013 34.7588 7.07918L29.0653 1.51078C27.8641 0.33456 26.4793 1.02069 25.937 1.51078Z"
                                                  fill="#FA6692"/>
                                            <path d="M0.108465 36.2355C-0.217704 36.2856 1.55052 26.6192 1.62576 25.6406L7.13398 26.5253L6.70743 29.7872H10.3707L10.9283 34.943C7.4239 35.3529 0.3694 36.1955 0.108465 36.2355Z"
                                                  fill="url(#paint1_linear)"/>
                                            <path d="M0.108053 36.2361C-0.0397616 36.2588 0.255582 34.2769 0.62978 32.0117L4.37566 35.7274C2.10742 35.9944 0.239766 36.2159 0.108053 36.2361Z"
                                                  fill="#777777"/>
                                        </g>
                                        <defs>
                                            <filter id="filter0_d" x="0.0683594" y="0.861328" width="43.3675"
                                                    height="43.3749" filterUnits="userSpaceOnUse"
                                                    color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                                <feOffset dx="4" dy="4"/>
                                                <feGaussianBlur stdDeviation="2"/>
                                                <feColorMatrix type="matrix"
                                                               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                         result="effect1_dropShadow"/>
                                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow"
                                                         result="shape"/>
                                            </filter>
                                            <linearGradient id="paint0_linear" x1="7.1639" y1="28.9285" x2="21.4546"
                                                            y2="14.1592" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FF8642"/>
                                                <stop offset="1" stop-color="#FFB08F"/>
                                            </linearGradient>
                                            <linearGradient id="paint1_linear" x1="5.50831" y1="25.5975" x2="5.50831"
                                                            y2="36.2363" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FFC48E"/>
                                                <stop offset="1" stop-color="#FFC666"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="stringWrap">
                        <div class="stringBold">Прописью:</div>
                        <div class="stringRegular"><span id="resultWords"><?= $project->price_words ?></span>
                            <span class="resultCurrency"><?php
                                if ($project->currency) {
                                    echo $project->valut->currency;
                                } else {
                                    echo 'В неизвестной валюте';
                                }
                                ?></span></div>
                    </div>
                    <div class="stringWrap">
                        <div class="stringBold">Распределение взносов:</div>
                        <div id="stringPrice" class="stringRegular">
                            <?php
                            for ($i = 1; $i < 6; $i++) {
                                $word = 'price_p';
                                $index = $word . $i;
                                if (!$project->$index == 0) {
                                    echo $project->$index . '%' . '&nbsp &nbsp';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <br>
                    <span id="depositContent">
                            <?= $this->render('/project/party/deposit', [
                                'project' => $project,
                            ]); ?>
                        </span>
                    <div class="hiddenInputs hidden-block " id="hiddenValut">

                        <div class="bigGroup hidden-group formStyle all-width">
                            <?php $form = ActiveForm::begin() ?>

                            <div class="wrap-group">
                                <div class="price-group">
                                    <h5>Цена проекта</h5>
                                    <div class="price-wrap">
                                        <div id="price__group1">
                                            <div class="form-group">
                                                <label>Цифрой</label>
                                                <?= $form->field($model, 'priceDigital')
                                                    ->label(false) ?>
                                                <div class="help-block"></div>
                                            </div>
                                            <div class="form-group">
                                                <label>Словами</label>
                                                <?= $form->field($model, 'priceWords')
                                                    ->label(false) ?>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="mod-group" id="price__group2">
                                            <div class="form-group">
                                                <label>В валюте:</label>
                                                <?= $form->field($model, 'currency')->dropDownList($currency)->label(false) ?>
                                            </div>
                                            <div class="form-group plus-link">
                                                <?php Modal::begin([
                                                    'size' => 'modal-lg',
                                                    'header' => '<h2>Добавить название валюты</h2>',
                                                    'toggleButton' => [
                                                        'label' => '+',
                                                        'tag' => 'a',
                                                        'class' => 'a-link plus-button hidden-a',
                                                    ],
                                                ]) ?>
                                                <div id="successCurrencyMessage">

                                                </div>
                                                <div class="form-group">
                                                    <label class="label-modal">Название валюты</label>
                                                    <input type="text" id="currency"
                                                           class="form-control" aria-required="true">
                                                </div>

                                                <div class="modal-footer">
                                                    <button id="addCurrency" type="button" class="btn btn-primary">
                                                        Добавить
                                                    </button>
                                                </div>

                                                <?php Modal::end(); ?>
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
                                                <?= $form->field($model, 'pricePart1')->label(false) ?>
                                                <div class="count">
                                                    <p id="count1"><?= $project->result1 ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contrColumt">
                                            <div class="form-group">
                                                <label>2(%)</label>
                                                <?= $form->field($model, 'pricePart2')->label(false) ?>
                                                <div class="count">
                                                    <p id="count2"><?= $project->result2 ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contrColumt">
                                            <div class="form-group">
                                                <label>3(%)</label>
                                                <?= $form->field($model, 'pricePart3')->label(false) ?>
                                                <div class="count">
                                                    <p id="count3"><?= $project->result3 ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contrColumt">
                                            <div class="form-group">
                                                <label>4(%)</label>
                                                <?= $form->field($model, 'pricePart4')->label(false) ?>
                                                <div class="count">
                                                    <p id="count4"><?= $project->result4 ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contrColumt">
                                            <div class="form-group">
                                                <label>5(%)</label>
                                                <?= $form->field($model, 'pricePart5')->label(false) ?>
                                                <div class="count">
                                                    <p id="count5"><?= $project->result5 ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button">
                                        <a class="a-link" id="calculate">
                                            Посчитать
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="button-container">
                                <div class="modalDoubleButton">
                                    <button id="updateMoney" data-id="<?= $project->id ?>" type="button"
                                            class="btn btn-gold">Изменить
                                    </button>
                                    <button id="closeValut" type="button" class="close-my btn btn-default">
                                        Закрыть
                                    </button>
                                </div>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>

                    </div>


                </div>
                <div class="projectPhoto">
                    <form action="/admin/project/update-photo-ajax" method="post" enctype="multipart/form-data"
                          id="form">
                        <span>Чтобы изменить изображение:</span>
                        <input type="file" name="image" id="image">
                        <input type="hidden" name="id" id="id" value="<?= $project->id ?>">
                    </form>

                    <hr>
                    <span class="newPhoto"><img src="<?= $project->getImage() ?>" title="project photo"
                                                alt="project photo"></span>

                </div>

                <hr>
            </div>
    </section>
    <section class="stages">
        <div class="myContainer">
            <h2>Стадии проекта</h2>
            <div id="stagesView" class="wrap">
                <?= $this->render('/stage/stage', [
                    'stages' => $stages,
                ]); ?>
            </div>
            <div class="add-button button-group">

                <?php Modal::begin([
                    'size' => 'modal-lg',
                    'header' => '<h2>Добавление стадии</h2>',
                    'toggleButton' => [
                        'label' => 'Добавить стадию',
                        'tag' => 'a',
                        'class' => 'a-link',
                    ],
                ]); ?>
                <div class="success-messages" id="successStageMessage">

                </div>
                <div class="form-group modal-lab">
                    <label class="label-modal">Номер стадии</label>
                    <input type="text" id="number" data-id="<?= $project->id ?>"
                           class="form-control modalInput" aria-required="true">
                    <p class="mistake" id="number-error"></p>
                </div>
                <div class="form-group modal-lab">
                    <label class="label-modal">Название стадии</label>
                    <input type="text" id="titleName"
                           class="form-control modalInput" aria-required="true">
                    <p class="mistake" id="title-error"></p>
                </div>
                <div class="groupForFlex">
                    <div class="photoDate2">
                        <?php $form = ActiveForm::begin(); ?>
                        <?= $form->field($stageModel, 'date')->label('Дата начала стадии')->widget(
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
                        <?php ActiveForm::end(); ?>
                    </div>
                    <div class="flex__length">
                        <label class="label-modal">Длина стадии(дней)</label>
                        <input type="text" id="length"
                               class="form-control modalInput" aria-required="true">
                    </div>

                </div>


                <div class="modal-footer formStyle">
                    <div class="success-message" id="successMessageStage">

                    </div>
                    <button id="addStage" type="button" class="btn btn-primary">Добавить стадию
                    </button>

                    <button type="button" class="close-my btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
                <?php Modal::end() ?>
                <a class="a-link" href="">Взять из шаблона</a>
            </div>


        </div>
        <br>
        <hr>
</div>
</section>
<section class="doc">
    <div class="myContainer">
        <h2 id="docs">Техническое задание на проектирование
            <a id="showAssignmentBlock" class="block-link">
                <div class="svgIcon">
                    <svg width="44" height="45" viewBox="0 0 44 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d)">
                            <path d="M17.6938 9.71484C12.4516 14.9114 1.89891 25.3729 1.6254 25.6466L7.09552 26.5353L6.68526 29.8174H10.3776L10.9246 34.9456L26.8563 18.9455L17.6938 9.71484Z"
                                  fill="url(#paint0_linear)"/>
                            <path d="M17.6783 7.79907V9.80108L26.8494 18.9384L28.9714 18.6855L32.4751 15.0254C32.5272 14.4414 32.6002 13.2172 32.4751 12.992C32.3499 12.7667 26.3332 6.87092 23.3405 3.95117H21.2445C20.0558 5.10864 17.6783 7.49867 17.6783 7.79907Z"
                                  fill="#D0D0D0"/>
                            <path d="M25.937 1.51078L23.3719 3.98199L32.5064 12.9916L34.7588 10.4577C35.9851 8.98117 35.2698 7.59013 34.7588 7.07918L29.0653 1.51078C27.8641 0.33456 26.4793 1.02069 25.937 1.51078Z"
                                  fill="#FA6692"/>
                            <path d="M0.108465 36.2355C-0.217704 36.2856 1.55052 26.6192 1.62576 25.6406L7.13398 26.5253L6.70743 29.7872H10.3707L10.9283 34.943C7.4239 35.3529 0.3694 36.1955 0.108465 36.2355Z"
                                  fill="url(#paint1_linear)"/>
                            <path d="M0.108053 36.2361C-0.0397616 36.2588 0.255582 34.2769 0.62978 32.0117L4.37566 35.7274C2.10742 35.9944 0.239766 36.2159 0.108053 36.2361Z"
                                  fill="#777777"/>
                        </g>
                        <defs>
                            <filter id="filter0_d" x="0.0683594" y="0.861328" width="43.3675" height="43.3749"
                                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feColorMatrix in="SourceAlpha" type="matrix"
                                               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                <feOffset dx="4" dy="4"/>
                                <feGaussianBlur stdDeviation="2"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                            </filter>
                            <linearGradient id="paint0_linear" x1="7.1639" y1="28.9285" x2="21.4546" y2="14.1592"
                                            gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FF8642"/>
                                <stop offset="1" stop-color="#FFB08F"/>
                            </linearGradient>
                            <linearGradient id="paint1_linear" x1="5.50831" y1="25.5975" x2="5.50831" y2="36.2363"
                                            gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FFC48E"/>
                                <stop offset="1" stop-color="#FFC666"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </a>

        </h2>
        <?php if($project->checkAssignment()):?>
        <div class="clients">
            <div class="add-button button-group">
                <a class="a-link" href="<?=Url::to(['assignment', 'id'=>$project->id])?>">Техзадание</a>
            </div>
        </div>
        <?php endif;?>

<div class="hiddenInputs hidden-block docs" id="assignmentBlock">
        <span id="blockAssignment">
            <?= $this->render('/project/party/blockAssignment', [
                'project' => $project,
                'characteristicModel' => $characteristicModel,
                'characteristicArray' => $characteristicArray,
                'questionModel' => $questionModel,
                'questionsArray' => $questionsArray,
            ]); ?>
        </span>
</div>

    <hr>


        <h2>Договор на разработку проекта
            <a id="contracts" class="block-link">
                <div class="svgIcon">
                    <svg width="44" height="45" viewBox="0 0 44 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d)">
                            <path d="M17.6938 9.71484C12.4516 14.9114 1.89891 25.3729 1.6254 25.6466L7.09552 26.5353L6.68526 29.8174H10.3776L10.9246 34.9456L26.8563 18.9455L17.6938 9.71484Z"
                                  fill="url(#paint0_linear)"/>
                            <path d="M17.6783 7.79907V9.80108L26.8494 18.9384L28.9714 18.6855L32.4751 15.0254C32.5272 14.4414 32.6002 13.2172 32.4751 12.992C32.3499 12.7667 26.3332 6.87092 23.3405 3.95117H21.2445C20.0558 5.10864 17.6783 7.49867 17.6783 7.79907Z"
                                  fill="#D0D0D0"/>
                            <path d="M25.937 1.51078L23.3719 3.98199L32.5064 12.9916L34.7588 10.4577C35.9851 8.98117 35.2698 7.59013 34.7588 7.07918L29.0653 1.51078C27.8641 0.33456 26.4793 1.02069 25.937 1.51078Z"
                                  fill="#FA6692"/>
                            <path d="M0.108465 36.2355C-0.217704 36.2856 1.55052 26.6192 1.62576 25.6406L7.13398 26.5253L6.70743 29.7872H10.3707L10.9283 34.943C7.4239 35.3529 0.3694 36.1955 0.108465 36.2355Z"
                                  fill="url(#paint1_linear)"/>
                            <path d="M0.108053 36.2361C-0.0397616 36.2588 0.255582 34.2769 0.62978 32.0117L4.37566 35.7274C2.10742 35.9944 0.239766 36.2159 0.108053 36.2361Z"
                                  fill="#777777"/>
                        </g>
                        <defs>
                            <filter id="filter0_d" x="0.0683594" y="0.861328" width="43.3675" height="43.3749"
                                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feColorMatrix in="SourceAlpha" type="matrix"
                                               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                <feOffset dx="4" dy="4"/>
                                <feGaussianBlur stdDeviation="2"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                            </filter>
                            <linearGradient id="paint0_linear" x1="7.1639" y1="28.9285" x2="21.4546" y2="14.1592"
                                            gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FF8642"/>
                                <stop offset="1" stop-color="#FFB08F"/>
                            </linearGradient>
                            <linearGradient id="paint1_linear" x1="5.50831" y1="25.5975" x2="5.50831" y2="36.2363"
                                            gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FFC48E"/>
                                <stop offset="1" stop-color="#FFC666"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </a>
        </h2>
        <div class="hiddenInputs hidden-block docs" id="hiddenContracts">

            <div class="bigGroup hidden-group formStyle all-width">

                <div class="">
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="procent-group">

                        <?= $form->field($modelTemplateContract, 'dateContract')->textInput()
                            ->label('Дата заключения договора') ?>
                        <?= $form->field($modelTemplateContract, 'dateStart')->textInput()
                            ->label('Дата начала проекта') ?>

                        <?= $form->field($modelTemplateContract, 'customer')->textInput()
                            ->label('ФИО заказчика') ?>
                    </div>

                    <?= $form->field($modelTemplateContract, 'address')->textInput()
                        ->label('Адрес дизайна') ?>
                    <div class="procent-group">
                        <?= $form->field($modelTemplateContract, 'priceWords')->textInput()
                            ->label('Цена прописью') ?>

                        <?= $form->field($modelTemplateContract, 'currency')->textInput()
                            ->label('В валюте') ?>
                        <?= $form->field($modelTemplateContract, 'customerInfo')->textarea(['rows' => 4])
                            ->label('Данные о заказчике') ?>
                    </div>


                    <div class="procent-group">

                    </div>


                </div>
                <h3>Создать договор из...</h3>
                <div class="wrap">
                    <div class="contracts-template">
                        <h4>Создать договор из шаблона</h4>
                        <div class="formStyleBig">

                            <div class="form-path">
                                <?= $form->field($modelTemplateContract, 'templateId')
                                    ->dropDownList($contractsArray)
                                    ->label('Выберите шаблон договора') ?>
                            </div>
                            <div class="buttonGroup1">
                                <div class="modalDoubleButton">
                                    <button id="addTempContract" type="button"
                                            data-id="<?= $project->id ?>" class=" btn btn-orange">
                                        Создать
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="contracts-analog">
                        <h4>Создать договор из договора</h4>
                        <div class="formStyleBig">

                            <div class="form-path">
                                <?= $form->field($modelContract, 'contractId')
                                    ->dropDownList($projectContractArray)
                                    ->label('Выберите договор из проекта') ?>
                            </div>
                            <div class="buttonGroup1">
                                <div class="modalDoubleButton">
                                    <button id="addContractContract" type="button"
                                            data-id="<?= $project->id ?>" class=" btn btn-orange">
                                        Создать
                                    </button>
                                </div>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
                <div class="">
                    <p class="success-message" id="successContractMessage"></p>
                </div>
                <div class="buttonGroup1">
                    <div class="modalDoubleButton">
                        <button id="closeContracts" type="button" class="close-my btn btn-default">
                            Закрыть
                        </button>
                    </div>
                </div>
            </div>

        </div>
        <div id="contractsView" class="">
            <?= $this->render('/project/party/contracts', [
                'contracts' => $contracts,
                'updateContract' => $updateContract,
            ]); ?>
        </div>
        <br>


    </div>
</section>


</div>
