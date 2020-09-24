<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

<div class="mainContent">
    <div class="myContainer">
<div class="site-error">

    <h1>А вот и нет такой страницы! <br>(ошибка 404)</h1>
    <br>
    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Слудующий раз постарайтесь правильно вводить адрес.
    </p>
    <p>
        Извините за недопонимание. Спасибо за то, что обратились к нам!
    </p>

</div>

    </div></div>
