<?php

/**
 *
 */

use yii\helpers\Url;

?>

<div class="wrapMenu">
    <a href="<?=Url::to(['/admin/staff'])?>" class="a-link">Все сотрудники</a>
    <a href="<?=Url::to(['/admin/staff/unde-formeds'])?>" class="a-link">Недооформленные</a>
    <a href="#" class="a-link">Поиск по фамилии</a>
    <a href="#" class="a-link">В работе</a>
    <a href="#" class="a-link">Без работы</a>
    <a href="#" class="a-link">Уволенные</a>
</div>
