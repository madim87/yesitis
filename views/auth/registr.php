<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<header class="site-header size-lg text-center" style="background-color: url(img/bg-banner1.jpg)">
    <div class="container">
        <div class="site-login">
            <h1>Регистрация</h1>

            <p>Введите запрашиваемые данные:</p>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]); ?>
            <p>Login:</p>
            <?= $form->field($model, 'username')->label(false)->textInput(['autofocus' => true]) ?>
            <p>Email:</p>
            <?= $form->field($model, 'email')->label(false)->textInput(['autofocus' => true]) ?>
            <p>Password:</p>
            <?= $form->field($model, 'password_hash')->label(false)->passwordInput()?>
            <p>Вы соискатель или работадатель?</p>
            <?= $form->field($model, 'status')
                ->label(false)
                ->radioList([
                    '1' => 'Соискатель',
                    '2' => 'Работадатель',
                ])?>



            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Зарегистрировать', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</header>
