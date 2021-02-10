<?php
/**
 * @var $reference \app\models\Reference;
 * @var $model \app\models\forms\assignment\UpdateComment
 */


$this->title = 'Просмотр референса';

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

    <div class="button">
        <a href="javascript:history.back()" class="a-link cancel">Назад</a>
    </div>
</div>
