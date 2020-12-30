<?php
/**
 * @var $undeformedProjects \app\models\Project
 * @var $project \app\models\Project
 */

use yii\helpers\Url;
use app\components\DateHelper;

$this->title = 'Проекты';
?>

<div class="mainContent userPage">
    <section class="top">
        <div class="myContainer">
            <h2>Проекты</h2>
            <hr>
        </div>
    </section>


    <section class="noFormalizes cardProjects">
        <div class="myContainer">
            <h2>Не начатые проекты:</h2>
            <div class="blockWrap">
                <?php foreach($undeformedProjects as $project):?>
                <div class="itemWrap">
                    <a href="<?=Url::to(['/customer/project/view', 'id' => $project->id])?>" class="block-link">
                        <div class="item">
                            <img src="<?=$project->getMiniatur()?>" title="" class="image">
                            <h5><?=$project->nameProject?></h5>
                            <p>
                                <b>ID Проекта:</b> <?=$project->project_id?><br>
                                <b>Дата создания проекта:</b> <?=DateHelper::getDate($project->time_create)?><br>
                                <b>Последнее редактирование:</b> <?=DateHelper::getDate($project->time_update)?><br>

                            </p>
<!--                            <div class="graphicBlock">-->
<!--                                <div class="graphic">-->
<!--                                    <div class="startDate">-->
<!--                                        18.01-->
<!--                                    </div>-->
<!--                                    <div class="endDate">-->
<!--                                        18.08-->
<!--                                    </div>-->
<!--                                    <div class="done" style="width: 70%;">-->
<!--                                        <div class="textBlock">-->
<!--                                            <div class="now">-->
<!--                                                20.04-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                    </a>
                </div>
                <?php endforeach;?>
            </div>
<!--            <div class="button">-->
<!--                <a href="#" class="a-link">Все проекты</a>-->
<!--            </div>-->
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

            </div>
            <div class="button">
                <a href="#" class="a-link">Все проекты</a>
            </div>
            <hr>
        </div>
    </section>



</div>