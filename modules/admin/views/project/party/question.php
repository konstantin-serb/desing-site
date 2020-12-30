<?php
/**
 * @var $questions \app\models\Characteristic
 * @var $question \app\models\Characteristic
 */

?>

<?php use yii\helpers\Url;

if ($questions): ?>
    <h2>Вопросы:</h2>
<?php endif; ?>
<div class="container-questions">

    <?php foreach ($questions as $question):?>
        <hr>

        <div id="question-<?= $question->id ?>" class="oneQuestion <?php
        if($question->status == \app\models\Question::NO_EDITED) {
            echo 'no-edited';
        }
        ?>">
            <?php if($question->status == \app\models\Question::EDITED):?>
            <a href="<?= Url::to(['update-question', 'id' => $question->id]) ?>" class="a-link">
                <?php endif;?>
                <p class="question"><b><?= $question->question ?></b></p>
                <?php if ($question->description): ?>
                    <p class="qustionsDescription"><?= '(' . $question->description . ')' ?></p>
                <?php endif; ?>
                <?php if($question->status == \app\models\Question::EDITED):?>
            </a>
        <?php endif;?>


        </div>


    <?php endforeach; ?>
