<?php
/**
 * @var $user \app\models\Clients
 */

use yii\helpers\Url;

$this->title = "Данные для завершения регистрации";
?>

<div class="mainContent adminPage">

    <section class="top">
        <div class="myContainer">
            <div class="adminCreate">
                <h2>Новый сотрудник добавлен!</h2>
                <h5>1й этап регистрации закончен</h5>
                <h5 class="subtitle">Добавлен новый сотрудник:</h5>
            </div>
            <div class="client-name">
                <div class="input-group">
                    <p><a href="<?=Url::to(['/admin/staff/view',
                        'id' => $user->id])?>" class="a-link"><?=
                            $user->surname ?> <?= $user->user_name ?>
                            <?= $user->last_name ?></a></p>
                </div>
            </div>
            <br>
            <hr>
        </div>
    </section>
    <section class="client-info">
        <div class="myContainer">
            <h2>2й этап регистрации клиента</h2>
            <h5 class="grey">Для того, чтобы закончить регистрацию, отправте эти данные сотруднику на почту или в любой
                удобный для него и для вас мессенджер (телеграм, вайбер, вотсап)</h5>
            <div class="info-block">
                <p class="myLabel">Ссылка для регистрации сотрудника:</p>
                <div class="input-group">
                    <p>http://interior/staff/register</p>
                </div>
                <p class="myLabel">Код для регистрации:</p>
                <div class="input-group">
                    <p><?=$user->hash?></p>
                </div>
            </div>
            <div class="bottom-block">
                <p>
                    * - Код регистрации одноразовый. При регистрации сотрудника, код самоуничтожается, что предотвращает
                    возможность
                    повторной регистрации. Таким образом зарегестрированными в систему будут только те позьзователи,
                    которым Вы
                    дадите такую возможность.
                </p>
                <div class="gold-button">
                    <a class="a-link login-button" href="<?=Url::to(['/admin/staff/view',
                    'id'=>$user->id])?>">OK</a>
                </div>
            </div>
        </div>
    </section>

    <br>
</div>




