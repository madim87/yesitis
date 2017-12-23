<?php
/**
 * Created by PhpStorm.
 * User: madim
 * Date: 19.12.2017
 * Time: 20:52
 */
$this->title = 'Summary';
?>
<!-- Page header -->
<header class="page-header bg-img" style="background-image: url(assets/img/bg-banner1.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <img src="assets/img/avatar.jpg" alt="">
            </div>

            <div class="col-xs-12 col-sm-8 header-detail">
                <div class="hgroup">
                    <h1><?=$summary->getAspirant()->one()->name.' '.$summary->getAspirant()->one()->patronymic.' '.$summary->getAspirant()->one()->surname?></h1>
                    <h3><?=$summary->name?></h3>
                </div>
                <hr>
                <p class="lead"><?=$summary->discription?></p>

                <ul class="details cols-2">
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <span><?=$city->name.', '.$summary->getAspirant()->one()->address?></span>
                    </li>
                    <?php
                        if($summary->getAspirant()->one()->site){
                            $hid = " ";
                            $class = "fa fa-globe";
                        }else{
                            $hid = "hidden";
                            $class = "none";
                        }
                    ?>
                    <li>
                        <i class="<?=$class?>"></i>
                        <a href="#" <?=$hid?>><?=$summary->getAspirant()->one()->site?></a>
                    </li>

                    <li>
                        <i class="fa fa-money"></i>
                        <span><?=$summary->wage.' '.$summary->getCurrency()->one()->name?></span>
                    </li>

                    <li>
                        <i class="fa fa-birthday-cake"></i>
                        <span>возраст: <?=$summary->getAspirant()->one()->age?></span>
                    </li>

                    <li>
                        <i class="fa fa-phone"></i>
                        <span><?=$summary->getAspirant()->one()->telephone?></span>
                    </li>

                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="#"><?=$summary->getAspirant()->one()->email?></a>
                    </li>
                </ul>

                <div class="tag-list">
                    <?php
                    $tech = $summary->getTechnology()->all();
//                    echo "<pre>".print_r($summary->getAspirant()->one(),true)."</pre>";
 //                   echo "<pre>".print_r($tech,true)."</pre>";
                    $skills = $summary->getTechnology()->all();
                    foreach ($skills as $skill) {
                        ?>
                        <span><?=$skill->technology?></span>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="button-group">
            <ul class="social-icons">
                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>

            <div class="action-buttons">
                <a class="btn btn-gray" href="#">Download CV</a>
                <a class="btn btn-success" href="#">Contact me</a>
            </div>
        </div>
    </div>
</header>
<!-- END Page header -->


<!-- Main container -->
<main>


    <!-- Education -->
    <section>
        <div class="container">

            <header class="section-header">

                <h2>Образование</h2>
            </header>
            <?php
            foreach ($educations as $education)
            {
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>

                            <div class="hgroup">
                                <h4><?=$education->specialization?>
                                    <small><?=$education->department?></small>
                                </h4>
                                <h5><?=$education->educ_institution?></h5>
                            </div>
                            <h6 class="time"><?=Yii::$app->formatter->asDate($education->time_start)."-".Yii::$app->formatter->asDate($education->time_finish)?></h6>
                        </header>
                        <div class="item-body">
                            <p><?=$education->achive?></p>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>

        </div>
    </section>
    <!-- END Education -->


    <!-- Work Experience -->
    <section class="bg-alt">
        <div class="container">
            <header class="section-header">

                <h2>Опыт работы</h2>
            </header>

            <div class="row">

                <!-- Work item -->
                <div class="col-xs-12">
                    <?php
                    foreach ($experiences as $experience) {
                        ?>
                        <div class="item-block">
                            <header>
                                <div class="hgroup">
                                    <h4><?=$experience->exwork?></h4>
                                    <h5><?=$experience->position?></h5>
                                </div>
                                <h6 class="time"><?=Yii::$app->formatter->asDate($experience->time_start)."-".Yii::$app->formatter->asDate($experience->time_finish)?></h6>
                            </header>
                            <div class="item-body">
                                <p><?=$experience->responsibilities?></p>

                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <!-- END Work item -->
            </div>

        </div>
    </section>
    <!-- END Work Experience -->


    <!-- Skills -->
    <section>
        <div class="container">
            <header class="section-header">
                <span>Expertise Areas</span>
                <h2>Skills</h2>
            </header>

            <br>
            <ul class="skills cols-3">
                <li>
                    <div>
                        <span class="skill-name">HTML</span>
                        <span class="skill-value">100%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%;"></div>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="skill-name">CSS</span>
                        <span class="skill-value">95%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 95%;"></div>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="skill-name">Javascript</span>
                        <span class="skill-value">80%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 80%;"></div>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="skill-name">Photoshop</span>
                        <span class="skill-value">60%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 60%;"></div>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="skill-name">ReactJS</span>
                        <span class="skill-value">70%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 70%;"></div>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="skill-name">Team work</span>
                        <span class="skill-value">90%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 90%;"></div>
                    </div>
                </li>
            </ul>

        </div>
    </section>
    <!-- END Skills -->


</main>
<!-- END Main container -->

