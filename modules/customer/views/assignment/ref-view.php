<?php
/**
 * @var $reference \app\models\Reference;
 * @var $model \app\models\forms\assignment\UpdateComment
 */

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

$this->title = 'Редактирование референса';

$this->registerJsFile('/files/js/assignment/updateReference.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/files/js/project/form.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/files/js/assignment/updatePhoto.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);


$model->referenceId = $reference->id;
$model->comment = $reference->description;
$model->sort = $reference->sort;
?>

<div class="mainContent userPage">
    <div class="button">
        <a href="javascript:history.back()" class="a-link cancel">Назад</a>
    </div>


    <div class="myContainer">

        <div class="referenceView">
            <span id="viewImage">
            <img src="<?=$reference->getFullImage()?>">
            </span>
            <p id="descriptionText"><?=\yii\helpers\Html::encode($reference->description)?></p>
        </div>
    </div>
    <div id="referenceView" class="hiddenInputs">
        <div class="custom">
            <div class="formContainer1">
                <span id="newReference"></span>
                <form action="/customer/assignment/update-photo-ajax" method="post" enctype="multipart/form-data"
                      id="form">
                    <label>Чтобы изменить изображение:</label>
                    <input type="file" name="image" id="image">
                    <input type="hidden" name="id" id="id" value="<?=$reference->id?>">
                </form>
            </div>
            <div class="formContainer1">
                <?php $form = ActiveForm::begin() ?>
                <?= $form->field($model, 'comment')->textInput() ?>
                <div class="minInputs">
                <?= $form->field($model, 'sort')->textInput() ?>
                </div>
                <?= $form->field($model, 'referenceId')->hiddenInput()->label(false) ?>

                <?php ActiveForm::end() ?>
            </div>
            <div class="button twoButton">
                <a id="updateReference" class="a-link " data-id="<?= $reference->id ?>">Изменить</a>
                <a id="hiddenCustomization" class="a-link cancel">Закрыть</a>
            </div>
            <span id="addComment"></span>
        </div>

    </div>
    <div id="buttonCustomization" class="button">
        <a id="showCustomization" class="a-link cancel">Изменить референс</a>
    </div>
    <div class="button">
        <a href="javascript:history.back()" class="a-link cancel">Назад</a>
    </div>
    <div class="button">
        <?php Modal::begin([
            'header' => '<h2>Удаление референса</h2>',
            'toggleButton' => [
                'label' => 'Удалить',
                'tag' => 'a',
                'class' => 'a-link del',
            ],
        ]);?>
        <h3>Вы уверены, что хотите удалить эту запись?</h3>
        <div class="referenceView">
            <span id="viewSpan">
            <img src="<?=$reference->getFullImage()?>">
            </span>
            <p id="modalText"><?=$reference->description?></p>
        </div>
        <hr>
        <?php ActiveForm::begin()?>
        <div class="button twoButton">
            <button id="" type="submit" class="a-link del" data-id="<?= $reference->id ?>">Удалить</button>
            <a id="" data-dismiss="modal" class="a-link cancel">Отмена</a>
        </div>
        <?php ActiveForm::end();?>

        <?php Modal::end();?>
    </div>
</div>
