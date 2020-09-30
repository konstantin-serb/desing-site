<?php
/** @var $this yii\web\View
 * @var $user \app\models\Clients
 *
 */

use yii\helpers\Url;

$this->title = $user->surname . ' ' . $user->user_name . ' ' . $user->last_name;
?>

<div class="mainContent oneClient">
    <section class="top">
        <div class="myContainer">
            <h2><?= $user->surname . ' ' . $user->user_name . ' ' . $user->last_name ?></h2>
            <h5>Карточка заказчика</h5>
            <?php if ($user->status == $user::STATUS_UNDEREGISTERED):?>
            <div class="gold-button">
                <a class="a-link login-button" href="<?= Url::to([
                    '/admin/client/unde-formed',
                    'id' => $user->id,
                ]) ?>">Получить данные для регистрации</a>
            </div>
            <?php endif;?>
        </div>
    </section>
    <section class="clients oneUser">
        <div class="myContainer">

            <div class="userMenu">
                <?= $this->render('/client/party/oneUserMenu', [
                        'user' => $user,
                ]) ?>

                <div class="userFrame">
                    <div class="head">
                        <div class="itemBlock leftBlock">
                            <div class="avatarPhoto">
                                <img src="<?=$user->getImage()?>">
                            </div>
                        </div>
                        <div class="itemBlock centerBlock">
                            <div class="topBlock">
                                <div class="userName">
                                    <p><?= $user->surname ?> <?= $user->user_name ?> <?= $user->last_name ?></p>
                                </div>
                            </div>
                            <div class="bottomBlock">
                                <p>id = <?= $user->id ?></p>
                                <p>Имя от администратора: <?= $user->surname ?>
                                    <?= $user->user_name ?> <?= $user->last_name ?></p>
                                <?php if ($user->user_id):?>
                                <p>Имя от заказчика: <?=$user->user->surname. ' '.
                                    $user->user->username . ' ' .
                                    $user->user->lastName?></p>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="itemBlock rightBlock">
                            <div class="topBlock">
                                <p>Статус: <span <?= $user->getCssStyle() ?>><?= $user->getStatus() ?></span></p>
                            </div>
                            <div class="bottomBlock">
                                <p>Дата добавления: <?=Yii::$app->formatter
                                    ->asDatetime($user->created_at)?></p>
                                <p>Дата регистрации: <span <?=$user->getCssStyle()?>><?php if ($user->register_date) {
                                    echo Yii::$app->formatter
                                            ->asDatetime($user->register_date);
                                    } else {
                                    echo 'Не зарегестрирован';
                                        }?></span></p>
                                <?php if(!empty($user->user->updated_at)):?>
                                <p>Последнее редактирование: <?=Yii::$app->formatter->asDatetime($user->user->updated_at)?></p>
                                <?php endif;?>
                                <p>Email: <span <?=$user->getCssStyle()?>>
                                        <?php if ($user->status == $user::STATUS_UNDEREGISTERED) {
                                            echo 'Не добавлен';
                                        } else {
                                            echo $user->user->email;
                                        }
                                        ?></span></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="itemBody">
                        <p>Комментариев написано: 325</p>
                        <p>Последний комментарий написан: 3 дня назад</p>
                        <p>Последнее посещение сайта: 2 дня назад</p>
                    </div>
                    <hr>
                    <div class="itemBottom">
                        <h5>Проектов: 3</h5>
                    </div>

                    <div class="projectsViews">
                        <hr>

                        <div class="projects actual">
                            <div class="itemWrap">
                                <a href="#" class="block-link">
                                    <div class="item">
                                        <div class="leftBlock">
                                            <img src="/files/img/int1.jpg" title="" class="image">
                                        </div>
                                        <div class="rightBlock">
                                            <div class="topBlock">
                                                <div class="leftChap">
                                                    <p class="title">Дизайн интерьера квартиры по улице Петровского
                                                        45</p>
                                                    <p>ID Проекта: 0018282825</p>
                                                </div>
                                                <div class="rightChap">
                                                    <p>Статус: <span class="status-warning">Горящий</span></p>
                                                </div>

                                            </div>
                                            <div class="bottomBlock">
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
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <hr>
                            <div class="itemWrap">
                                <a href="#" class="block-link">
                                    <div class="item">
                                        <div class="leftBlock">
                                            <img src="/files/img/int1.jpg" title="" class="image">
                                        </div>
                                        <div class="rightBlock">
                                            <div class="topBlock">
                                                <div class="leftChap">
                                                    <p class="title">Дизайн интерьера квартиры по улице Петровского
                                                        45</p>
                                                    <p>ID Проекта: 0018282825</p>
                                                </div>
                                                <div class="rightChap">
                                                    <p>Статус: <span class="status-warning">Горящий</span></p>
                                                </div>

                                            </div>
                                            <div class="bottomBlock">
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
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="projects paused">
                    <h5>Проекты на паузе:</h5>
                    <hr>
                    <div class="itemWrap">
                        <a href="#" class="block-link">
                            <div class="item">
                                <div class="leftBlock">
                                    <img src="/files/img/int1.jpg" title="" class="image">
                                </div>
                                <div class="rightBlock">
                                    <div class="topBlock">
                                        <div class="leftChap">
                                            <p class="title">Дизайн интерьера квартиры по улице Петровского 45</p>
                                            <p>ID Проекта: 0018282825</p>
                                        </div>
                                        <div class="rightChap">
                                            <p>Статус: <span class="status-notApproved">На паузе</span></p>
                                        </div>

                                    </div>
                                    <div class="bottomBlock">
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
                                </div>
                            </div>
                        </a>
                    </div>
                    <hr>
                    <div class="itemWrap">
                        <a href="#" class="block-link">
                            <div class="item">
                                <div class="leftBlock">
                                    <img src="/files/img/int1.jpg" title="" class="image">
                                </div>
                                <div class="rightBlock">
                                    <div class="topBlock">
                                        <div class="leftChap">
                                            <p class="title">Дизайн интерьера квартиры по улице Петровского 45</p>
                                            <p>ID Проекта: 0018282825</p>
                                        </div>
                                        <div class="rightChap">
                                            <p>Статус: <span class="status-notApproved">На паузе</span></p>
                                        </div>

                                    </div>
                                    <div class="bottomBlock">
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
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="projectDone">
                    <h5>Завершенные проекты</h5>
                    <hr>
                    <div class="projects">
                        <div class="itemWrap">
                            <a href="#" class="block-link">
                                <div class="item">
                                    <div class="leftBlock">
                                        <img src="/files/img/int1.jpg" title="" class="image">
                                    </div>
                                    <div class="rightBlock">
                                        <div class="topBlock">
                                            <div class="leftChap">
                                                <p class="title">Дизайн интерьера квартиры по улице Петровского 45</p>
                                                <p>ID Проекта: 0018282825</p>
                                            </div>
                                            <div class="rightChap">
                                                <p>Статус: <span class="status-attention">Завершенный</span></p>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <hr>
                        <div class="itemWrap">
                            <a href="#" class="block-link">
                                <div class="item">
                                    <div class="leftBlock">
                                        <img src="/files/img/int1.jpg" title="" class="image">
                                    </div>
                                    <div class="rightBlock">
                                        <div class="topBlock">
                                            <div class="leftChap">
                                                <p class="title">Дизайн интерьера квартиры по улице Петровского 45</p>
                                                <p>ID Проекта: 0018282825</p>
                                            </div>
                                            <div class="rightChap">
                                                <p>Статус: <span class="status-attention">Завершенный</span></p>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </section>


</div>