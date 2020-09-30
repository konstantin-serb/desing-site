<?php
/** @var $this yii\web\View
 * @var $undeformeds \app\models\Clients
 * @var $user \app\models\Clients
 */

use yii\helpers\Url;

$this->title = 'Недооформленные сотрудники';
?>

<div class="mainContent staff">
    <section class="top">
        <div class="myContainer">
            <h2>Недооформленные сотрудники</h2>
            <h5>Сотрудники, которые не прошли регистрацию до конца</h5>
            <hr>
        </div>
    </section>
    <section class="clients">
        <div class="myContainer">
            <div class="add-button">
                <a class="a-link" href="<?=Url::to(['/admin/staff/create'])?>">Добавить нового заказчика</a>
            </div>
            <div class="userMenu">
<!--                Меню юзера-->
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