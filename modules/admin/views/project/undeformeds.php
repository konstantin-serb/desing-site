<?php
/** @var $this yii\web\View
 *@var $undeformeds \app\models\Project;
 *@var $undeformed \app\models\Project;
 */

use yii\helpers\Url;
use app\components\StringHelper;

$this->title = 'Все недооформленные проекты';
?>

<div class="mainContent">
    <section class="top clients">
        <div class="myContainer">
            <h2>Все недооформленные проекты</h2>
            <br>
            <div class="singleLink">
                <a href="javascript: history.back()" class="a-link btn-default">Назад</a>
            </div>
            <br>
        </div>
    </section>

    <section class="noFormalizes cardProjects">
        <div class="myContainer">
            <?php if($undeformeds):?>

            <div class="blockWrap">
                <?php foreach($undeformeds as $undeformed):?>
                <div class="itemWrap">
                    <a href="<?=Url::to(['/admin/project/create-path2',
                        'id' => $undeformed->id])?>" class="block-link">
                        <div class="item">
                            <img src="<?=$undeformed->getMiniatur()?>" title="" class="image">
                            <div class="title">
                            <h5><?=StringHelper::getShort($undeformed->nameProject, 65)?></h5>
                            </div>
                            <p>
                                <b>ID Проекта:</b> <?=$undeformed->project_id?><br>
                                <b>Дата начала проекта:</b> <?=$undeformed->getDate($undeformed->date_start)?><br>
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
                <?php endforeach;?>
            </div>


            <?php endif;?>
        </div>
    </section>


</div>