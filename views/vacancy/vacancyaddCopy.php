<?php
/**
 * Created by PhpStorm.
 * User: madim
 * Date: 23.12.2017
 * Time: 22:59

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;

CKEditor::widget([
    'editorOptions' => [
        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
    ]
]);
 */
use yii\helpers\Html;

?>

<!-- Page header -->
<header class="page-header">
    <div class="container page-name">
        <h1 class="text-center">Добавить вакансию</h1>
        <p class="lead text-center">Создайте и опубликуйте новую вакансию</p>
    </div>

    <div class="container">

        <div class="row">
            <div class="form-group col-xs-12 col-sm-6">
                <input type="text" class="form-control input-lg" placeholder="Название вакансии, тайтл" name="name">
            </div>

<!--            <div class="form-group col-xs-12 col-sm-6">
                <select class="form-control selectpicker">
                    <option>Select a company</option>
                    <option>Google</option>
                    <option>Microsoft</option>
                    <option>Apple</option>
                    <option>Facebook</option>
                </select>
                <a class="help-block" href="company-add.html">Add new company</a>
            </div>    -->

            <div class="form-group col-xs-12">
                <textarea class="form-control" rows="3" placeholder="Краткое описание" name="shortDiscription"></textarea>
            </div>

            <div class="form-group col-xs-12">
                <input type="text" class="form-control" placeholder="Application URL">
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-map-marker" ></i></span>
                    <input type="text" class="form-control" placeholder="Улица, номер дома, помещение" name="address">
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-map-marker" ></i></span>
                    <select class="form-control selectpicker">
                        <?php
                        foreach ($cities as $city) {
                            ?>
                            <option name="id_city" value="<?=$city->id?>"><?=$city->name?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <span class="input-group-addon">город</i></span>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                    <select class="form-control selectpicker">
                        <?php
                        foreach ($typeworks as $typework) {
                            ?>
                            <option name="typework" value="<?=$typework->id?>"><?=$typework->type_work?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <span class="input-group-addon">тип занятости</i></span>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                    <input type="text" class="form-control" placeholder="заработная плата" name="wage">
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                    <select class="form-control selectpicker">
                        <?php
                        foreach ($currencies as $currency) {
                            ?>
                            <option name="currency_id" value="<?=$currency->id?>"><?=$currency->name?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <span class="input-group-addon">валюта</i></span>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    <input type="text" class="form-control" placeholder="рабочее время" name="work_time">
                    <span class="input-group-addon">часов в неделю</span>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-flask"></i></span>
                    <select class="form-control selectpicker">
                        <?php
                        foreach ($vacExperiences as $vacExperience)
                        {
                            ?>
                            <option name="experience_id" value="<?=$vacExperience->id?>"><?=$vacExperience->value?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <span class="input-group-addon">опыт работы</i></span>
                </div>
            </div>


            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-certificate"></i></span>
                    <select class="form-control selectpicker" multiple>
                        <?php
                        foreach ($skills as $skill)
                        {
                            ?>
                            <option name="status_id" value="<?=$skill->id?>"><?=$skill->status?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <span class="input-group-addon">статус</i></span>
                </div>
            </div>


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



        </div>
    </section>
    <!-- END Job detail -->







    <?php
    use yii\widgets\ActiveForm;
    ?>


<div class="container">
    <div class="row">
        <div class="form-group col-xs-12 col-sm-6">
        <?php $form = ActiveForm::begin()?>
            <div class="form-group col-xs-12 col-sm-6">
                <?=$form
                    ->field($model_, 'name')
                    ->label('')
                    ->input('text',[
                            'class'=>'form-control input-lg',
                            'placeholder'=>'Название вакансии, тайтл'
                        ])?>
            </div>

            <div class="form-group col-xs-12">
                <?=$form
                    ->field($model_, 'shortDiscription')
                    ->label('')
                    ->textarea([
                        'class'=>'form-control',
                        'placeholder'=>'Краткое описание'
                    ])?>
            </div>


            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-map-marker" ></i></span>
                    <?=$form
                        ->field($model_, 'adress')
                        ->label('')
                        ->input('text',[
                            'class'=>'form-control',
                            'placeholder'=>'Улица, номер дома, помещение'
                        ])?>
                </div>
            </div>





        <?php ActiveForm::end()?>
        </div>
    </div>
</div>





















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
