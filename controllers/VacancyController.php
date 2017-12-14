<?php
/**
 * Created by PhpStorm.
 * User: madim
 * Date: 13.12.2017
 * Time: 20:37
 */

namespace app\controllers;


use app\models\Vacancy;
use yii\web\Controller;

class VacancyController extends Controller
{
    public function actionVacancylist()
    {


        return $this->render('vacancylist');
    }

    public function actionVacancy($id){

        $vacancy =  Vacancy::findOne(['id'=>$id]);
        echo "<pre>".print_r($vacancy->name,true)."</pre>";
        return $this->render('vacancy',['vacancy'=>$vacancy]);
    }
}