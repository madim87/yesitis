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
        <?php $form = ActiveForm::begin()?>
            <div class="form-group col-xs-12 col-sm-6">
                <?=$form
                    ->field($vacancy_mod, 'name')
                    ->label('')
                    ->input('text',[
                        'class'=>'form-control input-lg',
                        'placeholder'=>'Название вакансии, тайтл'
                    ])?>
            </div>

            <div class="form-group col-xs-12">
                <?=$form
                    ->field($vacancy_mod, 'shortDiscription')
                    ->label('')
                    ->textarea([
                        'class'=>'form-control',
                        'placeholder'=>'Краткое описание'
                    ])?>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?php
                    $items = $items_city;
                    $params = [
                        'prompt' => 'выберете город',
                        'class' => 'form-control selectpicker'
                    ];
                    echo $form
                        ->field($vacancy_mod, 'id_city')
                        ->label('')
                        ->dropDownList($items,$params)

                    ?>

                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?=$form
                        ->field($vacancy_mod, 'adress')
                        ->label('')
                        ->input('text',[
                            'class'=>'form-control',
                            'placeholder'=>'укажите улицу и номер дома'
                        ])?>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                        <?php
                        $items = $items_typework;
                        $params = [
                            'prompt' => 'выберете тип занятости',
                            'class' => 'form-control selectpicker'
                        ];
                        echo $form
                            ->field($vacancy_mod, 'type_work_id')
                            ->label('')
                            ->dropDownList($items,$params)
                        ?>

                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?=$form
                        ->field($vacancy_mod,'wage')
                        ->label('')
                        ->input('text',[
                            'class'=>'form-control',
                            'placeholder'=>'укажите зарабатную плату'])
                    ?>

                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">


                        <?php
                        $items = $items_currency;
                        $params = [
                            'prompt' => 'выберете валюту',
                            'class' => 'form-control selectpicker'
                        ];
                        echo $form
                            ->field($vacancy_mod, 'currency_id')
                            ->label('')
                            ->dropDownList($items,$params)
                        ?>

                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                    <?=$form
                        ->field($vacancy_mod,'work_time')
                        ->label('')
                        ->input('text',[
                            'class'=>'form-control',
                            'placeholder'=>'рабочая неделя(ч/неделю)'])
                    ?>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                        <?php
                        $items = $items_experience;
                        $params = [
                            'prompt' => 'требуемый опыт работы',
                            'class' => 'form-control selectpicker'
                        ];
                        echo $form
                            ->field($vacancy_mod, 'experience_id')
                            ->label('')
                            ->dropDownList($items,$params);
                        ?>
                </div>
            </div>


            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">

                        <?php
                        $items = $items_skills;
                        $params = [
                            'prompt' => 'требуемый уровень специалиста',
                            'class' => 'form-control selectpicker'
                        ];
                        echo $form
                            ->field($vacancy_mod, 'status_id')
                            ->label('')
                            ->dropDownList($items,$params);
                        ?>
                </div>
            </div>
        <?php ActiveForm::end()?>

        </div>

        <div class="button-group">
            <div class="action-buttons">
                <div class="upload-button">
                    <button class="btn btn-block btn-primary">Choose a cover image</button>
                    <input id="cover_img_file" type="file">
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
            <?=$form
                ->field($vacancy_mod,'discription')
                ->widget(CKEditor::className(), [
                        'editorOptions'=>[
                                'present' => 'basic',
                                'rows'=>1,
                                'cols'=>1,
                                'inline' => false
                            ],
                ])
                ->label('Описание вакансии')
                ->textarea()
            ?>
            <?=$form
                ->field($vacancy_mod,'demands')
                ->widget(CKEditor::className(), [
                    'editorOptions'=>[
                        'present' => 'basic',
                        'rows'=>6,
                        'cols'=>100,
                        'inline' => false
                    ],
                ])
                ->label('требования к сотруднику')
                ->textarea()
            ?>
            <?=$form
                ->field($vacancy_mod,'conditions')
                ->widget(CKEditor::className(), [
                    'editorOptions'=>[
                        'present' => 'basic',
                        'rows'=>1,
                        'cols'=>1,
                        'inline' => false
                    ],
                ])
                ->label('условия труда')
                ->textarea()
            ?>






        </div>
    </section>
    <!-- END Job detail -->






























    <!-- Submit -->
    <section class="bg-alt">
        <div class="container">
            <header class="section-header">
                <span>Are you done?</span>
                <h2>Submit Job</h2>
                <p>Please review your information once more and press the below button to put your job online.</p>
            </header>

            <p class="text-center"><button class="btn btn-success btn-xl btn-round">Submit your job</button></p>

        </div>
    </section>
    <!-- END Submit -->


</main>
<!-- END Main container -->
