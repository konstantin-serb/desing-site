<?php
/** @var $this yii\web\View
 * @var $user \app\models\Clients
 *
 */

use yii\helpers\Url;

$this->title = 'Заказчики';
?>

<div class="mainContent">
    <section class="top">
        <div class="myContainer">
            <h2>Карточка заказчика</h2>
            <h5>-</h5>
            <hr>
        </div>
    </section>
    <section class="clients">
        <div class="myContainer">

            <div class="userMenu">
<!--                Меню юзера-->
                <?=$this->render('/client/party/oneUserMenu')?>
                <div class="usersWrap">

                    <div class="userItem">
                        <div class="head">

                            <div class="avatarPhoto">

                                <img src="/files/img/temporary/sm_full%20(13).jpg">

                            </div>

                            <div class="userName">
                                <p class="surname"><?=$user->surname?></p>

                            </div>
                        </div>
                        <div class="userInfo">
                            <p>id: <?=$user->id?></p>
                            <p>email: ivanov@gmail.com</p>
                            <p>Добавлен: <?=Yii::$app->formatter->asDatetime($user->created_at, 'long')?></p>
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

                </div>

            </div>
        </div>
    </section>
</div>