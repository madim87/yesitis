
<?php
use yii\bootstrap\Alert;
?><br><br><br>
<div class="container">

    <?=   Yii::$app->getSession()->getFlash('msg')?>
    <?php
    $form = \yii\widgets\ActiveForm::begin();
    ?>
    <?=$form->field($model, 'name')->textInput()->label(null)?>
    <?=$form->field($model, 'content')->textarea()->label(null)?>
    <button type="submit" class="btn btn-success">Send</button>
    <?php \yii\widgets\ActiveForm::end()?>
</div>