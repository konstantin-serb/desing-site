<?php
/* @var $this yii\web\View */

/**
 * @var $model \app\models\forms\admin\UploadAvatarAdminForm
 */

use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

$this->title = 'Страница данных администратора';
?>

<div class="mainContent">
    <section class="top">
        <div class="myContainer">
            <h2>Личный кабинет администратора</h2>
            <h5>Добрый день Admin!
                <wbr>
                Здесь вы можете произвести настройки своего профиля
            </h5>
            <div class="center-ava">
                <img src="<?php echo $admin->getAvatar();?>">
            </div>
            <div class="button">
                <?php Modal::begin([
                    'header' => '<h2>Добавить фото</h2>',
                    'toggleButton' => [
                        'label' => 'Изменить фото',
                        'tag' => 'a',
                        'class' => 'a-link',
                    ],
                ]); ?>
                <div class="centerInputs">
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'avatar')->fileInput() ?>
                    <div class="button classic-button">
                        <button class="a-link" type="submit">Изменить фото</button>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <?php Modal::end(); ?>
            </div>
            <hr>
        </div>
    </section>

</div>