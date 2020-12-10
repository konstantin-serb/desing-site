<?php
/**
 * @var $stages \app\models\Stage
 * @var $stage \app\models\Stage
 * @var $project \app\models\Project
 */
?>
<?php foreach($stages as $stage):?>
<div class="stagesItem stageDone">
    <svg width="60" height="60" viewBox="0 0 42 43" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M41.6232 0.923828H0.350342V42.8424L41.6232 0.923828Z" fill="#34E830"/>
    </svg>
    <div class="top">
        <h3><?=$stage->number?></h3>
        <h4><?=$stage->title?></h4>
    </div>
    <div class="bottom">
        <div class="stringBlock">
            <div class="stringWrap">
                <div class="stringRegular">Исполнитель:</div>
                <div class="stringRegular">Иванов И.И.</div>
            </div>
            <div class="stringWrap">
                <div class="stringRegular">Начало:</div>
                <div class="stringRegular"><?=$stage->getDate($stage->start)?></div>
            </div>
            <div class="stringWrap">
                <div class="stringRegular">Окончание:</div>
                <div class="stringRegular">12.05.2020 г.</div>
            </div>
        </div>
        <p class="doneDay">
            Всего дней: <?=$stage->length?>
        </p>
    </div>
</div>

<?php endforeach;?>
