<?php
use yii\widgets\ActiveForm;
?>

<div class="container">
    <?php

    $form = ActiveForm::begin()?>
    <!--это начало и конец формы-->
    <?=$form->field($model_, 'description')->textarea()?>
    <?php ActiveForm::end()?>
</div>
