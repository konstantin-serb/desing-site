<?php

/**
 * @var $client \app\models\Clients;
 */

use yii\helpers\Url;

?>

<div class="userItem">
    <div class="head">
        <div class="avatarPhoto">
            <a href="<?=Url::to(['/admin/client/view', 'id' => $client->id])?>" class="block-link">
                <img src="<?=$client->getImage()?>">
            </a>
        </div>
        <div class="userName">
            <p class="surname"><?= $client->surname ?></p>
            <p><?= $client->user_name ?></p>
            <p><?= $client->last_name ?></p>
        </div>
    </div>
    <div class="userInfo">
        <p>email: <span <?= $client->getCssStyle() ?>>
            <?php if ($client->status == $client::STATUS_UNDEREGISTERED) {
                echo 'Не задан';
            } else {
                echo $client->user->email;
            }
            ?></span></p>
        <p>Дата регистрации: <span <?= $client->getCssStyle() ?>><?php if ($client->register_date) {
                    echo Yii::$app->formatter
                        ->asDatetime($client->register_date);
                } else {
                    echo 'Не зарегестрирован';
                } ?></span></p>
        <p><a href="#" class="a-link">Проектов: 3</a></p>
        <p><a href="#" class="a-link">Законченных проектов: 3</a></p>
        <p><a href="#" class="a-link">Проектов в работе: 1</a></p>
        <p><a href="#" class="a-link">Проектов на паузе: 0</a></p>
        <div class="user-button">
            <a class="a-link" href="#">Добавить проект</a>
        </div>
    </div>
    <div class="bottom">
        <p>Статус: <span <?= $client->getCssStyle() ?>>
                                    <?= $client->getStatus() ?></span></p>
    </div>
</div>
