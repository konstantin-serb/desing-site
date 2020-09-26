<?php


use yii\helpers\Url; ?>

<div class="wrapMenu">
    <a href="<?=Url::to(['/admin/client'])?>" class="a-link">Все заказчики</a>
    <a href="<?=Url::to(['/admin/client/undeformeds'])?>" class="a-link">Недооформленные</a>
    <a href="#" class="a-link">Поиск по фамилии</a>
    <a href="#" class="a-link">В работе</a>
    <a href="#" class="a-link">Приостановленные</a>
    <a href="#" class="a-link">Завершенные</a>
</div>

