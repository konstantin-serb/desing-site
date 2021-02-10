<?php
/**
 * @var $assignment \app\models\Assignment
 * @var $questionNotAnswer
 * @var $commentsModel \app\models\forms\comments\assignment\AddAnswerForm
 */

use app\components\Tree;
use app\models\AssignmentComments;
use vova07\imperavi\Widget;
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

$this->registerJsFile('/files/js/comments/accordion.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);
$this->registerJsFile('/files/js/comments/deleteComment.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$model->description = $assignment->description;
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
            <div class="mainAssignmentWrap accordion">
                <h2>Основные сведения об объекте
                    <a class="block-link accordionButton">
                        <div class="svgIcon">
                            <svg width="30" height="30" viewBox="0 0 44 45" fill="none"
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
                                    <filter id="filter0_d" x="0.0683594" y="0.861328" width="43.3675" height="43.3749"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                                       values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dx="4" dy="4"/>
                                        <feGaussianBlur stdDeviation="2"/>
                                        <feColorMatrix type="matrix"
                                                       values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow"
                                                 result="shape"/>
                                    </filter>
                                    <linearGradient id="paint0_linear" x1="7.1639" y1="28.9285" x2="21.4546"
                                                    y2="14.1592"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FF8642"/>
                                        <stop offset="1" stop-color="#FFB08F"/>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear" x1="5.50831" y1="25.5975" x2="5.50831"
                                                    y2="36.2363"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFC48E"/>
                                        <stop offset="1" stop-color="#FFC666"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                    </a>
                </h2>
                <div id="commentGeneral" class="accordionBlock hiddenInputs">

                    <div class="custom">

                        <div class="formContainer1">
                            <?php $form = ActiveForm::begin() ?>
                            <?php
                            try {
                                echo $form->field($model, 'description')->widget(Widget::className(), [
                                    'settings' => [
                                        'lang' => 'ru',
                                        'minHeight' => 200,
                                        'plugins' => [
                                            'clips',
                                            'fullscreen',
                                        ],
                                        'clips' => [
                                            ['Lorem ipsum...', 'Lorem...'],
                                            ['red', '<span class="label-red">red</span>'],
                                            ['green', '<span class="label-green">green</span>'],
                                            ['blue', '<span class="label-blue">blue</span>'],
                                        ],
//                                        'imageUpload' => Url::to(['save-image']),
//                                        'imageManagerJson' => Url::to(['/default/images-get']),
                                        'plugins' => [
                                            'imagemanager',
                                        ],
                                    ],
                                ]);
                            } catch (Exception $e) {
                            }
                            ?>
                            <div class="button classic-button">
                                <button class="a-link cancel" type="submit">Сохранить</button>
                            <?php ActiveForm::end(); ?>
                            </div>

                            <br>
                            <div class="buttonGroup1">
                                <div class="modalDoubleButton">
                                    <button id="hiddenCommentForm" type="button"
                                            class="cancelAccordionButton close-my btn btn-default">
                                        Скрыть
                                    </button>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <p>Адрес объекта: <?= Html::encode($assignment->address) ?></p>
                <p>Техническое задание создал: <?= Html::encode($assignment->customer) ?></p>
                <p>Текстовое описание: <?= Html::encode($assignment->description) ?></p>
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
                            <input type="hidden" name="type" id="type"
                                   value="<?= \app\models\Reference::TYPE_GENERAL ?>">
                        </form>
                    </div>
                    <span id="addComment">

                </span>
                </div>
            </div>


            <div class="button">
                <a id="showCustomization" class="a-link cancel">Добавить референс</a>
            </div>

            <div class="commentBlock accordion">
                <div class="accordionBlock hiddenInputs">
                    <?php
                    $type = AssignmentComments::GENERAL_PATH;
                    $globalCommentsArray = AssignmentComments::getCommentArray($allComments, $type);
                    $tree = Tree::createTree($globalCommentsArray);
                    $typeBlock = 'general'
                    ?>
                    <?= $this->render('party/comments', [
                        'tree' => $tree,
                        'commentsModel' => $answer,
                        'updateAnswerModel' => $updateAnswerModel,
                        'params' => [
                            'pathId' => 'formTypeGrand',
                            'pathType' => $type,
                            'type' => $typeBlock,
                            'allComments' => $allComments,
                            'userId' => $userId,
                            'projectId' => $projectId,
                        ],
                    ]) ?>
                    <br>
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>

                <div id="<?= $typeBlock ?>" class="button accordionButton <?php if (!$globalCommentsArray) {
                    echo 'hiddenInputs';
                } ?>">
                    <a class="a-link cancel">Комментарии (<?= count($globalCommentsArray) ?>)</a>
                </div>

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

            <div class="commentBlock accordion">
                <div class="accordionBlock hiddenInputs">
                    <?php
                    $type = AssignmentComments::WALL_PATH;
                    $wallCommentsArray = AssignmentComments::getCommentArray($allComments, $type);
                    $wallTree = Tree::createTree($wallCommentsArray);
                    $typeBlock = 'wall'
                    ?>
                    <?= $this->render('party/commentsWall', [
                        'wallTree' => $wallTree,
                        'commentsModel' => $answer,
                        'updateAnswerModel' => $updateAnswerModel,
                        'params' => [
                            'pathId' => 'formTypeWall',
                            'pathType' => $type,
                            'type' => $typeBlock,
                            'allComments' => $allComments,
                            'userId' => $userId,
                            'projectId' => $projectId,
                        ],
                    ]) ?>
                    <br>
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>

                <div id="<?= $typeBlock ?>" class="button accordionButton <?php if (!$wallCommentsArray) {
                    echo 'hiddenInputs';
                } ?>">
                    <a class="a-link cancel">Комментарии (<?= count($wallCommentsArray) ?>)</a>
                </div>

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
            <div class="commentBlock accordion">
                <div class="accordionBlock hiddenInputs">
                    <?php
                    $type = AssignmentComments::FLOOR_PATH;
                    $floorCommentsArray = AssignmentComments::getCommentArray($allComments, $type);
                    $floorTree = Tree::createTree($floorCommentsArray);
                    $typeBlock = 'floor'
                    ?>
                    <?= $this->render('party/commentsFloor', [
                        'floorTree' => $floorTree,
                        'commentsModel' => $answer,
                        'updateAnswerModel' => $updateAnswerModel,
                        'params' => [
                            'pathId' => 'formTypeFloor',
                            'pathType' => $type,
                            'type' => $typeBlock,
                            'allComments' => $allComments,
                            'userId' => $userId,
                            'projectId' => $projectId,
                        ],
                    ]) ?>
                    <br>
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>

                <div id="<?= $typeBlock ?>" class="button accordionButton <?php if (!$floorCommentsArray) {
                    echo 'hiddenInputs';
                } ?>">
                    <a class="a-link cancel">Комментарии (<?= count($floorCommentsArray) ?>)</a>
                </div>

            </div>
            <hr>
        </section>

        <section class="section-reference">
            <h2>Предпочтения по мебели</h2>
            <?php $name = 'Furniture';
            $type = \app\models\Reference::TYPE_FURNITURE;
            ?>
            <div class="refWrap">
                <div class="references" id="referenceBlock<?= $name ?>">
                    <?= $this->render('/assignment/party/references', [

                        'references' => $referencesFurniture,
                    ]) ?>
                </div>
            </div>
            <div id="reference<?= $name ?>" class="hiddenInputs">
                <div class="custom">
                    <div class="formContainer1">
                        <span id="newReference<?= $name ?>"></span>
                        <form action="/customer/assignment/add-photo-ajax" method="post"
                              enctype="multipart/form-data"
                              id="form<?= $name ?>">
                            <label>Чтобы изменить изображение:</label>
                            <input type="file" name="image" id="image<?= $name ?>">
                            <input type="hidden" name="id" id="id" value="<?= $assignment->id ?>">
                            <input type="hidden" name="type" id="type" value="<?= $type ?>">
                        </form>
                    </div>
                    <span id="addComment<?= $name ?>">

                </span>
                </div>
            </div>

            <div class="button">
                <a id="showAdd<?= $name ?>Reference" class="a-link cancel">Добавить референс</a>
            </div>
            <div class="commentBlock accordion">
                <div class="accordionBlock hiddenInputs">
                    <?php
                    $type = AssignmentComments::FURNITURE_PATH;
                    $furnitureCommentsArray = AssignmentComments::getCommentArray($allComments, $type);
                    $furnitureTree = Tree::createTree($furnitureCommentsArray);
                    $typeBlock = 'furniture'
                    ?>
                    <?= $this->render('party/commentsFurniture', [
                        'furnitureTree' => $furnitureTree,
                        'commentsModel' => $answer,
                        'updateAnswerModel' => $updateAnswerModel,
                        'params' => [
                            'pathId' => 'formTypeFurniture',
                            'pathType' => $type,
                            'type' => $typeBlock,
                            'allComments' => $allComments,
                            'userId' => $userId,
                            'projectId' => $projectId,
                        ],
                    ]) ?>
                    <br>
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>

                <div id="<?= $typeBlock ?>" class="button accordionButton <?php if (!$furnitureCommentsArray) {
                    echo 'hiddenInputs';
                } ?>">
                    <a class="a-link cancel">Комментарии (<?= count($furnitureCommentsArray) ?>)</a>
                </div>

            </div>
            <hr>
        </section>

        <section class="section-reference">
            <h2>Предпочтения по кухне</h2>
            <?php $name = 'Kitchen';
            $type = \app\models\Reference::TYPE_KITCHEN;
            ?>
            <div class="refWrap">
                <div class="references" id="referenceBlock<?= $name ?>">
                    <?= $this->render('/assignment/party/references', [

                        'references' => $referencesKitchen,
                    ]) ?>
                </div>


            </div>
            <div id="reference<?= $name ?>" class="hiddenInputs">
                <div class="custom">
                    <div class="formContainer1">
                        <span id="newReference<?= $name ?>"></span>
                        <form action="/customer/assignment/add-photo-ajax" method="post"
                              enctype="multipart/form-data"
                              id="form<?= $name ?>">
                            <label>Чтобы изменить изображение:</label>
                            <input type="file" name="image" id="image<?= $name ?>">
                            <input type="hidden" name="id" id="id" value="<?= $assignment->id ?>">
                            <input type="hidden" name="type" id="type" value="<?= $type ?>">
                        </form>
                    </div>
                    <span id="addComment<?= $name ?>">

                </span>
                </div>
            </div>

            <div class="button">
                <a id="showAdd<?= $name ?>Reference" class="a-link cancel">Добавить референс</a>
            </div>
            <div class="commentBlock accordion">
                <div class="accordionBlock hiddenInputs">
                    <?php
                    $type = AssignmentComments::KITCHEN_PATH;
                    $kitchenCommentsArray = AssignmentComments::getCommentArray($allComments, $type);
                    $kitchenTree = Tree::createTree($kitchenCommentsArray);
                    $typeBlock = 'kitchen'
                    ?>
                    <?= $this->render('party/commentsKitchen', [
                        'kitchenTree' => $kitchenTree,
                        'commentsModel' => $answer,
                        'updateAnswerModel' => $updateAnswerModel,
                        'params' => [
                            'pathId' => 'formTypeKitchen',
                            'pathType' => $type,
                            'type' => $typeBlock,
                            'allComments' => $allComments,
                            'userId' => $userId,
                            'projectId' => $projectId,
                        ],
                    ]) ?>
                    <br>
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>

                <div id="<?= $typeBlock ?>" class="button accordionButton <?php if (!$kitchenCommentsArray) {
                    echo 'hiddenInputs';
                } ?>">
                    <a class="a-link cancel">Комментарии (<?= count($kitchenCommentsArray) ?>)</a>
                </div>

            </div>
            <hr>
        </section>

        <section class="section-reference">
            <h2>Предпочтения по санузлам</h2>
            <?php $name = 'Bathroom';
            $type = \app\models\Reference::TYPE_BATHROOM;
            ?>
            <div class="refWrap">
                <div class="references" id="referenceBlock<?= $name ?>">
                    <?= $this->render('/assignment/party/references', [

                        'references' => $referencesBathroom,
                    ]) ?>
                </div>


            </div>
            <div id="reference<?= $name ?>" class="hiddenInputs">
                <div class="custom">
                    <div class="formContainer1">
                        <span id="newReference<?= $name ?>"></span>
                        <form action="/customer/assignment/add-photo-ajax" method="post"
                              enctype="multipart/form-data"
                              id="form<?= $name ?>">
                            <label>Чтобы изменить изображение:</label>
                            <input type="file" name="image" id="image<?= $name ?>">
                            <input type="hidden" name="id" id="id" value="<?= $assignment->id ?>">
                            <input type="hidden" name="type" id="type" value="<?= $type ?>">
                        </form>
                    </div>
                    <span id="addComment<?= $name ?>">

                </span>
                </div>
            </div>

            <div class="button">
                <a id="showAdd<?= $name ?>Reference" class="a-link cancel">Добавить референс</a>
            </div>
            <div class="commentBlock accordion">
                <div class="accordionBlock hiddenInputs">
                    <?php
                    $type = AssignmentComments::BATHROOM_PATH;
                    $bathroomCommentsArray = AssignmentComments::getCommentArray($allComments, $type);
                    $bathroomTree = Tree::createTree($bathroomCommentsArray);
                    $typeBlock = 'bathroom'
                    ?>
                    <?= $this->render('party/commentsBathroom', [
                        'bathroomTree' => $bathroomTree,
                        'commentsModel' => $answer,
                        'updateAnswerModel' => $updateAnswerModel,
                        'params' => [
                            'pathId' => 'formTypeBathroom',
                            'pathType' => $type,
                            'type' => $typeBlock,
                            'allComments' => $allComments,
                            'userId' => $userId,
                            'projectId' => $projectId,
                        ],
                    ]) ?>
                    <br>
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>

                <div id="<?= $typeBlock ?>" class="button accordionButton <?php if (!$bathroomCommentsArray) {
                    echo 'hiddenInputs';
                } ?>">
                    <a class="a-link cancel">Комментарии (<?= count($bathroomCommentsArray) ?>)</a>
                </div>

            </div>
            <hr>
        </section>

        <section class="section-reference">
            <h2>Предпочтения по жилым комнатам</h2>
            <?php $name = 'Rooms';
            $type = \app\models\Reference::TYPE_ROOMS;
            ?>
            <div class="refWrap">
                <div class="references" id="referenceBlock<?= $name ?>">
                    <?= $this->render('/assignment/party/references', [

                        'references' => $referencesRooms,
                    ]) ?>
                </div>


            </div>
            <div id="reference<?= $name ?>" class="hiddenInputs">
                <div class="custom">
                    <div class="formContainer1">
                        <span id="newReference<?= $name ?>"></span>
                        <form action="/customer/assignment/add-photo-ajax" method="post"
                              enctype="multipart/form-data"
                              id="form<?= $name ?>">
                            <label>Чтобы изменить изображение:</label>
                            <input type="file" name="image" id="image<?= $name ?>">
                            <input type="hidden" name="id" id="id" value="<?= $assignment->id ?>">
                            <input type="hidden" name="type" id="type" value="<?= $type ?>">
                        </form>
                    </div>
                    <span id="addComment<?= $name ?>">

                </span>
                </div>
            </div>

            <div class="button">
                <a id="showAdd<?= $name ?>Reference" class="a-link cancel">Добавить референс</a>
            </div>
            <div class="commentBlock accordion">
                <div class="accordionBlock hiddenInputs">
                    <?php
                    $type = AssignmentComments::ROOMS_PATH;
                    $roomsCommentsArray = AssignmentComments::getCommentArray($allComments, $type);
                    $roomsTree = Tree::createTree($roomsCommentsArray);
                    $typeBlock = 'rooms'
                    ?>
                    <?= $this->render('party/commentsRooms', [
                        'roomsTree' => $roomsTree,
                        'commentsModel' => $answer,
                        'updateAnswerModel' => $updateAnswerModel,
                        'params' => [
                            'pathId' => 'formTypeRooms',
                            'pathType' => $type,
                            'type' => $typeBlock,
                            'allComments' => $allComments,
                            'userId' => $userId,
                            'projectId' => $projectId,
                        ],
                    ]) ?>
                    <br>
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>
                <div id="<?= $typeBlock ?>" class="button accordionButton <?php if (!$roomsCommentsArray) {
                    echo 'hiddenInputs';
                } ?>">
                    <a class="a-link cancel">Комментарии (<?= count($roomsCommentsArray) ?>)</a>
                </div>

            </div>
            <hr>
        </section>
        <section class="section-reference">
            <h2>Предпочтения по детстким комнатам</h2>
            <?php $name = 'Child';
            $type = \app\models\Reference::TYPE_CHILD;
            ?>
            <div class="refWrap">
                <div class="references" id="referenceBlock<?= $name ?>">
                    <?= $this->render('/assignment/party/references', [

                        'references' => $referencesChild,
                    ]) ?>
                </div>


            </div>
            <div id="reference<?= $name ?>" class="hiddenInputs">
                <div class="custom">
                    <div class="formContainer1">
                        <span id="newReference<?= $name ?>"></span>
                        <form action="/customer/assignment/add-photo-ajax" method="post"
                              enctype="multipart/form-data"
                              id="form<?= $name ?>">
                            <label>Чтобы изменить изображение:</label>
                            <input type="file" name="image" id="image<?= $name ?>">
                            <input type="hidden" name="id" id="id" value="<?= $assignment->id ?>">
                            <input type="hidden" name="type" id="type" value="<?= $type ?>">
                        </form>
                    </div>
                    <span id="addComment<?= $name ?>">

                </span>
                </div>
            </div>

            <div class="button">
                <a id="showAdd<?= $name ?>Reference" class="a-link cancel">Добавить референс</a>
            </div>
            <div class="commentBlock accordion">
                <div class="accordionBlock hiddenInputs">
                    <?php
                    $type = AssignmentComments::CHILD_PATH;
                    $childCommentsArray = AssignmentComments::getCommentArray($allComments, $type);
                    $childTree = Tree::createTree($childCommentsArray);
                    $typeBlock = 'child'
                    ?>
                    <?= $this->render('party/commentsChild', [
                        'childTree' => $childTree,
                        'commentsModel' => $answer,
                        'updateAnswerModel' => $updateAnswerModel,
                        'params' => [
                            'pathId' => 'formTypeChild',
                            'pathType' => $type,
                            'type' => $typeBlock,
                            'allComments' => $allComments,
                            'userId' => $userId,
                            'projectId' => $projectId,
                        ],
                    ]) ?>
                    <br>
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>
                <div id="<?= $typeBlock ?>" class="button accordionButton <?php if (!$childCommentsArray) {
                    echo 'hiddenInputs';
                } ?>">
                    <a class="a-link cancel">Комментарии (<?= count($childCommentsArray) ?>)</a>
                </div>

            </div>
            <hr>
        </section>
        <section class="section-reference">
            <h2>Предпочтения по гостиной и прихожей</h2>
            <?php $name = 'Living';
            $type = \app\models\Reference::TYPE_LIVING;
            ?>
            <div class="refWrap">
                <div class="references" id="referenceBlock<?= $name ?>">
                    <?= $this->render('/assignment/party/references', [

                        'references' => $referencesLiving,
                    ]) ?>
                </div>


            </div>
            <div id="reference<?= $name ?>" class="hiddenInputs">
                <div class="custom">
                    <div class="formContainer1">
                        <span id="newReference<?= $name ?>"></span>
                        <form action="/customer/assignment/add-photo-ajax" method="post"
                              enctype="multipart/form-data"
                              id="form<?= $name ?>">
                            <label>Чтобы изменить изображение:</label>
                            <input type="file" name="image" id="image<?= $name ?>">
                            <input type="hidden" name="id" id="id" value="<?= $assignment->id ?>">
                            <input type="hidden" name="type" id="type" value="<?= $type ?>">
                        </form>
                    </div>
                    <span id="addComment<?= $name ?>">

                </span>
                </div>
            </div>

            <div class="button">
                <a id="showAdd<?= $name ?>Reference" class="a-link cancel">Добавить референс</a>
            </div>
            <div class="commentBlock accordion">
                <div class="accordionBlock hiddenInputs">
                    <?php
                    $type = AssignmentComments::LIVING_PATH;
                    $livingCommentsArray = AssignmentComments::getCommentArray($allComments, $type);
                    $livingTree = Tree::createTree($livingCommentsArray);
                    $typeBlock = 'living'
                    ?>
                    <?= $this->render('party/commentsLiving', [
                        'livingTree' => $livingTree,
                        'commentsModel' => $answer,
                        'updateAnswerModel' => $updateAnswerModel,
                        'params' => [
                            'pathId' => 'formTypeLiving',
                            'pathType' => $type,
                            'type' => $typeBlock,
                            'allComments' => $allComments,
                            'userId' => $userId,
                            'projectId' => $projectId,
                        ],
                    ]) ?>
                    <br>
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>
                <div id="<?= $typeBlock ?>" class="button accordionButton <?php if (!$livingCommentsArray) {
                    echo 'hiddenInputs';
                } ?>">
                    <a class="a-link cancel">Комментарии (<?= count($livingCommentsArray) ?>)</a>
                </div>

            </div>
            <hr>
        </section>
        <section class="section-reference">
            <h2>Предпочтения по дверям и окнам</h2>
            <?php $name = 'Door';
            $type = \app\models\Reference::TYPE_DOOR;
            ?>
            <div class="refWrap">
                <div class="references" id="referenceBlock<?= $name ?>">
                    <?= $this->render('/assignment/party/references', [

                        'references' => $referencesDoor,
                    ]) ?>
                </div>


            </div>
            <div id="reference<?= $name ?>" class="hiddenInputs">
                <div class="custom">
                    <div class="formContainer1">
                        <span id="newReference<?= $name ?>"></span>
                        <form action="/customer/assignment/add-photo-ajax" method="post"
                              enctype="multipart/form-data"
                              id="form<?= $name ?>">
                            <label>Чтобы изменить изображение:</label>
                            <input type="file" name="image" id="image<?= $name ?>">
                            <input type="hidden" name="id" id="id" value="<?= $assignment->id ?>">
                            <input type="hidden" name="type" id="type" value="<?= $type ?>">
                        </form>
                    </div>
                    <span id="addComment<?= $name ?>">

                </span>
                </div>
            </div>

            <div class="button">
                <a id="showAdd<?= $name ?>Reference" class="a-link cancel">Добавить референс</a>
            </div>
            <div class="commentBlock accordion">
                <div class="accordionBlock hiddenInputs">
                    <?php
                    $type = AssignmentComments::DOOR_PATH;
                    $doorCommentsArray = AssignmentComments::getCommentArray($allComments, $type);
                    $doorTree = Tree::createTree($doorCommentsArray);
                    $typeBlock = 'door'
                    ?>
                    <?= $this->render('party/commentsDoor', [
                        'doorTree' => $doorTree,
                        'commentsModel' => $answer,
                        'updateAnswerModel' => $updateAnswerModel,
                        'params' => [
                            'pathId' => 'formTypeDoor',
                            'pathType' => $type,
                            'type' => $typeBlock,
                            'allComments' => $allComments,
                            'userId' => $userId,
                            'projectId' => $projectId,
                        ],
                    ]) ?>
                    <br>
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>
                <div id="<?= $typeBlock ?>" class="button accordionButton <?php if (!$doorCommentsArray) {
                    echo 'hiddenInputs';
                } ?>">
                    <a class="a-link cancel">Комментарии (<?= count($doorCommentsArray) ?>)</a>
                </div>

            </div>
            <hr>
        </section>
        <section class="section-reference">
            <h2>Предпочтения по декору</h2>
            <?php $name = 'Decor';
            $type = \app\models\Reference::TYPE_DECOR;
            ?>
            <div class="refWrap">
                <div class="references" id="referenceBlock<?= $name ?>">
                    <?= $this->render('/assignment/party/references', [

                        'references' => $referencesDecor,
                    ]) ?>
                </div>


            </div>
            <div id="reference<?= $name ?>" class="hiddenInputs">
                <div class="custom">
                    <div class="formContainer1">
                        <span id="newReference<?= $name ?>"></span>
                        <form action="/customer/assignment/add-photo-ajax" method="post"
                              enctype="multipart/form-data"
                              id="form<?= $name ?>">
                            <label>Чтобы изменить изображение:</label>
                            <input type="file" name="image" id="image<?= $name ?>">
                            <input type="hidden" name="id" id="id" value="<?= $assignment->id ?>">
                            <input type="hidden" name="type" id="type" value="<?= $type ?>">
                        </form>
                    </div>
                    <span id="addComment<?= $name ?>">

                </span>
                </div>
            </div>

            <div class="button">
                <a id="showAdd<?= $name ?>Reference" class="a-link cancel">Добавить референс</a>
            </div>
            <div class="commentBlock accordion">
                <div class="accordionBlock hiddenInputs">
                    <?php
                    $type = AssignmentComments::DECOR_PATH;
                    $decorCommentsArray = AssignmentComments::getCommentArray($allComments, $type);
                    $decorTree = Tree::createTree($decorCommentsArray);
                    $typeBlock = 'decor'
                    ?>
                    <?= $this->render('party/commentsDecor', [
                        'decorTree' => $decorTree,
                        'commentsModel' => $answer,
                        'updateAnswerModel' => $updateAnswerModel,
                        'params' => [
                            'pathId' => 'formTypeDecor',
                            'pathType' => $type,
                            'type' => $typeBlock,
                            'allComments' => $allComments,
                            'userId' => $userId,
                            'projectId' => $projectId,
                        ],
                    ]) ?>
                    <br>
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>
                <div id="<?= $typeBlock ?>" class="button accordionButton <?php if (!$decorCommentsArray) {
                    echo 'hiddenInputs';
                } ?>">
                    <a class="a-link cancel">Комментарии (<?= count($decorCommentsArray) ?>)</a>
                </div>

            </div>

        </section>
    </div>
</div>
