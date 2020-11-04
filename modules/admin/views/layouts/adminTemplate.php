<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use app\assets\DesignAsset;
use yii\helpers\Url;

DesignAsset::register($this);

if (empty($this->params['activePage'])) {
    $this->params['activePage'] = '';


}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Удаленный дизайн интерьера"/>
    <meta name="keywords" content="Дизайн, удаленный дизайн"/>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body  class="adminPage">
<?php $this->beginBody() ?>
<header>
    <div class="toggle">
        <div class="toggle-menu" id="toggle-menu">
            <svg width="33" height="19" viewBox="0 0 33 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.591797" y="0.268555" width="31.9527" height="3.20987" fill="#7B7B7B"/>
                <rect x="10.2212" y="7.98877" width="22.3231" height="3.20987" fill="#7B7B7B"/>
                <rect x="0.591797" y="15.709" width="31.9527" height="3.20987" fill="#7B7B7B"/>
            </svg>
        </div>
    </div>
    <menu id="main-menu">
        <div class="myContainer">
            <ul class="navi">
                <li class="<?php
                if($this->params['activePage'] == 'home')echo 'active';
                ?>"><a class="a-link" href="<?=Url::to(['/admin'])?>">Главная</a></li>
                <li class="<?php
                if($this->params['activePage'] == 'users')echo 'active';
                ?>"><a class="a-link" href="<?=Url::to(['/admin/users'])?>">Пользователи</a></li>
                <li class="<?php
                if($this->params['activePage'] == 'projects')echo 'active';
                ?>"><a class="a-link" href="<?=Url::to(['/admin/project'])?>">Проекты</a></li>

                <li class="<?php
                if($this->params['activePage'] == 'message')echo 'active';
                ?>">
                    <div class="wrapLi">
                        <a class="a-link" href="#">Сообщения</a>
                        <div class="countMessage">
                            <a href="#" class="cont-link">8</a>
                        </div>
                    </div>
                </li>

                <li class="<?php
                if($this->params['activePage'] == 'site')echo 'active';
                ?>"><a class="a-link" href="<?=Url::to(['/'])?>">Сайт</a></li>

                <?php if(Yii::$app->user->isGuest):?>
                <li class="<?php
                if($this->params['activePage'] == 'login')echo 'active';
                ?>">
                    <a class="a-link" href="<?=Url::to(['/login'])?>">
                        Вход</a>
                </li>
                <?php else:?>
                <li class="logout-button <?php
                if($this->params['activePage'] == 'login')echo 'active';
                ?>">
                    <?=Html::beginForm(['/logout'], 'post')?>
                    <?=Html::submitButton('Выход'.' ('.Yii::$app->user->identity->username. ' '. Yii::$app->user->identity->lastName . ')', ['class' => 'a-link'])?>
<!--                    <a class="a-link" href="--><?//=Url::to(['/logout'])?><!--">-->
                    </a>
                    <?=Html::endForm()?>
                </li>
                <?php endif;?>

            </ul>
            <hr>
        </div>
    </menu>

</header>


<?= $content ?>


<footer class="adminFooter">
    <div class="myContainer">
        <div class="footerWrap">
            <div class="leftChapter chapter">
                <p><a href="#" class="a-link">Проекты</a></p>
                <p><a href="#" class="a-link">Заказчики</a></p>
                <p><a href="#" class="a-link">Сотрудники</a></p>
                <p><a href="#" class="a-link">Портфолио</a></p>
                <p><a href="#" class="a-link">Образец проекта</a></p>
            </div>
            <div class="centerChapter chapter">
                <p><a href="#" class="a-link">Недооформленные проекты</a></p>
                <p><a href="#" class="a-link">Активные проекты</a></p>
                <p><a href="#" class="a-link">Создать новый проект</a></p>
                <p><a href="#" class="a-link">Создать нового заказчика</a></p>
                <p><a href="#" class="a-link">Создать нового сотрудника</a></p>

            </div>
            <div class="rightChapter chapter">
                <p><a href="<?=Url::to(['/admin'])?>" class="a-link">Главная</a></p>
                <p><a href="<?=Url::to(['/admin/users'])?>" class="a-link">Пользователи</a></p>
                <p><a href="<?=Url::to(['/admin/project'])?>" class="a-link">Проекты</a></p>
                <p><a href="#" class="a-link">Сообщения</a></p>
                <p><a href="<?=Url::to(['/'])?>" class="a-link">Сайт</a></p>
            </div>
        </div>
    </div>
</footer>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
