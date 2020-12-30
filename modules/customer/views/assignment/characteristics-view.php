<?php
/**
 * @var $questions \app\models\Question
 * @var $question \app\models\Question
 * @var $model \app\models\forms\assignment\AddAnswerQuestions
 */

use yii\helpers\Url;

$this->registerJsFile('/files/js/assignment/addAnswerCharacteristic.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->title = 'Характеристика объекта';

?>


<div class="mainContent userPage">
    <div class="myContainer">
        <div class="top">
            <h2>Характеристика объекта</h2>
        </div>
        <div class="button">
            <a href="javascript:history.back()" class="a-link cancel">Назад</a>
        </div>

        <section class="questions">

            <?= $this->render('/assignment/party/one-characteristic', [
                'questions' => $questions,
                'model' => $model,
            ]); ?>

        </section>
        <div class="button">
            <a href="javascript:history.back()" class="a-link cancel">Назад</a>
        </div>
    </div>


</div>
