<?php
/**
 * Created by PhpStorm.
 * User: madim
 * Date: 23.12.2017
 * Time: 14:49
 */
$this->title = 'Hirer';
use yii\widgets\LinkPager;
?>

<!-- Page header -->
<header class="page-header bg-img size-lg" style="background-image: url(img/bg-banner2.jpg)">
    <div class="container">
        <div class="header-detail">
            <img class="logo" src="img/logo-google.jpg" alt="">
            <div class="hgroup">
                <h1><?=$hirer->name_hirer?></h1>
                <h3><?=$hirer->working?></h3>
            </div>
            <hr>
            <p class="lead"><?=$hirer->short_desc?></p>

            <ul class="details cols-3">
                <li>
                    <i class="fa fa-map-marker"></i>
                    <span><?=$hirer->getCity()->one()->name.', '.$hirer->address?></span>
                </li>

                <li>
                    <i class="fa fa-globe"></i>
                    <a href="#"><?=$hirer->site?></a>
                </li>

                <li>
                    <i class="fa fa-users"></i>
                    <span>штат: <?=$hirer->people?> человек</span>
                </li>

                <li>
                    <i class="fa fa-birthday-cake"></i>
                    <span>Год основания: <?=$hirer->year_begin?></span>
                </li>

                <li>
                    <i class="fa fa-phone"></i>
                    <span><?=$hirer->telephone?></span>
                </li>

                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="#"><?=$hirer->email?></a>
                </li>
            </ul>

            <div class="button-group">
<!--                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>-->

                <div class="action-buttons">
                    <a class="btn btn-gray" href="#">Favorite</a>
                    <a class="btn btn-success" href="#">Contact</a>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- END Page header -->


<!-- Main container -->
<main>


    <!-- Company detail -->
    <section>
        <div class="container">

            <header class="section-header">
                <h2>О компании</h2>
            </header>

            <p><?=$hirer->description?></p>


        </div>
    </section>
    <!-- END Company detail -->


    <!-- Open positions -->
    <section id="open-positions" class="bg-alt">
        <div class="container">
            <header class="section-header">
                <h2>Открытые вакансии</h2>
            </header>

            <div class="row">
                <div class="col-xs-12">
                    <br>
                    <h5>Найдено <strong><?=$count?></strong> вакансий</h5>
                </div>

                <!-- Page navigation -->
                <nav class="text-center">
                    <?=LinkPager::widget(['pagination' => $pages,])?>
                </nav>
                <!-- END Page navigation -->
                <?php

                foreach ($models as $model) {
                    ?>
                    <!-- Job item -->
                    <div class="col-xs-12">
                        <a class="item-block" href="<?= yii\helpers\Url::to(['vacancy/vacancy','id' => $model->id])?>">
                            <header>
                                <img src="assets/img/logo-google.jpg" alt="">
                                <div class="hgroup">
                                    <h4><?= $model->name ?></h4>
                                    <h5><?= $model->getHirer()->one()->name_hirer ?><span class="label label-success">занятость: <?=$model->getTypeWorkTime()->one()->type_work?></span></h5>
                                </div>
                                <time datetime="<?=$model->date_public?>"><?=Yii::$app->formatter->asDate($model->date_public)?></time>
                            </header>

                            <div class="item-body">
                                <p><?= $model->shortDiscription ?></p>
                            </div>

                            <footer>
                                <ul class="details cols-3">
                                    <li>
                                        <i class="fa fa-map-marker"></i>
                                        <span><?=$model->getCity()->one()->name.", ".$model->adress?></span>
                                    </li>

                                    <li>
                                        <i class="fa fa-money"></i>
                                        <span><?=$model->wage?> <?=$model->getCurrency()->one()->name?></span>
                                    </li>

                                    <li>
                                        <i class="fa fa-briefcase"></i>
                                        <span>занятость: <?=$model->getTypeWorkTime()->one()->type_work?></span>
                                    </li>
                                </ul>
                            </footer>
                        </a>
                    </div>
                    <?php
                }
                ?>
                <!-- END Job item -->
                <!-- Page navigation -->
                <nav class="text-center">
                    <?=LinkPager::widget(['pagination' => $pages,])?>
                </nav>
                <!-- END Page navigation -->


            </div>

        </div>
    </section>
    <!-- END Open positions -->


</main>
<!-- END Main container -->