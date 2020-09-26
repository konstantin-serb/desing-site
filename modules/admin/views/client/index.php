<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Заказчики';
?>

<div class="mainContent">
    <section class="top">
        <div class="myContainer">
            <h2>Заказчики</h2>
            <h5>Страница управления заказчиками</h5>
            <hr>
        </div>
    </section>
    <section class="clients">
        <div class="myContainer">
            <div class="add-button">
                <a class="a-link" href="<?=Url::to(['/admin/client/create'])?>">Добавить нового заказчика</a>
            </div>
            <div class="userMenu">
                <?=$this->render('/client/party/userMenu')?>
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
                            <p>Статус: <span class="status-info">Клиент</span></p>
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
                            <p>Статус: <span class="status-info">Клиент</span></p>
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
                            <p>Статус: <span class="status-info">Клиент</span></p>
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
                            <p>Статус: <span class="status-info">Клиент</span></p>
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
                            <p>Статус: <span class="status-info">Клиент</span></p>
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
                            <p>Статус: <span class="status-info">Клиент</span></p>
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
                            <p>Статус: <span class="status-info">Клиент</span></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>