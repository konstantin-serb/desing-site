<?php
/**
 * @var $newQuestions \app\models\templates\OneQuestionTemplate
 * @var $question \app\models\templates\OneQuestionTemplate
 */

use yii\helpers\Url;
?>
<?php if($newQuestions):?>
    <h2>Вопросы:</h2>
<?php endif;?>
<div class="container-questions">
<?php foreach ($newQuestions as $question): ?>
    <hr>
<a href="<?=Url::to(['update-question', 'id' => $question->id])?>" class="a-link">
    <div id="question-<?= $question->id ?>" class="oneQuestion">

            <p class="question"><b><?= $question->question ?></b></p>
            <?php if($question->description):?>
            <p class="qustionsDescription"><?= '('. $question->description . ')' ?></p>
            <?php endif;?>
        </div>

</a>
<?php endforeach; ?>
</div>
