<?php
/**
 * Created by PhpStorm.
 * User: madim
 * Date: 23.12.2017
 * Time: 22:59
 */

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<!-- Page header -->
<header class="page-header">
    <div class="container page-name">
        <h1 class="text-center">Профиль компании</h1>
        <p class="lead text-center">Заполните данные по компании</p>
    </div>

    <div class="container">

        <div class="row">
            <?php $form = ActiveForm::begin() ?>
            <div class="form-group col-xs-12 col-sm-6">
                <?= $form
                    ->field($hirer_mod, 'name_hirer')
                    ->label('')
                    ->input('text', [

                        'placeholder' => 'Название компании'
                    ]) ?>
            </div>

            <div class="form-group col-xs-12 col-sm-6">
                <?= $form
                    ->field($hirer_mod, 'working')
                    ->label('')
                    ->input('text', [

                        'placeholder' => 'Деятельность компании(тезисно)'
                    ]) ?>
            </div>

            <div class="form-group col-xs-12">
                <?= $form
                    ->field($hirer_mod, 'short_desc')
                    ->label('')
                    ->textarea([

                        'placeholder' => 'Краткое описание'
                    ]) ?>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?php
                    $items = $items_cities;
                    $params = [
                        'prompt' => 'выберете город',

                    ];
                    echo $form
                        ->field($hirer_mod, 'id_city')
                        ->label('')
                        ->dropDownList($items, $params)

                    ?>

                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?= $form
                        ->field($hirer_mod, 'address')
                        ->label('')
                        ->input('text', [

                            'placeholder' => 'укажите улицу и номер дома'
                        ]) ?>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?= $form
                        ->field($hirer_mod, 'email')
                        ->label('')
                        ->input('text', [

                            'placeholder' => 'укажите email'])
                    ?>

                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?= $form
                        ->field($hirer_mod, 'site')
                        ->label('')
                        ->input('text', [

                            'placeholder' => 'укажите сайт'])
                    ?>

                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?= $form
                        ->field($hirer_mod, 'telephone')
                        ->label('')
                        ->input('text', [
                            'placeholder' => 'укажите номер телефона'])
                    ?>

                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?= $form
                        ->field($hirer_mod, 'year_begin')
                        ->label('')
                        ->input('text', [
                            'placeholder' => 'укажите год основания компании'])
                    ?>

                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?= $form
                        ->field($hirer_mod, 'people')
                        ->label('')
                        ->input('text', [
                            'placeholder' => 'укажите штат сотрудников'])
                    ?>

                </div>
            </div>

        </div>
    </div>
</header>
<!-- END Page header -->


<!-- Main container -->
<main>


    <!-- Job detail -->
    <section>
        <div class="container">

            <header class="section-header">
                <span>Description</span>
                <h2>Информация о компании</h2>
                <p>Напишите о Вашей компании</p>
            </header>
            <?= $form
                ->field($hirer_mod, 'description')
                ->widget(CKEditor::className(), [
                    'editorOptions' => [
                        'present' => 'basic',
                        'rows' => 1,
                        'cols' => 1,
                        'inline' => false
                    ],
                ])
                ->label(false)
                ->textarea()
            ?>

            <p class="text-center">
                <span>
                    <a class="btn btn-primary" href="<?=yii\helpers\Url::to(['hirer/hireradd'])?>">Отмена</a>
                    <?= Html::submitButton('Сохранить',['class' => 'btn btn-primary']) ?>
                </span>
            </p>

            <?php ActiveForm::end() ?>


        </div>
    </section>
    <!-- END Job detail -->




</main>
<!-- END Main container -->
