<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Проекты';
?>

<div class="mainContent">
    <section class="top clients">
        <div class="myContainer">
            <h2>Проекты</h2>
            <h5>Страница управления проектами</h5>
            <div class="add-button">
                <a class="a-link" href="<?=Url::to(['/admin/project/create'])?>">Добавить новый проект</a>
            </div>
            <hr>
        </div>
    </section>

    <section class="noFormalizes cardProjects">
        <div class="myContainer">
            <h2>Недооформленные проекты:</h2>
            <div class="blockWrap">
                <div class="itemWrap">
                    <a href="<?=Url::to(['/admin/project/view'])?>" class="block-link">
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
                    <a href="<?=Url::to(['/admin/project/view'])?>" class="block-link">
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
                    <a href="<?=Url::to(['/admin/project/view'])?>" class="block-link">
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
                <a href="#" class="a-link">Все недоофоормленные</a>
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
                <a href="#" class="a-link">Все активные</a>
            </div>
            <hr>
        </div>
    </section>
    <section class="pausaProjects cardProjects">
        <div class="myContainer">
            <h2>Приостановленные проекты:</h2>
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

            </div>
            <div class="button">
                <a href="#" class="a-link">Все проекты</a>
            </div>
            <hr>
        </div>
    </section>
    <section class="endProjects cardProjects">
        <div class="myContainer">
            <h2>Завершенные проекты:</h2>
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

            </div>
            <div class="button">
                <a href="#" class="a-link">Все проекты</a>
            </div>

        </div>
    </section>

</div>