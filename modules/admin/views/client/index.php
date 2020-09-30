<?php
/** @var $this yii\web\View
 * @var $clients \app\models\Clients;
 */

use yii\helpers\Url;

$this->title = 'Заказчики';
?>

<div class="mainContent">
    <section class="top">
        <div class="myContainer">
            <h2>Заказчики</h2>
            <h5>Страница управления заказчиками</h5>
            <hr>
        </div>
    </section>
    <section class="clients">
        <div class="myContainer">
            <div class="add-button">
                <a class="a-link" href="<?=Url::to(['/admin/client/create'])?>">Добавить нового заказчика</a>
            </div>
            <div class="userMenu">
                <?=$this->render('/client/party/userMenu')?>
                <div class="usersWrap">
                    <?php foreach($clients as $client):?>
                        <?=$this->render('/client/party/userItem', [
                            'client' => $client,
                        ])?>
                    <?php endforeach;?>
                </div>

            </div>
        </div>
    </section>
</div>