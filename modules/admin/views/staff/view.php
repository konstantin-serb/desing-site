<?php
/** @var $this yii\web\View
 * @var $user \app\models\Employee
 *
 */

use yii\helpers\Url;

$this->title = $user->surname . ' ' . $user->user_name . ' ' . $user->last_name;
?>

<div class="mainContent oneClient staff">
    <section class="top">
        <div class="myContainer">
            <h2><?= $user->surname . ' ' . $user->user_name . ' ' . $user->last_name ?></h2>
            <h5>Карточка сотрудника</h5>
            <?php if ($user->status == $user::STATUS_UNDEREGISTERED):?>
            <div class="gold-button">
                <a class="a-link login-button" href="<?= Url::to([
                    '/admin/staff/unde-formed',
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
                                <p>Должность: <span class="status-success"><?=$user->pos->position?></span></p>
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
                                    ->asDatetime($user->create_at)?></p>
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
                    <?php if(!empty($user->info)):?>
                    <div class="staffInfo">
                        <h3>Информация о сотруднике</h3>
                        <p>
                            <?=$user->info?>
                        </p>
                    </div>
                    <hr>
                    <?php endif;?>
                    <div class="itemBody">
                        <p>Комментариев написано: 325</p>
                        <p>Последний комментарий написан: 3 дня назад</p>
                        <p>Последнее посещение сайта: 2 дня назад</p>
                    </div>


                </div>


            </div>


        </div>
    </section>


</div>