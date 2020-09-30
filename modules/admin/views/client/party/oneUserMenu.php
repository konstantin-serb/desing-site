<?php
/**
 * @var $user \app\models\Clients
 */

use yii\helpers\Url; ?>

<div class="wrapMenu">
    <a href="javascript: history.back()" class="a-link">Вернуться назад</a>
    <a href="<?=Url::to(['/admin/client/update', 'id' => $user->id])?>" class="a-link">Редактировать</a>
    <a href="#" class="a-link">Добавить проект</a>
    <a href="#" class="a-link">Написать сообщение</a>
    <a href="#" class="a-link">Заблокировать</a>
    <a href="#" class="a-link">Удалить</a>
</div>

