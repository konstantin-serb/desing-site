<?php
/**
 * @var $model \app\models\forms\assignment\AddComment
 * @var $idReference
 */

$model->referenceId = $idReference;

?>
<div class="formContainer1">
<?php use yii\widgets\ActiveForm;
$form = ActiveForm::begin()?>
<?=$form->field($model, 'comment')->textInput()?>
<?=$form->field($model, 'referenceId')->hiddenInput()->label(false)?>

<?php ActiveForm::end()?>
</div>
<div class="button twoButton">
    <a id="<?=$buttonId?>" class="a-link " data-id="<?=$idReference?>">Добавить референс</a>
    <a id="hiddenCustomization" class="a-link cancel">Закрыть</a>
</div>
