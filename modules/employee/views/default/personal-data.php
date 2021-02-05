<?php

/**
 * @var $user \app\models\Employee
 * @var $modelEmail \app\models\forms\employee\EmailUpdateForm
 * @var $modelPassword \app\models\forms\employee\PasswordUpdateForm
 * @var $modelSurname \app\models\forms\client\EditForm;
 */

use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

$this->title = 'Мои личные данные';

$modelEmail->email = $user->user->email;

$modelSurname->surname = $user->user->surname;
$modelSurname->userName = $user->user->username;
$modelSurname->lastName = $user->user->lastName;
?>

<div class="mainContent userPage">
    <section class="top">
        <div class="myContainer">
            <h2><?= $user->user->surname . ' ' . $user->user->username . ' ' . $user->user->lastName ?></h2>
            <h5>Личные данные</h5>

        </div>
    </section>
    <section class="clients oneUser">
        <div class="myContainer">
            <div class="userMenu">
                <div class="userFrame">
                    <div class="head">
                        <div class="itemBlock leftBlock">
                            <div class="avatarPhoto">
                                <img src="<?= $user->getImage() ?>">
                            </div>
                        </div>
                        <div class="itemBlock centerBlock">
                            <div class="topBlock">
                                <div class="userName">
                                    <p><?= $user->user->surname ?> <?= $user->user->username ?> <?= $user->user->lastName ?></p>
                                </div>
                                <div class="user-button">
                                    <?php Modal::begin([
                                        'size' => 'modal-lg',
                                        'header' => '<h2>Изменить фото</h2>',
                                        'toggleButton' => [
                                            'label' => 'Изменить фото',
                                            'tag' => 'a',
                                            'class' => 'a-link',
                                        ],
                                        'closeButton' => [
                                            'id' => 'close-button',
                                            'class' => 'close',
                                            'data-dismiss' => 'modal',
                                        ],]);
                                    ?>
                                    <div class="formStyle modal-form">
                                        <?php $form = ActiveForm::begin() ?>

                                        <div class="userMenu">
                                            <div class="userFrame">
                                                <div class="head">
                                                    <div class="itemBlock">
                                                        <div class="avatarPhoto">
                                                            <img src="<?= $user->getImage() ?>">
                                                        </div>
                                                    </div>
                                                    <div class="itemBlock">
                                                        <?= $form->field($modelPhoto, 'avatar')->fileInput() ?>
                                                    </div>
                                                    <div class="itemBlock">
                                                        <div class="">
                                                            <div class="user-button">
                                                                <button class="a-link" href="#">Изменить фото
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="bottomBlock">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php ActiveForm::end() ?>
                                    </div>
                                    <?php Modal::end(); ?>
                                </div>
                            </div>

                            <div class="bottomBlock">
                                <div class="user-button">
                                    <?php Modal::begin([
                                        'size' => 'modal-lg',
                                        'header' => '<h2>Изменить фамилию, имя и отчество</h2>',
                                        'toggleButton' => [
                                            'label' => 'Изменить ФИО',
                                            'tag' => 'a',
                                            'class' => 'a-link',
                                        ],
                                        'closeButton' => [
                                            'id' => 'close-button',
                                            'class' => 'close',
                                            'data-dismiss' => 'modal',
                                        ],]);
                                    ?>
                                    <div class="formStyle">
                                        <?php $form = ActiveForm::begin(['id' => 'form-updateClient']) ?>
                                        <div class="form-group">
                                            <?= $form->field($modelSurname, 'surname')->label('Фамилия')->textInput(['autofocus' => true]) ?>

                                        </div>
                                        <div class="form-group">
                                            <?= $form->field($modelSurname, 'userName')->label('Имя')->textInput() ?>
                                        </div>

                                        <div class="form-group">
                                            <?= $form->field($modelSurname, 'lastName')->label('Отчество')->textInput() ?>

                                        </div>

                                        <br>
                                        <button type="submit" class="submit" name="add-button">Сохранить</button>
                                        <?php ActiveForm::end() ?>
                                    </div>
                                    <?php Modal::end(); ?>

                                </div>


                                <div class="user-button">
                                    <?php Modal::begin([
                                        'size' => 'modal-lg',
                                        'header' => '<h2>Изменить email</h2>',
                                        'toggleButton' => [
                                            'label' => 'Изменить Email',
                                            'tag' => 'a',
                                            'class' => 'a-link',
                                        ],
                                        'closeButton' => [
                                            'id' => 'close-button',
                                            'class' => 'close',
                                            'data-dismiss' => 'modal',
                                        ],]);
                                    ?>
                                    <div class="formStyle">
                                        <?php $form = ActiveForm::begin(); ?>

                                        <?= $form->field($modelEmail, 'email')->textInput() ?>

                                        <div class="button">
                                            <button type="submit" class="submit" name="add-button">Сохранить
                                            </button>
                                        </div>

                                        <?php ActiveForm::end(); ?>

                                    </div>
                                    <?php Modal::end(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="itemBlock rightBlock">
                            <div class="topBlock">
                                <div class="user-button">
                                    <p class="status-warning"><?=Yii::$app->session->getFlash('success')?></p>
                                    <?php Modal::begin([
                                        'size' => 'modal-lg',
                                        'header' => '<h2>Изменить Пароль</h2>',
                                        'toggleButton' => [
                                            'label' => 'Изменить пароль',
                                            'tag' => 'a',
                                            'class' => 'a-link',
                                        ],
                                        'closeButton' => [
                                            'id' => 'close-button',
                                            'class' => 'close',
                                            'data-dismiss' => 'modal',
                                        ],]);
                                    ?>
                                    <div class="formStyle">
                                        <?php $form = ActiveForm::begin(); ?>
                                        <?= $form->field($modelPassword, 'currentPassword')->passwordInput()->label(
                                                'Текущий пароль') ?>
                                        <?= $form->field($modelPassword, 'password')->passwordInput()->label(
                                            'Новый пароь') ?>
                                        <?= $form->field($modelPassword, 'repeatPassword')->passwordInput()->label(
                                            'Повторите новый пароль') ?>
                                        <div class="button">
                                            <button type="submit" class="submit" name="add-button">Сохранить
                                            </button>
                                        </div>

                                        <?php ActiveForm::end(); ?>
                                        <?php Modal::end(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="bottomBlock">
                                <p>Должность: <span class="status-normal"><?= $user->pos->position ?></span></p>

                                <p>Дата регистрации:
                                    <span <?= $user->getCssStyle() ?>><?php if ($user->register_date) {
                                            echo Yii::$app->formatter
                                                ->asDatetime($user->register_date);
                                        } else {
                                            echo 'Не зарегестрирован';
                                        } ?></span></p>
                                <?php if ($user->user->updated_at): ?>
                                    <p>Последнее редактирование: <span
                                                class="status-info"><?= Yii::$app->formatter->asDatetime($user->user->updated_at) ?></span>
                                    </p>
                                <?php endif; ?>
                                <p>Email: <span <?= $user->getCssStyle() ?>>
                                        <?php if ($user->status == $user::STATUS_UNDEREGISTERED) {
                                            echo 'Не добавлен';
                                        } else {
                                            echo $user->user->email;
                                        }
                                        ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
