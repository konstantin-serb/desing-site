<?php
/**
 * @var $updateAnswerModel \app\models\forms\comments\assignment\UpdateAnswerForm
 */

use app\components\DateHelper;
use app\models\User;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

$innerTree = $kitchenTree;

//dumper($params['allComments']);die;

function checkParentsKitchen($params, $id, $commentator_id)
{
    $all = $params['allComments'];
    $num = 0;
    foreach ($all as $key => $val) {
        if ($val->parents_id == $id) {
            $num++;
        }
    }



    if ($num == 0) {
        return true;
    } else {
        return false;
    }
}

?>




<?php if (!empty($innerTree)): ?>

    <div class="comments">
        <h2>Комментарии к разделу</h2>

        <?php

        function viewKitchen($innerTree, $commentsModel, $updateAnswerModel, $params)
        { ?>
            <ul class="comment-tree client">
                <?php foreach ($innerTree as $key => $value): ?>
                    <li>
                        <div class="one-comment <?php if ($value['commentator_id'] == Yii::$app->user->identity->getId()) {
                            echo 'my-comment';
                        } ?>">

                            <div class="top-comment">
                                <div class="commentTopWrap">
                                    <div class="avatar-comment">
                                        <img src="<?php echo User::getUserAvaForComment($value['commentator_id']) ?>">
                                    </div>
                                    <div class="autor-comment">

                                        <b><?= User::getUsernameForComment($value['commentator_id']) ?></b>&emsp;
                                        <?php if ($value['date_update'] == null || $value['date_update'] == ''): ?>
                                            <?= DateHelper::getDate($value['date_create']) . ' &emsp; ' .
                                            DateHelper::getTime($value['date_create']) ?>
                                        <?php else: ?>
                                            <?= 'Отредактировано: ' . DateHelper::getDate($value['date_update']) . ' &emsp; ' .
                                            DateHelper::getTime($value['date_update']) ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="closeBlock">
                                    <?php if (checkParentsKitchen($params, $value['id'], $value['commentator_id'])): ?>
                                        <?php if ($value['commentator_id'] === $params['userId']): ?>
                                            <a href="#" class="deleteButton" data-id="<?=$value['id']?>" data-type="<?=$params['type']?>" data-project="<?=$params['projectId']?>">&#10006;</a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="comment-text">

                                <?php if (($value['commentator_id'] == Yii::$app->user->identity->getId())): ?>
                                <?php Modal::begin([
                                    'size' => 'modal-lg',
                                    'header' => '<h2>Изменить комментарий</h2>',
                                    'toggleButton' => [
                                        'label' => '<p>' . $value['comment'] . '</p>',
                                        'tag' => 'a',
                                    ],
                                ]) ?>

                                <div class="formContainer1">
                                    <?php $form = ActiveForm::begin(['id' => 'update' . $params['pathId'] . $value['id']]);
                                    ?>

                                    <?php $updateAnswerModel->comment = $value['comment'];
                                    $updateAnswerModel->commentId = $value['id'];
                                    $updateAnswerModel->type = $params['type'] ?>
                                    <?= $form->field($updateAnswerModel, 'comment')->textarea(['rows' => 3])->label('Изменить') ?>
                                    <?= $form->field($updateAnswerModel, 'commentId')->hiddenInput()->label(false) ?>
                                    <?= $form->field($updateAnswerModel, 'type')->hiddenInput()->label(false) ?>

                                    <div class="button classic-button">
                                        <button class="a-link" type="submit">Изменить комментарий</button>
                                    </div>

                                    <?php ActiveForm::end() ?>
                                </div>

                                <?php Modal::end() ?>

                            </div>
                            <?php else: ?>
                                <?php Modal::begin([
                                    'size' => 'modal-lg',
                                    'header' => '<h2>Ответить на комментарий</h2>',
                                    'toggleButton' => [
                                        'label' => '<p>' . $value['comment'] . '</p>',
                                        'tag' => 'a',
                                    ],
                                ]) ?>
                                <div class="formContainer1">
                                    <?php $form = ActiveForm::begin(['id' => $params['pathId'] . $value['id']]);
                                    $commentsModel->parents_id = $value['id'];
                                    $commentsModel->pathType = $params['pathType'];
                                    $commentsModel->type = $params['type'];
                                    ?>
                                    <h4>Комментарий</h4>
                                    <p><?php echo $value['comment'] ?></p>

                                    <?= $form->field($commentsModel, 'comment')->textarea(['rows' => 3])->label('Ответить') ?>
                                    <?= $form->field($commentsModel, 'parents_id')->hiddenInput()->label(false) ?>
                                    <?= $form->field($commentsModel, 'pathType')->hiddenInput()->label(false) ?>
                                    <?= $form->field($commentsModel, 'type')->hiddenInput()->label(false) ?>

                                    <div class="button classic-button">
                                        <button class="a-link" type="submit">Добавить ответ</button>
                                    </div>

                                    <?php ActiveForm::end() ?>
                                </div>
                                <?php Modal::end(); ?>

                            <?php endif; ?>

                        </div>
                    </li>
                    <?php if (!empty($value['children'])): ?>
                        <li>
                            <?php viewKitchen($value['children'], $commentsModel, $updateAnswerModel, $params); ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php }

        viewKitchen($innerTree, $commentsModel, $updateAnswerModel, $params);
        ?>

    </div>
<?php endif; ?>