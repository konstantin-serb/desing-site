<?php
/** @var $this yii\web\View
 * @var $undeformeds \app\models\Clients
 * @var $user \app\models\Clients
 * @var $users \app\models\Clients
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
                <a class="a-link" href="<?= Url::to(['/admin/staff/create']) ?>">Добавить нового сотрудника</a>
            </div>
            <div class="userMenu">
                <!--                Меню юзера-->
                <?= $this->render('/staff/party/staffMenu') ?>
                <div class="usersWrap" <?php if(empty($users) || count($users) < 5) echo 'style="justify-content:center;"';?>>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <?= $this->render('/staff/party/staffItem', [
                                'user' => $user,
                            ]) ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <h3>Нет недооформленных сотрудников</h3>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>
</div>