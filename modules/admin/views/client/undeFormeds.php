<?php
/** @var $this yii\web\View
 * @var $undeformeds \app\models\Clients
 * @var $user \app\models\Clients
 */

use yii\helpers\Url;

$this->title = 'Недооформленные заказчики';
?>

<div class="mainContent">
    <section class="top">
        <div class="myContainer">
            <h2>Недооформленные заказчики</h2>
            <h5>Заказчики, которые не прошли регистрацию до конца</h5>
            <hr>
        </div>
    </section>
    <section class="clients">
        <div class="myContainer">
            <div class="add-button">
                <a class="a-link" href="<?=Url::to(['/admin/client/create'])?>">Добавить нового заказчика</a>
            </div>
            <div class="userMenu">
<!--                Меню юзера-->
                <?=$this->render('/client/party/userMenu')?>
                <div class="usersWrap">
                    <?php foreach($undeformeds as $user):?>
                        <?=$this->render('/client/party/userItem', [
                            'client' => $user,
                        ])?>
                    <?php endforeach;?>
                </div>

            </div>
        </div>
    </section>
</div>