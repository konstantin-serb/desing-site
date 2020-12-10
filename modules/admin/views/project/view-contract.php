<?php
/**
 * @var $contract \app\models\Contracts

 */

use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

$this->title = $contract->title;

?>



<div class="mainContent">
    <div class="myContainer">
<br>

        <h2>Договор:</h2>
        <h3><?=$contract->title?></h3>


        <div class="doubleLink">
            <a class="a-link btn-gold" href="<?=Url::to(['/admin/project/update-contract', 'id'=>$contract->id])?>">Изменить</a>
            <a class="a-link btn-del" href="<?=Url::to(['/admin/project/delete-contract', 'id' => $contract->id])?>">Удалить</a>
            <a href="javascript: history.back();" class="a-link btn-default">Назад</a>
        </div>


        <br>
        <div class="contractView">
            <?= $contract->generateText(); ?>
            <div class="doubleColumn">
                <div class="leftAlign">
                    <?= $contract->executor_info ?>
                </div>
                <div class="rightAlign">
                    <?= $contract->customer_info ?>
                </div>
            </div>
            <br>

            <br>

    </div>
        <div class="doubleLink">
            <a class="a-link btn-gold" href="<?=Url::to(['/admin/project/update-contract', 'id'=>$contract->id])?>">Изменить</a>
            <a class="a-link btn-del" href="<?=Url::to(['/admin/project/delete-contract', 'id' => $contract->id])?>">Удалить</a>
            <a href="javascript: history.back();" class="a-link btn-default">Назад</a>
        </div>
</div>


