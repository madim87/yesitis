<!-- Page header -->
<header class="page-header bg-img size-lg" style="background-image: url(assets/img/bg-banner2.jpg)">
    <div class="container">
        <div class="header-detail">
            <img class="logo" src="assets/img/logo-google.jpg" alt="">
            <div class="hgroup">
                <h1><?=$vacancy->name?></h1>
                <h3><a href="#"><?=$vacancy->getHirer()->one()->name_hirer?></a></h3>
            </div>
            <?php
            Yii::$app->formatter->locale = 'ru-RU';
            ?>
            <time datetime="<?=$vacancy->date_public?>"><?=Yii::$app->formatter->asDate($vacancy->date_public)?></time>
            <hr>
            <p class="lead"><?=$vacancy->shortDiscription?></p>

            <ul class="details cols-3">
                <li>
                    <i class="fa fa-map-marker"></i>
                    <span><?=$vacancy->getCity()->one()->name.", ".$vacancy->adress?></span>
                </li>

                <li>
                    <i class="fa fa-briefcase"></i>
                    <span>занятость: <?=$vacancy->getTypeWorkTime()->one()->type_work?></span>
                </li>

                <li>
                    <i class="fa fa-money"></i>
                    <span><?=$vacancy->wage?> <?=$vacancy->getCurrency()->one()->name?></span>
                </li>

                <li>
                    <i class="fa fa-clock-o"></i>
                    <span><?=$vacancy->work_time?> ч/нед.</span>
                </li>

                <li>
                    <i class="fa fa-flask"></i>
                    <span>опыт работы: <?=$vacancy->getVacExperience()->one()->value?></span>
                </li>

                <li>
                    <i class="fa fa-certificate"></i>
                    <a href="#"><?=$vacancy->getSkillStatus()->one()->status?></a>
                </li>
            </ul>

            <div class="button-group">


                <div class="action-buttons">
                    <a class="btn btn-success" href="#">Откликнуться</a>
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

            <p><?=$vacancy->discription?></p>

            <br>
            <h4>Требования</h4>
            <p>
                <?=$vacancy->demands?>
            </p>

            <br>
            <h4>Условия труда</h4>
            <p>
                <?=$vacancy->conditions?>
            </p>

        </div>
    </section>
    <!-- END Job detail -->

</main>

<!-- END Main container -->