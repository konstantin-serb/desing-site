<?php
/** @var $this yii\web\View
 *@var $clients \app\models\Clients
 *@var $client \app\models\Clients
 */

use yii\helpers\Url;

$this->title = 'Админпанель | Пользователи';
?>

<div class="mainContent">
    <section class="top">
        <div class="myContainer">
            <h2>Управление пользователями</h2>
            <h5>Страница управления пользователями сайта</h5>
            <hr>
        </div>
    </section>
    <section class="clients">
        <div class="myContainer">
            <a class="a-link" href="<?=Url::to(['/admin/clients'])?>"><h2>Заказчики</h2></a>
            <div class="userMenu">
                <!--                Меню юзера-->
                <?=$this->render('/client/party/userMenu')?>
                <div class="usersWrap">
                    <?php foreach($clients as $client):?>
                    <?=$this->render('/client/party/userItem', [
                            'client' => $client,
                        ])?>
                    <?php endforeach;?>
                </div>
                <div class="button">
                    <a href="<?=Url::to(['/admin/clients'])?>" class="a-link">Все заказчики</a>
                    <br>
                </div>
                <hr>
            </div>
        </div>
    </section>

    <section class="staff">
        <div class="myContainer">
            <a href="<?=Url::to(['/admin/staff'])?>"><h2>Сотрудники</h2></a>
            <div class="userMenu">
                <?=$this->render('/staff/party/staffMenu')?>
                <div class="usersWrap">
                    <div class="userItem">
                        <div class="head">
                            <div class="avatarPhoto">
                                <img src="../files/img/temporary/sm_full%20(13).jpg">
                            </div>
                            <div class="userName">
                                <p class="surname">Иванов</p>
                                <p>Иван</p>
                                <p>Иванович</p>
                            </div>
                        </div>
                        <div class="userInfo">
                            <p>email: ivanov@gmail.com</p>
                            <p>Дата регистрации: 21 июля 2020г.</p>
                            <p><a href="#" class="a-link">Проектов: 3</a></p>
                            <p><a href="#" class="a-link">Законченных проектов: 3</a></p>
                            <p><a href="#" class="a-link">Проектов в работе: 1</a></p>
                            <p><a href="#" class="a-link">Проектов на паузе: 0</a></p>
                            <div class="user-button">
                                <a class="a-link" href="#">Добавить проект</a>
                            </div>
                        </div>
                        <div class="bottom">
                            <p>Должность: <span class="status-normal">Дизайнер</span></p>
                        </div>
                    </div>
                    <div class="userItem">
                        <div class="head">
                            <div class="avatarPhoto">
                                <img src="../files/img/temporary/sm_full%20(13).jpg">
                            </div>
                            <div class="userName">
                                <p class="surname">Иванов</p>
                                <p>Иван</p>
                                <p>Иванович</p>
                            </div>
                        </div>
                        <div class="userInfo">
                            <p>email: ivanov@gmail.com</p>
                            <p>Дата регистрации: 21 июля 2020г.</p>
                            <p><a href="#" class="a-link">Проектов: 3</a></p>
                            <p><a href="#" class="a-link">Законченных проектов: 3</a></p>
                            <p><a href="#" class="a-link">Проектов в работе: 1</a></p>
                            <p><a href="#" class="a-link">Проектов на паузе: 0</a></p>
                            <div class="user-button">
                                <a class="a-link" href="#">Добавить проект</a>
                            </div>
                        </div>
                        <div class="bottom">
                            <p>Должность: <span class="status-normal">Рендерщик</span></p>
                        </div>
                    </div>
                    <div class="userItem">
                        <div class="head">
                            <div class="avatarPhoto">
                                <img src="../files/img/temporary/sm_full%20(13).jpg">
                            </div>
                            <div class="userName">
                                <p class="surname">Иванов</p>
                                <p>Иван</p>
                                <p>Иванович</p>
                            </div>
                        </div>
                        <div class="userInfo">
                            <p>email: ivanov@gmail.com</p>
                            <p>Дата регистрации: 21 июля 2020г.</p>
                            <p><a href="#" class="a-link">Проектов: 3</a></p>
                            <p><a href="#" class="a-link">Законченных проектов: 3</a></p>
                            <p><a href="#" class="a-link">Проектов в работе: 1</a></p>
                            <p><a href="#" class="a-link">Проектов на паузе: 0</a></p>
                            <div class="user-button">
                                <a class="a-link" href="#">Добавить проект</a>
                            </div>
                        </div>
                        <div class="bottom">
                            <p>Должность: <span class="status-normal">Дизайнер</span></p>
                        </div>
                    </div>
                    <div class="userItem">
                        <div class="head">
                            <div class="avatarPhoto">
                                <img src="../files/img/temporary/sm_full%20(13).jpg">
                            </div>
                            <div class="userName">
                                <p class="surname">Иванов</p>
                                <p>Иван</p>
                                <p>Иванович</p>
                            </div>
                        </div>
                        <div class="userInfo">
                            <p>email: ivanov@gmail.com</p>
                            <p>Дата регистрации: 21 июля 2020г.</p>
                            <p><a href="#" class="a-link">Проектов: 3</a></p>
                            <p><a href="#" class="a-link">Законченных проектов: 3</a></p>
                            <p><a href="#" class="a-link">Проектов в работе: 1</a></p>
                            <p><a href="#" class="a-link">Проектов на паузе: 0</a></p>
                            <div class="user-button">
                                <a class="a-link" href="#">Добавить проект</a>
                            </div>
                        </div>
                        <div class="bottom">
                            <p>Должность: <span class="status-normal">Дизайнер</span></p>
                        </div>
                    </div>
                </div>
                <div class="button">
                    <a href="<?=Url::to(['/admin/staff'])?>" class="a-link">Все сотрудники</a>
                </div>
                <br>

            </div>
        </div>
    </section>


</div>