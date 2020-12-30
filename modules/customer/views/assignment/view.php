<?php
/**
 * @var $assignment \app\models\Assignment
 * @var $questionNotAnswer
 */

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Создание референсов';

$this->registerJsFile('/files/js/assignment/addReference.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/files/js/project/form.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/files/js/assignment/addPhoto.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);
?>


<div class="mainContent userPage">
    <div class="button">
        <a href="javascript:history.back()" class="a-link cancel">Назад</a>
    </div>

    <div class="myContainer">
        <div class="top">
            <h2>Техническое задание на проектирование</h2>
        </div>
        <div class="frame contentFrame">
            <div class="mainAssignmentWrap">
                <h2>Основные сведения об объекте<a class="block-link">
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
                    </a></h2>
                <p>Адрес объекта: <?= Html::encode($assignment->address) ?></p>
                <p>Техническое задание создал: <?= Html::encode($assignment->customer) ?></p>
                <p>Краткое описание: <?= Html::encode($assignment->description) ?></p>
            </div>
            </div>

        <section id="mainReference">
            <h2>Предпочтения по общему стилю:</h2>
            <div class="refWrap">
                <div class="references" id="referenceBlock">
                    <?= $this->render('/assignment/party/references', [
                        'references' => $references,
                    ]) ?>
                </div>


            </div>
            <div id="referenceView" class="hiddenInputs">

                <div class="custom">
                    <div class="formContainer1">
                        <span id="newReference"></span>
                        <form action="/customer/assignment/add-photo-ajax" method="post"
                              enctype="multipart/form-data"
                              id="form">
                            <label>Чтобы изменить изображение:</label>
                            <input type="file" name="image" id="image">
                            <input type="hidden" name="id" id="id" value="<?= $assignment->id ?>">
                            <input type="hidden" name="type" id="type" value="<?= \app\models\Reference::TYPE_GENERAL ?>">
                        </form>
                    </div>
                    <span id="addComment">

                </span>
                </div>
            </div>


            <div class="button">
                <a id="showCustomization" class="a-link cancel">Добавить референс</a>
            </div>

            <hr>
        </section>
    </div>
        <section id="questions" class="dark-section">
            <div class="myContainer">
                <h2>Анкетные данные. Характеристики объекта</h2>


                <div class="button">
                    <a href="<?= Url::to(['questions-view', 'id' => $assignment->id]) ?>"
                       class="a-link cancel"><?= $assignment->checkQuestion() ?></a>
                </div>

                <div class="button">
                    <a href="<?= Url::to(['characteristics-view', 'id' => $assignment->id]) ?>"
                       class="a-link cancel"><?= $assignment->checkCharacteristic() ?></a>
                </div>
            </div>
        </section>

    <div class="myContainer">
        <hr>
        <section class="section-reference">
            <h2>Предопочтения по стенам и перегородкам</h2>
            <div class="refWrap">
                <div class="references" id="referenceBlockWall">
                    <?= $this->render('/assignment/party/references', [
                        'references' => $referencesWall,
                    ]) ?>
                </div>


            </div>
            <div id="referenceWall" class="hiddenInputs">

                <div class="custom">
                    <div class="formContainer1">
                        <span id="newReferenceWall"></span>
                        <form action="/customer/assignment/add-photo-ajax" method="post"
                              enctype="multipart/form-data"
                              id="formWall">
                            <label>Чтобы изменить изображение:</label>
                            <input type="file" name="image" id="imageWall">
                            <input type="hidden" name="id" id="id" value="<?= $assignment->id ?>">
                            <input type="hidden" name="type" id="type" value="<?= \app\models\Reference::TYPE_WALL ?>">
                        </form>
                    </div>
                    <span id="addCommentWall">

                </span>
                </div>
            </div>


            <div class="button">
                <a id="showAddWallReference" class="a-link cancel">Добавить референс</a>
            </div>

        </section>

        <hr>
        <section class="section-reference">
            <h2>Предпочтения по полам и потолкам</h2>
            <div class="refWrap">
                <div class="references" id="referenceBlockFloor">
                    <?= $this->render('/assignment/party/references', [
                        'references' => $referencesFloor,
                    ]) ?>
                </div>


            </div>
            <div id="referenceFloor" class="hiddenInputs">
                <div class="custom">
                    <div class="formContainer1">
                        <span id="newReferenceFloor"></span>
                        <form action="/customer/assignment/add-photo-ajax" method="post"
                              enctype="multipart/form-data"
                              id="formFloor">
                            <label>Чтобы изменить изображение:</label>
                            <input type="file" name="image" id="imageFloor">
                            <input type="hidden" name="id" id="id" value="<?= $assignment->id ?>">
                            <input type="hidden" name="type" id="type" value="<?= \app\models\Reference::TYPE_FLOOR ?>">
                        </form>
                    </div>
                    <span id="addCommentFloor">

                </span>
                </div>
            </div>

            <div class="button">
                <a id="showAddFloorReference" class="a-link cancel">Добавить референс</a>
            </div>
            <hr>
        </section>

        <section class="section-reference">
            <h2>Предпочтения по мебели</h2>
            <?php $name = 'Furniture';
            $type = \app\models\Reference::TYPE_FURNITURE;
            ?>
            <div class="refWrap">
                <div class="references" id="referenceBlock<?=$name?>">
                    <?= $this->render('/assignment/party/references', [

                        'references' => $referencesFurniture,
                    ]) ?>
                </div>


            </div>
            <div id="reference<?=$name?>" class="hiddenInputs">
                <div class="custom">
                    <div class="formContainer1">
                        <span id="newReference<?=$name?>"></span>
                        <form action="/customer/assignment/add-photo-ajax" method="post"
                              enctype="multipart/form-data"
                              id="form<?=$name?>">
                            <label>Чтобы изменить изображение:</label>
                            <input type="file" name="image" id="image<?=$name?>">
                            <input type="hidden" name="id" id="id" value="<?= $assignment->id ?>">
                            <input type="hidden" name="type" id="type" value="<?=$type?>">
                        </form>
                    </div>
                    <span id="addComment<?=$name?>">

                </span>
                </div>
            </div>

            <div class="button">
                <a id="showAdd<?=$name?>Reference" class="a-link cancel">Добавить референс</a>
            </div>
            <hr>
        </section>
    </div>
</div>
