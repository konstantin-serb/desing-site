<?php
/**
 * @var $contracts \app\models\Contracts;
 * @var $contract \app\models\Contracts;
 * @var $updateContract \app\models\forms\project\UpdateContractForm
 */

use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>

<?php if ($contracts): ?>
    <div class="contractView contractCompact">
        <?php foreach ($contracts as $contract): ?>
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
        <div class="bottom-2">
            <div class="doubleLink">
                <a class="a-link btn-gold" href="<?=Url::to(['/admin/project/update-contract', 'id'=>$contract->id])?>">Изменить</a>
                <a class="a-link btn-orange" href="<?=Url::to(['/admin/project/view-contract', 'id'=>$contract->id])?>">Открыть</a>
                <a class="a-link btn-del" href="<?=Url::to(['/admin/project/delete-contract', 'id' => $contract->id])?>">Удалить</a>
            </div>
        </div>
            <br>
            <hr>

        <?php endforeach; ?>
    </div>
<?php endif; ?>
