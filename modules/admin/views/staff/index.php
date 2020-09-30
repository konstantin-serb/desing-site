<?php
/* @var $this yii\web\View */
/**
 * @var $users \app\models\Employee
 */

$this->title = 'Сотрудники';

use yii\helpers\Url; ?>

<div class="mainContent staff">
    <section class="top">
        <div class="myContainer">
            <h2>Сотрудники</h2>
            <h5>Страница управления сотрудниками</h5>
            <hr>
        </div>
    </section>
    <section class="staff">
        <div class="myContainer">
            <div class="add-button">
                <a class="a-link" href="<?=Url::to(['/admin/staff/create'])?>">Добавить нового сотрудника</a>
            </div>
            <div class="userMenu">
                <?=$this->render('/staff/party/staffMenu')?>
                <div class="usersWrap">
                    <?php foreach($users as $user):?>
                    <?=$this->render('/staff/party/staffItem', [
                            'user' => $user,
                        ])?>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </section>
</div>