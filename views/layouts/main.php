<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\Aspirant;
use app\models\Hirer;
use app\models\Summary;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Post a job position or create your online resume by TheJobs!">
    <meta name="keywords" content="">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <!-- Styles -->


    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="assets/img/favicon.ico">
    <?php $this->head() ?>
</head>

<body class="nav-on-header">
<?php $this->beginBody() ?>

<!-- Navigation bar -->
<nav class="navbar">
    <div class="container">

        <!-- Logo -->
        <div class="pull-left">
            <a class="navbar-toggle" href="#" data-toggle="offcanvas"><i class="ti-menu"></i></a>

            <div class="logo-wrapper">
                <a class="logo" href="<?= Url::to(['site/index'])?>"><img src="img/logo.png" alt="logo"></a>
                <a class="logo-alt" href="<?= Url::to(['site/index'])?>"><img src="img/logo-alt.png" alt="logo-alt"></a>
            </div>

        </div>
        <!-- END Logo -->
<?php

$id_user = Yii::$app->getUser()->id;
$roles = Yii::$app->getAuthManager()->getRolesByUser(Yii::$app->getUser()->id);
$role_hir = $roles['hirer']->name;
$role_asp = $roles['aspirant']->name;
//print_r($role_hir);
//print_r($role_asp);
//print_r($id_user);

if ($role_hir == 'hirer'){
    $id_hirer = Hirer::find()->where(['user_id'=>$id_user])->one()->id;
    if ($id_hirer){
        $url = Url::to(['hirer/hirermanage','id'=>$id_hirer]);
    }else{
        $url = Url::to(['hirer/hireradd','id'=>$id_hirer]);
    }

}elseif ($role_asp == 'aspirant'){
    $id_aspirant = Aspirant::find()->where(['user_id'=>$id_user])->one()->id;
    $id_summary = Summary::find()->where(['id_aspirant'=>$id_aspirant])->one()->id;
    $url = Url::to(['summary/summary','id'=>$id_summary]);
}
//print_r($id_aspirant);
if(Yii::$app->user->isGuest){
    ?>
    <div class="pull-right user-login">
        <a class="btn btn-sm btn-primary" href="<?= Url::to(['auth/login'])?>">Вход</a> или <a href="<?= Url::to(['auth/registr'])?>">регистрация</a>
    </div>
        <?php
}else{
 ?>   <div class="pull-right user-login">
        <a class="btn btn-sm btn-primary" href="<?= Url::to(['auth/logout'])?>" data-method="post">Выход</a>  <a href="<?=$url?>">личный кабинет</a>
    </div>

    <?php

}
?>
        <!-- User account -->

        <!-- END User account -->

        <!-- Navigation menu -->
        <ul class="nav-menu">
            <li>
                <a class="active" href="<?=yii\helpers\Url::to(['site/index'])?>">Главная</a>
                <ul>
                    <li><a class="active" href="<?=yii\helpers\Url::to(['site/index'])?>">На главную</a></li>
                    <li><a href="<?=yii\helpers\Url::to(['site/about'])?>">О проекте</a></li>
                </ul>
            </li>
            <li>
                <a href="<?=yii\helpers\Url::to(['vacancy/vacancylist'])?>">Вакансии</a>
                <ul>
                    <li><a href="<?=yii\helpers\Url::to(['vacancy/vacancylist'])?>">Список вакансий</a></li>
                    <li><a href="<?=yii\helpers\Url::to(['vacancy/vacancyadd'])?>">Опубликовать вакансию</a></li>
                </ul>
            </li>
            <li>
                <a href="<?=yii\helpers\Url::to(['summary/summarylist'])?>">Резюме</a>
                <ul>
                    <li><a href="<?=yii\helpers\Url::to(['summary/summarylist'])?>">Список резюме</a></li>
                    <li><a href="resume-detail.html">Разместить резюме</a></li>
                </ul>
            </li>
            <li>
                <a href="<?=yii\helpers\Url::to(['hirer/hirerlist'])?>">Компании</a>
                <ul>
                    <li><a href="<?=yii\helpers\Url::to(['hirer/hirerlist'])?>">Каталог компаний</a></li>
                    <li><a href="company-detail.html">Добавить компанию</a></li>
                </ul>
            </li>
<!--            <li>
                <a href="#">Pages</a>
                <ul>
                    <li><a href="page-about.html">About</a></li>
                    <li><a href="page-contact.html">Contact</a></li>
                    <li><a href="page-faq.html">FAQ</a></li>
                    <li><a href="page-pricing.html">Pricing</a></li>
                    <li><a href="page-typography.html">Typography</a></li>
                    <li><a href="page-ui-elements.html">UI elements</a></li>
                </ul>
            </li> -->
        </ul>
        <!-- END Navigation menu -->

    </div>
</nav>
<!-- END Navigation bar -->



<div class="container">

</div>

<!-- Main container -->
<?= $content ?>
<!-- END Main container -->


<!-- Site footer -->
<footer class="site-footer">

    <!-- Top section -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6>About</h6>
                <p class="text-justify">An employment website is a web site that deals specifically with employment or careers. Many employment websites are designed to allow employers to post job requirements for a position to be filled and are commonly known as job boards. Other employment sites offer employer reviews, career and job-search advice, and describe different job descriptions or employers. Through a job website a prospective employee can locate and fill out a job application.</p>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Company</h6>
                <ul class="footer-links">
                    <li><a href="page-about.html">About us</a></li>
                    <li><a href="page-typography.html">How it works</a></li>
                    <li><a href="page-faq.html">Help center</a></li>
                    <li><a href="page-typography.html">Privacy policy</a></li>
                    <li><a href="page-contact.html">Contact us</a></li>
                </ul>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Trendeing jobs</h6>
                <ul class="footer-links">
                    <li><a href="job-list.html">Front-end developer</a></li>
                    <li><a href="job-list.html">Android developer</a></li>
                    <li><a href="job-list.html">iOS developer</a></li>
                    <li><a href="job-list.html">Full stack developer</a></li>
                    <li><a href="job-list.html">Project administrator</a></li>
                </ul>
            </div>
        </div>

        <hr>
    </div>
    <!-- END Top section -->

    <!-- Bottom section -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyrights © 2016 All Rights Reserved by <a href="http://themeforest.net/user/shamsoft">ShaMSofT</a>.</p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END Bottom section -->

</footer>
<!-- END Site footer -->


<!-- Back to top button -->
<a id="scroll-up" href="#"><i class="ti-angle-up"></i></a>
<!-- END Back to top button -->

<!-- Scripts -->



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
