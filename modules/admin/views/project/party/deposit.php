<?php
/**
 * @var $project \app\models\Project
 */
?>

<?php for ($i = 1; $i < 6; $i++):
    $word = 'result';
    $index = $word . $i;
    ?>
    <?php if(!$project->$index==0):?>
    <div class="stringWrap">
        <div class="stringBold"><?=$i;?> часть:</div>
        <div id="stringPrice" class="stringRegular">
            <?= $project->$index ?> <?= $project->valut->currency ?>
        </div>
    </div>
<?php endif;?>
<?php endfor; ?>
