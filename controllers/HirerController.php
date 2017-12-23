<?php
/**
 * Created by PhpStorm.
 * User: madim
 * Date: 23.12.2017
 * Time: 14:52
 */

namespace app\controllers;

use app\models\Hirer;
use app\models\Vacancy;
use Faker\Provider\Company;
use yii\web\Controller;
use yii\data\Pagination;
class HirerController extends Controller
{
    public function actionHirerlist()
    {
        $vacancies = Vacancy::find();
        $query = Hirer::find()
            ->orderBy(['id'=>SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=>3]);
        $hirers = $query->offset($pages->offset)->limit($pages->limit)->all();
        $cnt = $countQuery->count();

        return $this->render('hirerlist',[
            'hirers'=>$hirers,
            'pages'=>$pages,
            'cnt'=>$cnt,
            'vacancies'=>$vacancies
        ]);
    }

    public function actionHirer($id)
    {
        $hirer = Hirer::findOne(['id'=>$id]);
        $query = Vacancy::find()
            ->where(['id_hirer'=>$id])
            ->orderBy(['id'=>SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=>3]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->all();
        $cnt = $countQuery->count();
        return $this->render('hirer',[
            'hirer'=>$hirer,
            'models'=>$models,
            'pages'=>$pages,
            'count'=>$cnt
        ]);
    }

}