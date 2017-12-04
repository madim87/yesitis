<?php

namespace app\modules\controllers;

use yii\web\Controller;


/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public $layout = adminlayout;
    public function actionIndex()
    {
        return $this->render('index');
    }
}