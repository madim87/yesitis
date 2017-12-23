<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

?>

<!-- Site header -->
<header class="site-header size-lg text-center" style="background-image: url(img/bg-banner1.jpg)">
    <div class="container">
        <div class="col-xs-12">
            <br><br>
            <h2><mark><?= $cntVacancy?></mark> <?= $word?> здесь и сейчас!</h2>
            <h5 class="font-alt">найди свою работу за пару минут</h5>
            <br><br><br>
            <span>
                <div >
                    <p class="text-center"><a class="btn btn-info" href="job-list.html">разместить резюме</a></p>
                    <p class="text-center"><a class="btn btn-info" href="<?=yii\helpers\Url::to(['vacancy/vacancyadd'])?>">опубликовать вакансию</a></p>

                </div>
            </span>


        </div>

    </div>
</header>
<!-- END Site header -->
<main>
    <!-- Recent jobs -->
    <section>
        <div class="container">
            <header class="section-header">
                <span>новое</span>
                <h2>Последние вакансии</h2>
            </header>

            <div class="row item-blocks-connected">
            <?php
                foreach ($vacanciesAll as $vacancy) {

                    ?>
                    <!-- Job item -->
                    <div class="col-xs-12">
                        <a class="item-block" href="<?= yii\helpers\Url::to(['vacancy/vacancy','id' => $vacancy->id])?>">
                            <header>
                                <img src="img/logo-google.jpg" alt="">
                                <div class="hgroup">
                                    <h4><?= $vacancy->shortDiscription?></h4>
                                    <h5><?= $vacancy->getHirer()->one()->name_hirer ?></h5>
                                </div>
                                <div class="header-meta">
                                    <span class="location"><?= $vacancy->getHirer()->one()->address ?></span>
                                    <span class="label label-success">Full-time</span>
                                </div>
                            </header>
                        </a>
                    </div>
                    <?php
                }
                ?>
                <!-- END Job item -->

            </div>

            <br><br>
            <p class="text-center"><a class="btn btn-info" href="<?= yii\helpers\Url::to(['vacancy/vacancylist'])?>">все вакансии</a></p>
        </div>
    </section>
    <!-- END Recent jobs -->


    <!-- Facts -->
    <section class="bg-img bg-repeat no-overlay section-sm" style="background-image: url(img/bg-pattern.png)">
        <div class="container">

            <div class="row">
                <div class="counter col-md-3 col-sm-6">
                    <p><span data-from="0" data-to="6890"></span>+</p>
                    <h6>Jobs</h6>
                </div>

                <div class="counter col-md-3 col-sm-6">
                    <p><span data-from="0" data-to="1200"></span>+</p>
                    <h6>Members</h6>
                </div>

                <div class="counter col-md-3 col-sm-6">
                    <p><span data-from="0" data-to="36800"></span>+</p>
                    <h6>Resume</h6>
                </div>

                <div class="counter col-md-3 col-sm-6">
                    <p><span data-from="0" data-to="15400"></span>+</p>
                    <h6>Company</h6>
                </div>
            </div>

        </div>
    </section>
    <!-- END Facts -->



    <!-- Categories -->
    <section class="bg-alt">
        <div class="container">
            <header class="section-header">
                <span>Categories</span>
                <h2>Popular categories</h2>
                <p>Here's the most popular categories</p>
            </header>

            <div class="category-grid">
                <a href="job-list-1.html">
                    <i class="fa fa-laptop"></i>
                    <h6>Technology</h6>
                    <p>Designer, Developer, IT Service, Front-end developer, Project management</p>
                </a>

                <a href="job-list-2.html">
                    <i class="fa fa-line-chart"></i>
                    <h6>Accounting</h6>
                    <p>Finance, Tax service, Payroll manager, Book keeper, Human resource</p>
                </a>

                <a href="job-list-3.html">
                    <i class="fa fa-medkit"></i>
                    <h6>Medical</h6>
                    <p>Doctor, Nurse, Hospotal, Dental service, Massagist</p>
                </a>

                <a href="job-list-1.html">
                    <i class="fa fa-cutlery"></i>
                    <h6>Food</h6>
                    <p>Restaurant, Food service, Coffe shop, Cashier, Waitress</p>
                </a>

                <a href="job-list-2.html">
                    <i class="fa fa-newspaper-o"></i>
                    <h6>Media</h6>
                    <p>Journalism, Newspaper, Reporter, Writer, Cameraman</p>
                </a>

                <a href="job-list-3.html">
                    <i class="fa fa-institution"></i>
                    <h6>Government</h6>
                    <p>Federal, Law, Human resource, Manager, Biologist</p>
                </a>
            </div>

        </div>
    </section>
    <!-- END Categories -->


    <!-- Newsletter -->
    <section class="bg-img text-center" style="background-image: url(img/bg-facts.jpg)">
        <div class="container">
            <h2><strong>Subscribe</strong></h2>
            <h6 class="font-alt">Get weekly top new jobs delivered to your inbox</h6>
            <br><br>
            <form class="form-subscribe" action="#">
                <div class="input-group">
                    <input type="text" class="form-control input-lg" placeholder="Your eamil address">
                    <span class="input-group-btn">
                <button class="btn btn-success btn-lg" type="submit">Subscribe</button>
              </span>
                </div>
            </form>
        </div>
    </section>
    <!-- END Newsletter -->


</main>