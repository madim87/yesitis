<?php
/**
 * Created by PhpStorm.
 * User: madim
 * Date: 19.12.2017
 * Time: 20:50
 */

namespace app\controllers;


use app\models\Aspirant;
use app\models\Category;
use app\models\Region;
use app\models\Summary;
use app\models\Technology;
use app\models\TypeWorkTime;
use app\models\VacExperience;
use yii\web\Controller;
use yii\data\Pagination;

class SummaryController extends Controller
{
    public function actionSummarylist(){

        $query = Summary::find()
            ->select([
                'summary.id',
                'summary.discription',
                'summary.id_aspirant',
                'summary.date_public',
                'summary.name',
                'summary.wage',
                'summary.currency_id',
                'summary.type_work_id',
                'summary.id_experience',
                'summary.id_cat',
                'aspirant.id',
                'aspirant.name',
                'aspirant.surname',
                'aspirant.address',
                'aspirant.id_city',
                'city.id_region'
            ])
            ->join('LEFT JOIN','aspirant','summary.id_aspirant=aspirant.id')
            ->join('LEFT JOIN','city','aspirant.id_city=city.id');

        if($_GET['experience']) {
            $params['id_experience'] = $_GET['experience'];
        }
        if($_GET['profObl']){
            $params['id_cat'] = $_GET['profObl'];
        }
        if($_GET['typework']){
            $params['type_work_id'] = $_GET['typework'];
        }
        $query = $query->where($params);
        if($_GET['keyword']){
            $tester = explode(' ',$_GET['keyword']);
            $paramKey = [
                'like',
                'discription',
                $tester
            ];
            $query = $query->andWhere($paramKey);
        }
//==========формирование условий для фильтра по регионам
        if($_GET['region']){
            $i = 0;
            foreach ($_GET['region'] as $value){
                $reg[$i] = $value;
                $i++;
            }
            $paramReg = [
                'in',
                'id_region',
                $reg

            ];
            $query = $query->andWhere($paramReg);
        }

        $experience = VacExperience::find()->all();
        $summary = Summary::find();
        $cntSumm = Summary::find()->count();
        $category = Category::find()->all();
        $typeWork = TypeWorkTime::find()->all();
        $regions = Region::find();
        $regionJoin = Summary::find()
            ->select([
                'summary.id',
                'summary.id_aspirant',
                'aspirant.id',
                'aspirant.id_city'
            ])
            ->join('LEFT JOIN', 'aspirant', 'summary.id_aspirant=aspirant.id')
            ->join('LEFT JOIN','city','aspirant.id_city=city.id');


        $query = $query
            ->with('aspirant.city')
            ->orderBy(['date_public'=>SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=>3]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->all();
        $cnt = $countQuery->count();

        return $this->render('summarylist',[

            'allSummary' => $models,
            'pages' => $pages,
            'count' => $cnt,
            'experience' => $experience,
            'summary' => $summary,
            'category' => $category,
            'typeWork' => $typeWork,
            'regions' => $regions,
            'regionJoin' => $regionJoin,
            'cntSum' => $cntSumm
        ]);
    }
}