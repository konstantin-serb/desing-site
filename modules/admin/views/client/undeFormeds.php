<?php
/** @var $this yii\web\View
 * @var $undeformeds \app\models\Clients
 * @var $undeformed \app\models\Clients
 */

use yii\helpers\Url;

$this->title = 'Заказчики';
?>

<div class="mainContent">
    <section class="top">
        <div class="myContainer">
            <h2>Недооформленные заказчики</h2>
            <h5>Заказчики, которые не прошли регистрацию до конца</h5>
            <hr>
        </div>
    </section>
    <section class="clients">
        <div class="myContainer">
            <div class="add-button">
                <a class="a-link" href="<?=Url::to(['/admin/client/create'])?>">Добавить нового заказчика</a>
            </div>
            <div class="userMenu">
<!--                Меню юзера-->
                <?=$this->render('/client/party/userMenu')?>
                <div class="usersWrap">
                    <?php foreach($undeformeds as $undeformed):?>
                    <div class="userItem">
                        <div class="head">

                            <div class="avatarPhoto">
                                <a class="a-link" href="<?=Url::to(['/admin/client/view', 'id' => $undeformed->id])?>">
                                <img src="/files/img/temporary/sm_full%20(13).jpg">
                                </a>
                            </div>

                            <div class="userName">
                                <p class="surname"><?=$undeformed->surname?></p>
                                <p><?=$undeformed->user_name?></p>
                                <p><?=$undeformed->last_name?></p>
                            </div>
                        </div>
                        <div class="userInfo">
                            <p>id: <?=$undeformed->id?></p>
                            <p>email: ivanov@gmail.com</p>
                            <p>Добавлен: <?=Yii::$app->formatter->asDatetime($undeformed->created_at, 'long')?></p>
                            <p><a href="#" class="a-link">Проектов: 3</a></p>
                            <p><a href="#" class="a-link">Законченных проектов: 3</a></p>
                            <p><a href="#" class="a-link">Проектов в работе: 1</a></p>
                            <p><a href="#" class="a-link">Проектов на паузе: 0</a></p>
                            <div class="user-button">
                                <a class="a-link" href="#">Добавить проект</a>
                            </div>
                        </div>
                        <div class="bottom">
                            <p>Статус: <span class="status-warning">Недооформленный</span></p>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>

            </div>
        </div>
    </section>
</div>