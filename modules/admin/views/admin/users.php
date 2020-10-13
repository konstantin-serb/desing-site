<?php
/** @var $this yii\web\View
 *@var $clients \app\models\Clients
 *@var $client \app\models\Clients
 * @var $staff \app\models\Employee
 * @var $userStaff \app\models\Employee
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
                <div class="usersWrap" <?php if(count($clients)<5)echo 'style="justify-content:center;"';?>>

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
                <div class="usersWrap" <?php if(empty($staff) || count($staff) < 4) echo 'style="justify-content:center;"';?>>
                    <?php if(!empty($staff)):?>
                    <?php foreach($staff as $userStaff):?>
                        <?=$this->render('/staff/party/staffItem',[
                                'user' => $userStaff,
                            ])?>
                    <?php endforeach;?>
                    <?php else:?>
                    <h3>У вас пока нет зарегистрированных сотрудников</h3>
                    <?php endif;?>
                </div>
                <div class="button">
                    <a href="<?=Url::to(['/admin/staff'])?>" class="a-link">Все сотрудники</a>
                </div>
                <br>

            </div>
        </div>
    </section>


</div>