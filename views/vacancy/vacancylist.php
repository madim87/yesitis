<?php

/* @var $this yii\web\View */

$this->title = 'Vacancies';
use yii\widgets\LinkPager;
?>
<!-- Page header -->
    <header class="page-header bg-img" style="background-image: url(assets/img/bg-banner1.jpg);">
      <div class="container page-name">
        <h1 class="text-center">Просмотр вакансий</h1>
        <p class="lead text-center">Используйте фильтр для быстрого поиска</p>
      </div>

      <div class="container">
        <form action="#" method="get">

          <div class="row">
            <div class="form-group col-xs-12 col-sm-12">
              <input type="text" class="form-control" name="keyword" placeholder="Введите ключевые слова для поиска">
            </div>

            <div class="form-group col-xs-12 col-sm-3">
                  <h6>Регион</h6>
                  <div class="checkall-group">
                      <?php
                      foreach ($regions->all() as $region) {
                          ?>
                          <div class="checkbox">
                              <input type="checkbox" id="reg<?= $region->id?>" name="region[<?= $region->id?>]" value="<?= $region->id?>">
                              <label for="reg<?= $region->id?>"><?= $region->region?> <small>(<?=$regionJoins->where(['city.id_region'=>$region->id])->count()?>)</small></label>
                          </div>
                          <?php
                      }
                      ?>
                  </div>
              </div>


            <div class="form-group col-xs-12 col-sm-3">
              <h6>Тип занятости</h6>
              <div class="checkall-group">
                  <div class="radio">
                      <input type="radio" id="0" name="typeTime" value="0" checked>
                      <label for="0">Любой <small>(<?= $vacancies->count()?>)</small></label>
                  </div>
                <?php
                foreach ($contracts as $contract) {
                    ?>
                    <div class="radio">
                        <input type="radio" id="type<?= $contract->id?>" name="typeTime" value="<?= $contract->id?>">
                        <label for="type<?= $contract->id?>"><?= $contract->type_work?> <small>(<?= $vacancies->where(['type_work_id'=> $contract->id])->count()?>)</small></label>
                    </div>
                    <?php
                }
                ?>
              </div>
            </div>


            <div class="form-group col-xs-12 col-sm-3">
              <h6>Заработная плата</h6>
              <div class="checkall-group">
                <div class="radio">
                  <input type="radio" id="rete0" name="wage" value="0" checked>
                  <label for="rate0">Любая</label>
                </div>

                <div class="radio">
                  <input type="radio" id="rate1" name="wage" value="1">
                  <label for="rate1">$0 - $200 <small>(<?= $vacancies->where(['between', 'wage', 0, 200])->count()?>)</small></label>
                </div>

                <div class="radio">
                  <input type="radio" id="rate2" name="wage" value="2">
                  <label for="rate2">$200 - $500 <small>(<?= $vacancies->where(['between', 'wage', 201, 500])->count()?>)</small></label>
                </div>

                <div class="radio">
                  <input type="radio" id="rate3" name="wage" value="3">
                  <label for="rate3">$500 - $1000 <small>(<?= $vacancies->where(['between', 'wage', 501, 1000])->count()?>)</small></label>
                </div>

                <div class="radio">
                  <input type="radio" id="rate4" name="wage" value="4">
                  <label for="rate4">$1000+ <small>(<?= $vacancies->where(['between', 'wage', 1001, 5000])->count()?>)</small></label>
                </div>
              </div>
            </div>


            <div class="form-group col-xs-12 col-sm-3">
              <h6>Профобласть</h6>
              <div class="checkall-group">
                <div class="radio">
                  <input type="radio" id="cat0" name="profObl" value="0" checked>
                  <label for="cat0">Любая</label>
                </div>
                  <?php
                  foreach ($categories as $category) {
                      ?>
                      <div class="radio">
                          <input type="radio" id="cat<?= $category->id?>" name="profObl" value="<?= $category->id?>">
                          <label for="cat<?= $category->id?>"><?= $category->name_category?> <small>(<?= $vacancies->where(['id_category'=> $category->id])->count()?>)</small></label>
                      </div>
                      <?php
                  }
                  ?>
              </div>
            </div>


          </div>

          <div class="button-group">
            <div class="action-buttons">
              <button type="submit" class="btn btn-primary">Применить фильтр</button>
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
              <h5>Найдено <strong><?= $count?></strong> вакансий</h5>
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
                    <a class="item-block" href="job-detail.html">
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