<?php

/* @var $this yii\web\View */

$this->title = 'Summaries';
use yii\widgets\LinkPager;
use app\models\Aspirant;
use app\models\Summary;
use yii\web\Controller;
//$technology = $allSummary[4]->getTechnology()->one()->technology;
//echo "<pre>".print_r($technology,true)."</pre>";

?>


<!-- Page header -->
<header class="page-header bg-img" style="background-image: url(assets/img/bg-banner1.jpg);">
    <div class="container page-name">
        <h1 class="text-center">Просмотр резюме</h1>
        <p class="lead text-center">Используйте фильтр для быстрого поиска</p>
    </div>

    <div class="container">
        <form action="#" method="get">

            <div class="row">
                <div class="form-group col-xs-12 col-sm-12">
                    <input type="text" class="form-control" name="keyword" placeholder="Введите ключевые слова для поиска">
                </div>

                <div class="form-group col-xs-12 col-sm-3">
                    <h6>Опыт работы</h6>
                    <div class="checkall-group">

                        <div class="radio">
                            <input type="radio" id="exp0" name="experience" value="0" checked>
                            <label for="exp0">Любой <small>(<?=$cntSum?>)</small></label>
                        </div>


                        <?php

                        foreach ($experience as $exp) {

                            ?>
                            <div class="radio">
                                <input type="radio" id="exp<?=$exp->id?>" name="experience" value="<?=$exp->id?>">
                                <label for="exp<?=$exp->id?>"><?=$exp->value?><small>(<?=$summary->where(['id_experience'=>$exp->id])->count()?>)</small></label>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>


                <div class="form-group col-xs-12 col-sm-3">
                    <h6>Профобласть</h6>
                    <div class="checkall-group">
                        <div class="radio">
                            <input type="radio" id="cat0" name="profObl" value="0" checked>
                            <label for="cat0">Любая<small>(<?=$cntSum?>)</small></label>
                        </div>
                        <?php
                        foreach ($category as $cat)
                        {
                            ?>
                            <div class="radio">
                                <input type="radio" id="cat<?=$cat->id?>" name="profObl" value="<?=$cat->id?>">
                                <label for="cat<?=$cat->id?>"><?=$cat->name_category?><small>(<?=$summary->where(['id_cat'=>$cat->id])->count()?>)</small></label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>


                <div class="form-group col-xs-12 col-sm-3">
                    <h6>Тип занятости</h6>
                    <div class="radio">
                        <input type="radio" name="typework" id="typework0" value="0" checked>
                        <label for="typework0">Любая<small>(<?=$cntSum?>)</small></label>
                    </div>
                    <?php
                    foreach ($typeWork as $type)
                    {
                        ?>
                        <div class="radio">
                            <input type="radio" name="typework" id="typework<?=$type->id?>" value="<?=$type->id?>">
                            <label for="typework<?=$type->id?>"><?=$type->type_work?><small>(<?=$summary->where(['type_work_id'=>$type->id])->count()?>)</small></label>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <div class="form-group col-xs-12 col-sm-3">
                    <h6>Регион</h6>
                    <div class="checkall-group">
                        <?php
                        foreach ($regions->all() as $region) {
                            ?>
                            <div class="checkbox">
                                <input type="checkbox" id="reg<?= $region->id?>" name="region[<?= $region->id?>]" value="<?= $region->id?>">
                                <label for="reg<?= $region->id?>"><?= $region->region?> <small>(<?=$regionJoin->where(['city.id_region'=>$region->id])->count()?>)</small></label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>


            </div>

            <div class="button-group">
                <div class="action-buttons">
                    <button class="btn btn-primary">Применить фильтр</button>
                </div>
            </div>

        </form>

    </div>

</header>
<!-- END Page header -->


<!-- Main container -->
<main>
    <section class="no-padding-top bg-alt">
        <div class="container">
            <div class="row">

                <div class="col-xs-12">
                    <br>
                    <h5>Найдено  <strong><?=$count?></strong> резюме</h5>
                </div>

                <!-- Page navigation -->
                <nav class="text-center">
                    <?=LinkPager::widget(['pagination' => $pages,])?>
                </nav>
                <!-- END Page navigation -->

                <?php
                foreach ($allSummary as $summary){
/*-------------*/ $technology = $summary->getTechnology()->one()->technology;
//                echo "<pre>".print_r($technology,true)."</pre>";
                ?>
                <!-- Resume detail -->
                <div class="col-xs-12">
                    <a class="item-block" href="resume-detail.html">

                        <header>
                            <img class="resume-avatar" src="assets/img/avatar.jpg" alt="">
                            <div class="hgroup">
                                <h4><?=$summary->getAspirant()->one()->name." ".$summary->getAspirant()->one()->surname?></h4>
                                <h5><?=$summary->name?></h5>
                            </div>
                        </header>

                        <div class="item-body">
                            <p><?=$summary->discription?></p>

                            <div class="tag-list">
                                <?php
  //                              foreach ($technologies as $technology) {
                                ?>
                                    <span><?=$technology?></span>
                                <?php
 //                               }
                                ?>
                            </div>
                        </div>

                        <footer>
                            <ul class="details cols-3">
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <span><?=$summary->aspirant->city->name.", ".$summary->getAspirant()->one()->address?></span>
                                </li>

                                <li>
                                    <i class="fa fa-money"></i>
                                    <span><?=$summary->wage." ".$summary->getCurrency()->one()->name?></span>
                                </li>

                                <li>
                                    <i class="fa fa-certificate"></i>
                                    <span>Занятость: <?=$summary->getTypeWorkTime()->one()->type_work?></span>
                                </li>
                            </ul>
                        </footer>
                    </a>

                </div>
                <?php

                }
                ?>
                <!-- END Resume detail -->
            </div>


            <!-- Page navigation -->
            <nav class="text-center">
                <?=LinkPager::widget(['pagination' => $pages,])?>
            </nav>
            <!-- END Page navigation -->


        </div>
    </section>
</main>
<!-- END Main container -->
<script src="assets/js/app.min.js"></script>
<script src="assets/js/custom.js"></script>
