<?php
/**
 * @var $user \app\models\Clients
 */

use yii\helpers\Url;

$this->title = 'Личный кабинет';
?>

<div class="mainContent userPage">
    <section class="top">
        <div class="myContainer">
            <h2>Личный кабинет</h2>
            <h5>Добрый день <?=$user->user->username ?> <?= $user->user->lastName ?>!
                <wbr>
                Добро пожаловать в ваш личный кабинет!
            </h5>
            <hr>
        </div>
    </section>
    <section class="personalData">
        <h2><a href="<?=Url::to(['/employee/personal-data'])?>" class="a-link">Личные данные</a></h2>
        <div class="myContainer">
            <div class="button">
                <a href="<?=Url::to(['/employee/personal-data'])?>" class="a-link">Изменить личные данные</a>
            </div>
            <hr>
        </div>
    </section>
    <section class="">
        <div class="myContainer">
            <h2>Сообщения</h2>
            <h5><?=$user->user_name ?> <?= $user->last_name ?>! У Вас есть непрочитанные сообщения!</h5>
            <div class="button">
                <a href="#" class="a-link">Просмотреть сообщения</a>
            </div>
            <hr>
        </div>
    </section>
    <section class="activProjects cardProjects">
        <div class="myContainer">
            <h2>Активные проекты:</h2>
            <div class="blockWrap">
                <div class="itemWrap">
                    <a href="#" class="block-link">
                        <div class="item">
                            <img src="../files/img/int1.jpg" title="" class="image">
                            <h5>Дизайн интерьера квартиры по улице Петровского 45</h5>
                            <p>
                                <b>ID Проекта:</b> 00182820<br>
                                <b>Дата начала проекта:</b> 18.01.2020<br>
                                <b>Дата завершения проекта:</b> 18.03.2020<br>
                                <b>Исполнители:</b> Степан Иванов, Иван Степанов, Мария Курганская
                            </p>
                            <div class="graphicBlock">
                                <div class="graphic">
                                    <div class="startDate">
                                        18.01
                                    </div>
                                    <div class="endDate">
                                        18.08
                                    </div>
                                    <div class="done" style="width: 70%;">
                                        <div class="textBlock">
                                            <div class="now">
                                                20.04
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="itemWrap">
                    <a href="#" class="block-link">
                        <div class="item">
                            <img src="../files/img/int1.jpg" title="" class="image">
                            <h5>Дизайн интерьера квартиры по улице Петровского 45</h5>
                            <p>
                                <b>ID Проекта:</b> 00182820<br>
                                <b>Дата начала проекта:</b> 18.01.2020<br>
                                <b>Дата завершения проекта:</b> 18.03.2020<br>
                                <b>Исполнители:</b> Степан Иванов, Иван Степанов, Мария Курганская
                            </p>
                            <div class="graphicBlock">
                                <div class="graphic">
                                    <div class="startDate">
                                        18.01
                                    </div>
                                    <div class="endDate">
                                        18.08
                                    </div>
                                    <div class="done" style="width: 70%;">
                                        <div class="textBlock">
                                            <div class="now">
                                                20.04
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="itemWrap">
                    <a href="#" class="block-link">
                        <div class="item">
                            <img src="../files/img/int1.jpg" title="" class="image">
                            <h5>Дизайн интерьера квартиры по улице Петровского 45</h5>
                            <p>
                                <b>ID Проекта:</b> 00182820<br>
                                <b>Дата начала проекта:</b> 18.01.2020<br>
                                <b>Дата завершения проекта:</b> 18.03.2020<br>
                                <b>Исполнители:</b> Степан Иванов, Иван Степанов, Мария Курганская
                            </p>
                            <div class="graphicBlock">
                                <div class="graphic">
                                    <div class="startDate">
                                        18.01
                                    </div>
                                    <div class="endDate">
                                        18.08
                                    </div>
                                    <div class="done" style="width: 70%;">
                                        <div class="textBlock">
                                            <div class="now">
                                                20.04
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="button">
                <a href="#" class="a-link">Все проекты</a>
            </div>
            <hr>
        </div>
    </section>
    <section class="cardMessage cardDraft">
        <div class="myContainer">
            <h2>Последние черновики</h2>
            <div class="blockWrap">
                <div class="itemWrap">
                    <a href="#" class="block-link">
                        <div class="item">
                            <img class="" src="../files/img/temporary/ing2.jpg">
                            <h4>По поводу мебели в детскую</h4>
                            <p class="subtitle"><b>ID Проекта: 00182820</b></p>
                            <p class="text">
                                Во время пандемии мы выявили 25% инфицированных в карантине. Это эффективно - мы не дали
                                инфицированным возможность разносить инфекцию дальше", - заявил Гамкрелидзе
                            </p>
                        </div>
                    </a>
                </div>
                <div class="itemWrap">
                    <a href="#" class="block-link">
                        <div class="item">
                            <img class="" src="../files/img/temporary/ing2.jpg">
                            <h4>По поводу мебели в детскую</h4>
                            <p class="subtitle"><b>ID Проекта: 00182820</b></p>
                            <p class="text">
                                Во время пандемии мы выявили 25% инфицированных в карантине. Это эффективно - мы не дали
                                инфицированным возможность разносить инфекцию дальше", - заявил Гамкрелидзе
                            </p>
                        </div>
                    </a>
                </div>
                <div class="itemWrap">
                    <a href="#" class="block-link">
                        <div class="item">
                            <img class="" src="../files/img/temporary/ing2.jpg">
                            <h4>По поводу мебели в детскую</h4>
                            <p class="subtitle"><b>ID Проекта: 00182820</b></p>
                            <p class="text">
                                Во время пандемии мы выявили 25% инфицированных в карантине. Это эффективно - мы не дали
                                инфицированным возможность разносить инфекцию дальше", - заявил Гамкрелидзе
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="button">
                <a href="#" class="a-link">Перейти в черновики</a>
            </div>
            <hr>
        </div>
    </section>

    <section class="cardMessage lastMessage">
        <div class="myContainer">
            <h2>Последние ваши сообщения</h2>
            <div class="blockWrap">
                <div class="itemWrap">
                    <a href="#" class="block-link">
                        <div class="item">
                            <img class="" src="../files/img/temporary/ing2.jpg">
                            <h4>По поводу мебели в детскую</h4>
                            <p class="subtitle"><b>ID Проекта: 00182820</b></p>
                            <p class="text">
                                Во время пандемии мы выявили 25% инфицированных в карантине. Это эффективно - мы не дали
                                инфицированным возможность разносить инфекцию дальше", - заявил Гамкрелидзе
                            </p>
                        </div>
                    </a>
                </div>
                <div class="itemWrap">
                    <a href="#" class="block-link">
                        <div class="item">
                            <img class="" src="../files/img/temporary/ing2.jpg">
                            <h4>По поводу мебели в детскую</h4>
                            <p class="subtitle"><b>ID Проекта: 00182820</b></p>
                            <p class="text">
                                Во время пандемии мы выявили 25% инфицированных в карантине. Это эффективно - мы не дали
                                инфицированным возможность разносить инфекцию дальше", - заявил Гамкрелидзе
                            </p>
                        </div>
                    </a>
                </div>
                <div class="itemWrap">
                    <a href="#" class="block-link">
                        <div class="item">
                            <img class="" src="../files/img/temporary/ing2.jpg">
                            <h4>По поводу мебели в детскую</h4>
                            <p class="subtitle"><b>ID Проекта: 00182820</b></p>
                            <p class="text">
                                Во время пандемии мы выявили 25% инфицированных в карантине. Это эффективно - мы не дали
                                инфицированным возможность разносить инфекцию дальше", - заявил Гамкрелидзе
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="button">
                <a href="#" class="a-link">Все исходящие</a>
            </div>

        </div>
    </section>
</div>