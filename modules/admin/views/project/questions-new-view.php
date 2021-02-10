<?php
/**
 * @var $questions \app\models\Question
 * @var $question \app\models\Question
 */


$this->title = 'Анкета';

?>


<div class="mainContent userPage">
    <div class="myContainer">
        <div class="top">
            <h2>Анкета</h2>
        </div>
        <div class="button">
            <a href="javascript:history.back()" class="a-link cancel">Назад</a>
        </div>

        <div class="container-questions">
            <?php foreach ($questions as $question): ?>
                <hr>
                <div id="question-<?= $question->id ?>" class="oneQuestion">
                    <p class="question"><b><?= $question->question ?></b></p>
                    <?php if ($question->description): ?>
                        <p class="qustionsDescription"><?= '(' . $question->description . ')' ?></p>
                    <?php endif; ?>
                    <p class="answer"><b><?= $question->answer ?></b></p>
                    <p class="qustionsDescription"><span class="time" id="date-time-<?= $question->id ?>">
                    <?=$question->getDateTime()?>
                    </span></p>
                </div>
            <?php endforeach; ?>
        </div>
        <hr>
        <br>
        <div class="button">
            <a href="javascript:history.back()" class="a-link cancel">Назад</a>
        </div>


    </div>
</div>
