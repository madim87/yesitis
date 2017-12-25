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
        <h1 class="text-center">Добавить вакансию</h1>
        <p class="lead text-center">Создайте и опубликуйте новую вакансию</p>
    </div>

    <div class="container">

        <div class="row">
            <?php $form = ActiveForm::begin() ?>
            <div class="form-group col-xs-12 col-sm-6">
                <?= $form
                    ->field($vacancy_mod, 'name')
                    ->label('')
                    ->input('text', [
                        'value' => '',
                        'placeholder' => 'Название вакансии, тайтл'

                    ]) ?>
            </div>

            <div class="form-group col-xs-12">
                <?= $form
                    ->field($vacancy_mod, 'shortDiscription')
                    ->label('')
                    ->textarea([

                        'placeholder' => 'Краткое описание'
                    ]) ?>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?php
                    $items = $items_city;
                    $params = [
                        'prompt' => 'выберете город',

                    ];
                    echo $form
                        ->field($vacancy_mod, 'id_city')
                        ->label('')
                        ->dropDownList($items, $params)

                    ?>

                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?= $form
                        ->field($vacancy_mod, 'adress')
                        ->label('')
                        ->input('text', [

                            'placeholder' => 'укажите улицу и номер дома'
                        ]) ?>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?php
                    $items = $items_typework;
                    $params = [
                        'prompt' => 'выберете тип занятости',

                    ];
                    echo $form
                        ->field($vacancy_mod, 'type_work_id')
                        ->label('')
                        ->dropDownList($items, $params)
                    ?>

                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?= $form
                        ->field($vacancy_mod, 'wage')
                        ->label('')
                        ->input('text', [

                            'placeholder' => 'укажите зарабатную плату'])
                    ?>

                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">


                    <?php
                    $items = $items_currency;
                    $params = [
                        'prompt' => 'выберете валюту',

                    ];
                    echo $form
                        ->field($vacancy_mod, 'currency_id')
                        ->label('')
                        ->dropDownList($items, $params)
                    ?>

                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?= $form
                        ->field($vacancy_mod, 'work_time')
                        ->label('')
                        ->input('text', [

                            'placeholder' => 'рабочая неделя(ч/неделю)'])
                    ?>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?php
                    $items = $items_experience;
                    $params = [
                        'prompt' => 'требуемый опыт работы',

                    ];
                    echo $form
                        ->field($vacancy_mod, 'experience_id')
                        ->label('')
                        ->dropDownList($items, $params);
                    ?>
                </div>
            </div>


            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?php
                    $items = $items_skills;
                    $params = [
                        'prompt' => 'требуемый уровень специалиста',

                    ];
                    echo $form
                        ->field($vacancy_mod, 'status_id')
                        ->label('')
                        ->dropDownList($items, $params);
                    ?>
                </div>
            </div>


            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?php
                    $items = $items_categories;
                    $params = [
                        'prompt' => 'категория вакансии',

                    ];
                    echo $form
                        ->field($vacancy_mod, 'id_category')
                        ->label('')
                        ->dropDownList($items, $params);
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
                <h2>Описание вакансии</h2>
                <p>Напишите о Вашей компании, условиях работы и требуемых навыках</p>
            </header>
            <?= $form
                ->field($vacancy_mod, 'discription')
                ->widget(CKEditor::className(), [
                    'editorOptions' => [
                        'present' => 'basic',
                        'rows' => 1,
                        'cols' => 1,
                        'inline' => false
                    ],
                ])
                ->label('Описание вакансии')
                ->textarea()
            ?>
            <?= $form
                ->field($vacancy_mod, 'demands')
                ->widget(CKEditor::className(), [
                    'editorOptions' => [
                        'present' => 'basic',
                        'rows' => 6,
                        'cols' => 100,
                        'inline' => false
                    ],
                ])
                ->label('требования к сотруднику')
                ->textarea()
            ?>
            <?= $form
                ->field($vacancy_mod, 'conditions')
                ->widget(CKEditor::className(), [
                    'editorOptions' => [
                        'present' => 'basic',
                        'rows' => 1,
                        'cols' => 1,
                        'inline' => false
                    ],
                ])
                ->label('условия труда')
                ->textarea()
            ?>
            <p class="text-center">опубликовать или сохранить вакансию</p>
            <p class="text-center">
                <?=$form->field($vacancy_mod, 'public')
                    ->label('')
                    ->radioList([
                        '1' => 'Опубликовать',
                        '2' => 'Сохранить',
                    ],[
                        'class' => 'text-center'
                    ])?>
            </p>
            <p class="text-center">
                <span>
                    <a class="btn btn-primary" href="<?=yii\helpers\Url::to(['vacancy/vacancyadd'])?>">Отмена</a>
                    <?= Html::submitButton('Сохранить',['class' => 'btn btn-primary']) ?>
                </span>
            </p>

            <?php ActiveForm::end() ?>


        </div>
    </section>
    <!-- END Job detail -->




</main>
<!-- END Main container -->
