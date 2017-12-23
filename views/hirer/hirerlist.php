<?php
/**
 * Created by PhpStorm.
 * User: madim
 * Date: 23.12.2017
 * Time: 14:49
 */
use yii\widgets\LinkPager;
?>

<!-- Page header -->
<header class="page-header bg-img" style="background-image: url(img/bg-banner1.jpg);">
    <div class="container page-name">
        <h1 class="text-center">Каталог компаний</h1>
<!--        <p class="lead text-center">Используйте фильтр для быстрого поиска</p>  -->
    </div>
<!--    <div class="container">
        <form action="#">

            <div class="row">
                <div class="form-group col-xs-12 col-sm-4">
                    <input type="text" class="form-control" placeholder="Keyword">
                </div>

                <div class="form-group col-xs-12 col-sm-4">
                    <input type="text" class="form-control" placeholder="Location">
                </div>

                <div class="form-group col-xs-12 col-sm-4">
                    <select class="form-control selectpicker" multiple>
                        <option selected>All categories</option>
                        <option>Developer</option>
                        <option>Designer</option>
                        <option>Customer service</option>
                        <option>Finance</option>
                        <option>Healthcare</option>
                        <option>Sale</option>
                        <option>Marketing</option>
                        <option>Information technology</option>
                        <option>Others</option>
                    </select>
                </div>

            </div>

            <div class="button-group">
                <div class="action-buttons">
                    <button class="btn btn-primary">Apply filter</button>
                </div>
            </div>

        </form>

    </div> -->

</header>
<!-- END Page header -->


<!-- Main container -->
<main>
    <section class="no-padding-top bg-alt">
        <div class="container">
            <div class="row">

                <div class="col-xs-12">
                    <br>
                    <h5>Найдено <strong><?=$cnt?></strong> компаний</h5>
                </div>

                <!-- Page navigation -->
                <nav class="text-center">
                    <?=LinkPager::widget(['pagination' => $pages,])?>
                </nav>
                <!-- END Page navigation -->

                <!-- Company detail -->
                <?php
                foreach ($hirers as $hirer) {
                    ?>
                    <div class="col-xs-12">
                        <a class="item-block" href="<?=yii\helpers\Url::to(['hirer/hirer','id' => $hirer->id])?>">
                            <header>
                                <img src="assets/img/logo-google.jpg" alt="">
                                <div class="hgroup">
                                    <h4><?=$hirer->name_hirer?></h4>
                                    <h5><?=$hirer->working?></h5>
                                </div>
                                <span class="open-position"><?=$vacancies->where(['id_hirer'=>$hirer->id])->count()?> открытых вакансий</span>
                            </header>

                            <div class="item-body">
                                <p><?=$hirer->short_desc?></p>
                            </div>
                        </a>
                    </div>
                    <?php
                }
                ?>
                <!-- END Company detail -->

                <!-- Page navigation -->
                <nav class="text-center">
                    <?=LinkPager::widget(['pagination' => $pages,])?>
                </nav>
                <!-- END Page navigation -->

            </div>
        </div>
    </section>
</main>
<!-- END Main container -->
