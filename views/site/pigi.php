<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin()?>
<?=$form->field($form_city,'name')?>
<?= Html::submitButton('Send',['class'=>'btn btn-success'])?>
<?php ActiveForm::end()?>

