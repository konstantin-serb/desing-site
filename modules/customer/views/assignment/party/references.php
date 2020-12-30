<?php
/**
 * @var $references \app\models\Reference
 * @var $oneReference \app\models\Reference
 */

use yii\helpers\Url;
use yii\helpers\Html;

?>

<?php foreach ($references as $oneReference):?>

<div class="oneReference">
    <a href="<?=Url::to(['/customer/assignment/reference-view', 'id' => $oneReference->id])?>" class="block-link">
    <div class="image">
        <img src="<?=$oneReference->getImage()?>">
    </div>
    <p><?=Html::encode($oneReference->description)?></p>
    </a>
</div>
<?php endforeach;?>






