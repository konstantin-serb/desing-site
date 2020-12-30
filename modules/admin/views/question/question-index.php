<?php
/**
 * @var $questions \app\models\templates\QuestionsTemplates
 * @var $question \app\models\templates\QuestionsTemplates
 */

use yii\helpers\Url;

$this->title = 'Шаблоны анкет';
?>
<div class="mainContent clients">
    <div class="myContainer">
        <br>
        <div class="singleLink">
            <a href="<?= Url::to(['/admin/template']) ?>" class="a-link btn-gold">
                Все шаблоны
            </a>
        </div>
        <div class="top">
            <h2>Шаблоны анкет</h2>
        </div>

        <div class="singleLink">

            <br>
            <div class="button-add">
                <div class="button-admin">
                    <a class="a-link" href="<?=Url::to(['/admin/question/create-question-type'])?>">Добавить новый шаблон</a>
                </div>
            </div>
            <hr>
        </div>
        <h2>Созданные шаблоны анкет:</h2>
        <?php foreach ($questions as $question): ?>
            <div class="add-button">
                <a href="<?=Url::to(['questions-view', 'id' => $question->id])?>" class="a-link btn-gold">
                    <?= $question->title ?> (<?=$question->getCountItems()?>)
                </a>
            </div>
        <?php endforeach; ?>

    </div>
</div>
