<?php
/**
 * @var $characteristics \app\models\CharacteristicsTemplates
 * @var $characteristic \app\models\CharacteristicsTemplates
 */

use yii\helpers\Url;

$this->title = "Шаблоны характеристик";
?>

<div class="mainContent clients">
    <div class="myContainer">
        <br>
        <div class="singleLink">
            <a href="<?= Url::to(['/admin/template']) ?>" class="a-link btn-gold">
                Все шаблоны
            </a>
        <div class="top">
            <h2>Шаблоны характеристик</h2>
        </div>
        <br>
        <div class="singleLink">
            <div class="button-add">
                <div class="button-admin">
                    <a class="a-link" href="<?=Url::to(['/admin/question/create-characteristic-type'])?>">Добавить новый шаблон</a>
                </div>
            </div>
        </div>

        <hr>
    </div>
    <h2>Созданные шаблоны характеристик:</h2>
    <?php foreach ($characteristics as $characteristic): ?>
        <div class="add-button">
            <a href="<?=Url::to(['characteristic-view', 'id' => $characteristic->id])?>" class="a-link btn-gold">
                <?= $characteristic->title ?> (<?=$characteristic->getCountItems()?>)
            </a>
        </div>
    <?php endforeach; ?>

    </div>
</div>
