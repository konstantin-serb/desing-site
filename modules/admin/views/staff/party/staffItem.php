<?php
/**
 * @var $user \app\models\Employee
 */

use yii\helpers\Url;
?>

<div class="userItem">
    <div class="head">
        <div class="avatarPhoto">
            <a class="block-link" href="<?=Url::to(['/admin/staff/view',
                'id' => $user->id])?>">
            <img src="<?=$user->getImage()?>">
        </div>
        <div class="userName">
            <p class="surname"><?=$user->surname?></p>
            <p><?=$user->user_name?></p>
            <p><?=$user->last_name?></p>
        </div>
    </div>
    <div class="userInfo">
        <p>email: <?php if(!empty($user->user->email))
        {echo '<span class="status-success">'.$user->user->email . '</span>';
        } else {echo '<span class="status-warning">Не задан</span>';}?></p>
        <p>Дата регистрации: <?php if (!empty($user->user->created_at)) {
            echo '<span class="status-success">' . $user->user->created_at . '</span>';
            } else {echo '<span class="status-warning">Не зарегестрирован</span>';}?></p>
        <p><a href="#" class="a-link">Проектов: 3</a></p>
        <p><a href="#" class="a-link">Законченных проектов: 3</a></p>
        <p><a href="#" class="a-link">Проектов в работе: 1</a></p>
        <p><a href="#" class="a-link">Проектов на паузе: 0</a></p>
        <div class="user-button">
            <a class="a-link" href="#">Добавить проект</a>
        </div>
    </div>
    <div class="bottom">
        <p>Должность: <span class="status-normal"><?=$user->pos->position?></span></p>
    </div>
</div>
