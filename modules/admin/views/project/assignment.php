<?php

/**
 * @var $commentModel \app\models\forms\comments\assignment\AddCommentForm
 * @var $allComments \app\models\AssignmentComments
 */

use app\components\Tree;
use app\models\AssignmentComments;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\DateHelper;

$this->title = 'Техническое задание на проектирование';

$this->registerJsFile('/files/js/comments/accordion.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);
$this->registerJsFile('/files/js/comments/deleteComment.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);
?>


<div class="mainContent adminPage">
    <div class="myContainer">
        <br>
        <div class="singleLink">
            <a href="javascript:history.back()" class="a-link btn-default">Назад</a>
        </div>
        <div class="top">
            <h2>Техническое задание на проектирование</h2>
        </div>
        <div class="frame contentFrame">
            <div class="mainAssignmentWrap">
                <h2>Основные сведения об объекте</h2>
                <p>Адрес объекта: <?= Html::encode($assignment->address) ?></p>
                <p>Техническое задание создал: <?= Html::encode($assignment->customer) ?></p>
                <p>Краткое описание: <?= Html::encode($assignment->description) ?></p>
            </div>
        </div>


    </div>

    <div class="myContainer">

        <section id="mainReference">
            <h2>Предпочтения по общему стилю:</h2>
            <div class="refWrap">
                <div class="references" id="referenceBlock">
                    <?= $this->render('/project/party/references', [
                        'references' => $referencesGeneral,
                    ]) ?>
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
                        <div class="buttonGroup1">
                            <div class="modalDoubleButton">
                                <button id="hiddenCommentForm" type="button"
                                        class="cancelAccordionButton close-my btn btn-default">
                                    Скрыть комментарии
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="<?=$typeBlock?>" class="button accordionButton <?php if(!$globalCommentsArray){echo 'hiddenInputs';}?>">
                        <a class="a-link cancel">Комментарии (<?=count($globalCommentsArray)?>)</a>
                    </div>

                </div>
                <div class="accordion">
                    <div id="commentGeneral" class="accordionBlock hiddenInputs">

                        <div class="custom">

                            <div class="formContainer1">
                                <?php $form = ActiveForm::begin(['id' => 'formType' . 1]);
                                $commentModel->pathType = 1;
                                $commentModel->type = $typeBlock;
                                ?>
                                <?= $form->field($commentModel, 'comment')->textarea(['rows' => 3])->label('Добавить комментарий') ?>
                                <?= $form->field($commentModel, 'pathType')->label(false)->hiddenInput() ?>
                                <?= $form->field($commentModel, 'type')->label(false)->hiddenInput() ?>

                                <div class="button classic-button">
                                    <button class="a-link cancel" type="submit">Добавить комментарий</button>
                                </div>
                                <?php ActiveForm::end() ?>
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

                    <div class="button accordionButton">
                        <a id="showAddComment" class="a-link cancel">Добавить комментарий</a>
                    </div>
                </div>

            </div>

            <hr>
        </section>
    </div>
    <section id="questions" class="dark-section">
        <div class="myContainer">
            <h2>Анкетные данные. Характеристики объекта</h2>


            <div class="button">
                <a href="<?= Url::to(['questions-new-view', 'id' => $assignment->id]) ?>"
                   class="a-link cancel">Посмотреть ответы анкеты</a>
            </div>

            <div class="button">
                <a href="<?= Url::to(['characteristics-new-view', 'id' => $assignment->id]) ?>"
                   class="a-link cancel">Посмотреть характеристики</a>
            </div>
        </div>
    </section>

    <div class="myContainer">
        <hr>
        <section class="section-reference">
            <h2>Предопочтения по стенам и перегородкам</h2>
            <div class="refWrap">
                <div class="references" id="referenceBlockWall">
                    <?= $this->render('/project/party/references', [
                        'references' => $referencesWall,
                    ]) ?>
                </div>
                <div class="commentBlock accordion">
                    <div class="accordionBlock hiddenInputs">
                        <?php
                        $type = AssignmentComments::WALL_PATH;
                        $wallCommentsArray = AssignmentComments::getCommentArray($allComments, $type);
                        $wallTree = Tree::createTree($wallCommentsArray);
                        $typeBlock = 'walls'
                        ?>
                        <?= $this->render('party/commentsWall', [
                            'wallTree' => $wallTree,
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
                        <div class="buttonGroup1">
                            <div class="modalDoubleButton">
                                <button id="hiddenCommentForm" type="button"
                                        class="cancelAccordionButton close-my btn btn-default">
                                    Скрыть комментарии
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="<?=$typeBlock?>" class="button accordionButton <?php if(!$wallCommentsArray){echo 'hiddenInputs';}?>">
                        <a class="a-link cancel">Комментарии (<?=count($wallCommentsArray)?>)</a>
                    </div>

                </div>
                <div class="accordion">
                    <div id="commentGeneral" class="accordionBlock hiddenInputs">

                        <div class="custom">

                            <div class="formContainer1">
                                <?php $form = ActiveForm::begin(['id' => 'formType' . $type]);
                                $commentModel->pathType = $type;
                                $commentModel->type = $typeBlock;
                                ?>
                                <?= $form->field($commentModel, 'comment')->textarea(['rows' => 3])->label('Добавить комментарий') ?>
                                <?= $form->field($commentModel, 'pathType')->label(false)->hiddenInput() ?>
                                <?= $form->field($commentModel, 'type')->label(false)->hiddenInput() ?>

                                <div class="button classic-button">
                                    <button class="a-link cancel" type="submit">Добавить комментарий</button>
                                </div>
                                <?php ActiveForm::end() ?>
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

                    <div class="button accordionButton">
                        <a id="showAddComment" class="a-link cancel">Добавить комментарий</a>
                    </div>
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




        </section>

        <hr>
        <section class="section-reference">
            <h2>Предпочтения по полам и потолкам</h2>
            <div class="refWrap">
                <div class="references" id="referenceBlockFloor">
                    <?= $this->render('/project/party/references', [
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
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>

                <div id="<?=$typeBlock?>" class="button accordionButton <?php if(!$floorCommentsArray){echo 'hiddenInputs';}?>">
                    <a class="a-link cancel">Комментарии (<?=count($floorCommentsArray)?>)</a>
                </div>

            </div>
            <div class="accordion">
                <div id="commentGeneral" class="accordionBlock hiddenInputs">

                    <div class="custom">

                        <div class="formContainer1">
                            <?php $form = ActiveForm::begin(['id' => 'formType' . $type]);
                            $commentModel->pathType = $type;
                            $commentModel->type = $typeBlock;
                            ?>
                            <?= $form->field($commentModel, 'comment')->textarea(['rows' => 3])->label('Добавить комментарий') ?>
                            <?= $form->field($commentModel, 'pathType')->label(false)->hiddenInput() ?>
                            <?= $form->field($commentModel, 'type')->label(false)->hiddenInput() ?>

                            <div class="button classic-button">
                                <button class="a-link cancel" type="submit">Добавить комментарий</button>
                            </div>
                            <?php ActiveForm::end() ?>
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

                <div class="button accordionButton">
                    <a id="showAddComment" class="a-link cancel">Добавить комментарий</a>
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
                    <?= $this->render('/project/party/references', [

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
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>

                <div id="<?=$typeBlock?>" class="button accordionButton <?php if(!$furnitureCommentsArray){echo 'hiddenInputs';}?>">
                    <a class="a-link cancel">Комментарии (<?=count($furnitureCommentsArray)?>)</a>
                </div>

            </div>
            <div class="accordion">
                <div id="commentGeneral" class="accordionBlock hiddenInputs">

                    <div class="custom">

                        <div class="formContainer1">
                            <?php $form = ActiveForm::begin(['id' => 'formType' . $type]);
                            $commentModel->pathType = $type;
                            $commentModel->type = $typeBlock;
                            ?>
                            <?= $form->field($commentModel, 'comment')->textarea(['rows' => 3])->label('Добавить комментарий') ?>
                            <?= $form->field($commentModel, 'pathType')->label(false)->hiddenInput() ?>
                            <?= $form->field($commentModel, 'type')->label(false)->hiddenInput() ?>

                            <div class="button classic-button">
                                <button class="a-link cancel" type="submit">Добавить комментарий</button>
                            </div>
                            <?php ActiveForm::end() ?>
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

                <div class="button accordionButton">
                    <a id="showAddComment" class="a-link cancel">Добавить комментарий</a>
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
                    <?= $this->render('/project/party/references', [

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
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>

                <div id="<?=$typeBlock?>" class="button accordionButton <?php if(!$kitchenCommentsArray){echo 'hiddenInputs';}?>">
                    <a class="a-link cancel">Комментарии (<?=count($kitchenCommentsArray)?>)</a>
                </div>


            <div class="accordion">
                <div id="commentGeneral" class="accordionBlock hiddenInputs">

                    <div class="custom">

                        <div class="formContainer1">
                            <?php $form = ActiveForm::begin(['id' => 'formType' . $type]);
                            $commentModel->pathType = $type;
                            $commentModel->type = $typeBlock;
                            ?>
                            <?= $form->field($commentModel, 'comment')->textarea(['rows' => 3])->label('Добавить комментарий') ?>
                            <?= $form->field($commentModel, 'pathType')->label(false)->hiddenInput() ?>
                            <?= $form->field($commentModel, 'type')->label(false)->hiddenInput() ?>

                            <div class="button classic-button">
                                <button class="a-link cancel" type="submit">Добавить комментарий</button>
                            </div>
                            <?php ActiveForm::end() ?>
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

                <div class="button accordionButton">
                    <a id="showAddComment" class="a-link cancel">Добавить комментарий</a>
                </div>
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
                    <?= $this->render('/project/party/references', [

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
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>

                <div id="<?=$typeBlock?>" class="button accordionButton <?php if(!$bathroomCommentsArray){echo 'hiddenInputs';}?>">
                    <a class="a-link cancel">Комментарии (<?=count($bathroomCommentsArray)?>)</a>
                </div>

            </div>
            <div class="accordion">
                <div id="commentGeneral" class="accordionBlock hiddenInputs">

                    <div class="custom">

                        <div class="formContainer1">
                            <?php $form = ActiveForm::begin(['id' => 'formType' . $type]);
                            $commentModel->pathType = $type;
                            $commentModel->type = $typeBlock;
                            ?>
                            <?= $form->field($commentModel, 'comment')->textarea(['rows' => 3])->label('Добавить комментарий') ?>
                            <?= $form->field($commentModel, 'pathType')->label(false)->hiddenInput() ?>
                            <?= $form->field($commentModel, 'type')->label(false)->hiddenInput() ?>

                            <div class="button classic-button">
                                <button class="a-link cancel" type="submit">Добавить комментарий</button>
                            </div>
                            <?php ActiveForm::end() ?>
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

                <div class="button accordionButton">
                    <a id="showAddComment" class="a-link cancel">Добавить комментарий</a>
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
                    <?= $this->render('/project/party/references', [

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
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>

                <div id="<?=$typeBlock?>" class="button accordionButton <?php if(!$roomsCommentsArray){echo 'hiddenInputs';}?>">
                    <a class="a-link cancel">Комментарии (<?=count($roomsCommentsArray)?>)</a>
                </div>

            </div>
            <div class="accordion">
                <div id="commentGeneral" class="accordionBlock hiddenInputs">

                    <div class="custom">

                        <div class="formContainer1">
                            <?php $form = ActiveForm::begin(['id' => 'formType' . $type]);
                            $commentModel->pathType = $type;
                            $commentModel->type = $typeBlock;
                            ?>
                            <?= $form->field($commentModel, 'comment')->textarea(['rows' => 3])->label('Добавить комментарий') ?>
                            <?= $form->field($commentModel, 'pathType')->label(false)->hiddenInput() ?>
                            <?= $form->field($commentModel, 'type')->label(false)->hiddenInput() ?>

                            <div class="button classic-button">
                                <button class="a-link cancel" type="submit">Добавить комментарий</button>
                            </div>
                            <?php ActiveForm::end() ?>
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

                <div class="button accordionButton">
                    <a id="showAddComment" class="a-link cancel">Добавить комментарий</a>
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
                    <?= $this->render('/project/party/references', [

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
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>

                <div id="<?=$typeBlock?>" class="button accordionButton <?php if(!$childCommentsArray){echo 'hiddenInputs';}?>">
                    <a class="a-link cancel">Комментарии (<?=count($childCommentsArray)?>)</a>
                </div>

            </div>
            <div class="accordion">
                <div id="commentGeneral" class="accordionBlock hiddenInputs">

                    <div class="custom">

                        <div class="formContainer1">
                            <?php $form = ActiveForm::begin(['id' => 'formType' . $type]);
                            $commentModel->pathType = $type;
                            $commentModel->type = $typeBlock;
                            ?>
                            <?= $form->field($commentModel, 'comment')->textarea(['rows' => 3])->label('Добавить комментарий') ?>
                            <?= $form->field($commentModel, 'pathType')->label(false)->hiddenInput() ?>
                            <?= $form->field($commentModel, 'type')->label(false)->hiddenInput() ?>

                            <div class="button classic-button">
                                <button class="a-link cancel" type="submit">Добавить комментарий</button>
                            </div>
                            <?php ActiveForm::end() ?>
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

                <div class="button accordionButton">
                    <a id="showAddComment" class="a-link cancel">Добавить комментарий</a>
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
                    <?= $this->render('/project/party/references', [

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
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>

                <div id="<?=$typeBlock?>" class="button accordionButton <?php if(!$livingCommentsArray){echo 'hiddenInputs';}?>">
                    <a class="a-link cancel">Комментарии (<?=count($livingCommentsArray)?>)</a>
                </div>

            </div>
            <div class="accordion">
                <div id="commentGeneral" class="accordionBlock hiddenInputs">

                    <div class="custom">

                        <div class="formContainer1">
                            <?php $form = ActiveForm::begin(['id' => 'formType' . $type]);
                            $commentModel->pathType = $type;
                            $commentModel->type = $typeBlock;
                            ?>
                            <?= $form->field($commentModel, 'comment')->textarea(['rows' => 3])->label('Добавить комментарий') ?>
                            <?= $form->field($commentModel, 'pathType')->label(false)->hiddenInput() ?>
                            <?= $form->field($commentModel, 'type')->label(false)->hiddenInput() ?>

                            <div class="button classic-button">
                                <button class="a-link cancel" type="submit">Добавить комментарий</button>
                            </div>
                            <?php ActiveForm::end() ?>
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

                <div class="button accordionButton">
                    <a id="showAddComment" class="a-link cancel">Добавить комментарий</a>
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
                    <?= $this->render('/project/party/references', [

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
                            'pathId' => 'formTypeLDoor',
                            'pathType' => $type,
                            'type' => $typeBlock,
                            'allComments' => $allComments,
                            'userId' => $userId,
                            'projectId' => $projectId,
                        ],
                    ]) ?>
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>

                <div id="<?=$typeBlock?>" class="button accordionButton <?php if(!$doorCommentsArray){echo 'hiddenInputs';}?>">
                    <a class="a-link cancel">Комментарии (<?=count($doorCommentsArray)?>)</a>
                </div>

            </div>
            <div class="accordion">
                <div id="commentGeneral" class="accordionBlock hiddenInputs">

                    <div class="custom">

                        <div class="formContainer1">
                            <?php $form = ActiveForm::begin(['id' => 'formType' . $type]);
                            $commentModel->pathType = $type;
                            $commentModel->type = $typeBlock;
                            ?>
                            <?= $form->field($commentModel, 'comment')->textarea(['rows' => 3])->label('Добавить комментарий') ?>
                            <?= $form->field($commentModel, 'pathType')->label(false)->hiddenInput() ?>
                            <?= $form->field($commentModel, 'type')->label(false)->hiddenInput() ?>

                            <div class="button classic-button">
                                <button class="a-link cancel" type="submit">Добавить комментарий</button>
                            </div>
                            <?php ActiveForm::end() ?>
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

                <div class="button accordionButton">
                    <a id="showAddComment" class="a-link cancel">Добавить комментарий</a>
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
                    <?= $this->render('/project/party/references', [

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
                    <div class="buttonGroup1">
                        <div class="modalDoubleButton">
                            <button id="hiddenCommentForm" type="button"
                                    class="cancelAccordionButton close-my btn btn-default">
                                Скрыть комментарии
                            </button>
                        </div>
                    </div>
                </div>

                <div id="<?=$typeBlock?>" class="button accordionButton <?php if(!$decorCommentsArray){echo 'hiddenInputs';}?>">
                    <a class="a-link cancel">Комментарии (<?=count($decorCommentsArray)?>)</a>
                </div>

            </div>
            <div class="accordion">
                <div id="commentGeneral" class="accordionBlock hiddenInputs">

                    <div class="custom">

                        <div class="formContainer1">
                            <?php $form = ActiveForm::begin(['id' => 'formType' . $type]);
                            $commentModel->pathType = $type;
                            $commentModel->type = $typeBlock;
                            ?>
                            <?= $form->field($commentModel, 'comment')->textarea(['rows' => 3])->label('Добавить комментарий') ?>
                            <?= $form->field($commentModel, 'pathType')->label(false)->hiddenInput() ?>
                            <?= $form->field($commentModel, 'type')->label(false)->hiddenInput() ?>

                            <div class="button classic-button">
                                <button class="a-link cancel" type="submit">Добавить комментарий</button>
                            </div>
                            <?php ActiveForm::end() ?>
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

                <div class="button accordionButton">
                    <a id="showAddComment" class="a-link cancel">Добавить комментарий</a>
                </div>
            </div>

        </section>
    </div>
</div>
