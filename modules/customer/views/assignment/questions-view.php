<?php
/**
 * @var $questions \app\models\Question
 * @var $question \app\models\Question
 * @var $model \app\models\forms\assignment\AddAnswerQuestions
 */

use yii\helpers\Url;

$this->registerJsFile('/files/js/assignment/addAnswer.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

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

        <section class="questions">

            <?= $this->render('/assignment/party/one-question', [
                'questions' => $questions,
                'model' => $model,
            ]); ?>

        </section>
        <div class="button">
            <a href="javascript:history.back()" class="a-link cancel">Назад</a>
        </div>
    </div>


</div>
