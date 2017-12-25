<?php
/**
 * Created by PhpStorm.
 * User: madim
 * Date: 25.12.2017
 * Time: 0:42
 */

namespace app\controllers;


use app\models\News;
use app\models\Vacancy;
use Yii;
use yii\base\Exception;
use yii\web\Controller;

class NewsController extends Controller
{
    public  function actionRecord($id=null){
        if($id){
            $record = News::findOne($id);
        }else {
            $record = new News();
        }
        if($record->load(\Yii::$app->request->post())){
            if($record->validate()){
                $record->save();
                Yii::$app->getSession()->setFlash('msg', 'ytdydydty');
            }else{
                Yii::$app->getSession()->setFlash('error', ['Error 1', 'Error 2']);
            }
        }
       return $this->render('record',[
           'model'=>$record
       ]);
    }
}