<?php

/**

 * @var $contract \app\models\Contracts
 */

use yii\widgets\ActiveForm;

$this->title = 'Удаление договора';

?>

<div class="mainContent adminPage">
    <div class="myContainer">
        <h2>Удаление договора:</h2>

        <div class="singleLink">
            <a href="javascript: history.back()" class="a-link btn-default">Отмена</a>
        </div>

        <div class="delete-block">
            <?php $form = ActiveForm::begin()?>
            <h3>Вы действительно хотите удалить договор:</h3>
            <h3><span class="del-red"><?=$contract->title?></span></h3>
            <br>
            <div class="modalDoubleButton">

                <button id="updateName" type="submit" class="btn btn-red">Удалить
                </button>
                <a href="javascript:history.back()" class="a-link btn-default btn">Отмена</a>
            </div>
            <?php ActiveForm::end();?>
        </div>

</div>
