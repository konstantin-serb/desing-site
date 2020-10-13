<?php

/**
 * @var $user \app\models\Clients
 */

use yii\widgets\ActiveForm;

$this->title = 'Мои личные данные';
?>

<div class="mainContent userPage">
    <section class="top">
        <div class="myContainer">
            <h2><?= $user->surname . ' ' . $user->user_name . ' ' . $user->last_name ?></h2>
            <h5>Замена изображения профиля</h5>

        </div>
    </section>
    <section class="clients oneUser">
        <?php $form = ActiveForm::begin()?>
        <div class="myContainer">
            <div class="userMenu">
                <div class="userFrame">
                    <div class="head">
                        <div class="itemBlock leftBlock">
                            <div class="avatarPhoto">
                                <img src="<?=$user->getImage()?>">
                            </div>
                        </div>
                        <div class="itemBlock centerBlock">
                        <?=$form->field($model, 'avatar')->fileInput()?>
                            <div class="user-button">
                                <a class="a-link" href="javascript: history.back()">Отмена</a>
                            </div>
                        </div>
                        <div class="itemBlock rightBlock">
                            <div class="topBlock">
                                <div class="user-button">
                                    <button class="a-link" href="#">Изменить фото</button>
                                </div>
                            </div>
                            <div class="bottomBlock">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end()?>
    </section>
</div>
