<?php
/**
 * Created by PhpStorm.
 * User: madim
 * Date: 24.12.2017
 * Time: 15:12
 */

namespace app\controllers;


use app\models\Hirer;
use app\models\User;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex(){
        return $this->render('index',[
           'model_'=> new Hirer()
        ]);
    }
}