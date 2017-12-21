<?php
/**
 * Created by PhpStorm.
 * User: madim
 * Date: 13.12.2017
 * Time: 20:37
 */

namespace app\controllers;


use app\models\Category;
use app\models\City;
use app\models\Region;
use app\models\SkillStatus;
use app\models\TypeWorkTime;
use app\models\Vacancy;
use yii\data\Pagination;
use yii\web\Controller;


class VacancyController extends Controller
{
    public function actionVacancylist()
    {
//==========формирование условий для фильтра занятости и категории
        if($_GET['typeTime']) {
            $params['type_work_id'] = $_GET['typeTime'];
        }
        if($_GET['profObl']){
            $params['id_category'] = $_GET['profObl'];
        }
//==========формирование запроса для пагинации + джоин таблицы вакансий и городов +
// =========проверка по условию занятости и категории
        $query = Vacancy::find()
            ->select([
                'vacancy.id',
                'vacancy.discription',
                'vacancy.id_hirer',
                'vacancy.id_category',
                'vacancy.date_public',
                'vacancy.shortDiscription',
                'vacancy.name',
                'vacancy.demands',
                'vacancy.conditions',
                'vacancy.work_time',
                'vacancy.wage',
                'vacancy.experience_id',
                'vacancy.currency_id',
                'vacancy.type_work_id',
                'vacancy.status_id',
                'vacancy.adress',
                'vacancy.id_city',
                'city.id_region'])
            ->join('LEFT JOIN', 'city', 'vacancy.id_city=city.id')
            ->where($params);
//==========формирование условий для фильтра по ключевым словам
        if($_GET['keyword']){
            $tester = explode(' ',$_GET['keyword']);
            $paramKey = [
                'like',
                'shortDiscription',
                $tester
            ];
            $query = $query->andWhere($paramKey);
        }
//==========формирование условий для фильтра по зарплате
        if($_GET['wage']){
            switch ($_GET['wage']){
                case 1:
                    $paramWage = [
                        'between',
                        'wage',
                        0,
                        200
                    ];
                    break;
                case 2:
                    $paramWage = [
                        'between',
                        'wage',
                        200,
                        500
                    ];
                    break;
                case 3:
                    $paramWage = [
                        'between',
                        'wage',
                        500,
                        1000
                    ];
                    break;
                case 4:
                    $paramWage = [
                        '>',
                        'wage',
                        1000
                    ];
                    break;
            }
            $query = $query->andWhere($paramWage);
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
//==========формирование условий для фильтра по ключевым словам
        $query = $query->orderBy(['id' => SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=>3]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->all();
        $cnt = $countQuery->count();
//==========параметры для передачи во view
        $contract = TypeWorkTime::find()->all();
        $category = Category::find()->all();
        $region = Region::find();
        $regionJoin = Vacancy::find()
            ->select([
                'vacancy.id',
                'vacancy.name',
                'city.name',
                'city.id_region'
            ])
            ->join('INNER JOIN', 'city', 'vacancy.id_city=city.id');
        $city = City::find();
        $vacancies = Vacancy::find();
        $cntVac = Vacancy::find()->count();
        return $this->render('vacancylist',[
            'models' => $models,
            'pages' => $pages,
            'contracts' => $contract,
            'vacancies' => $vacancies,
            'categories' => $category,
            'count' => $cnt,
            'regions' => $region,
            'regionJoins'=> $regionJoin,
            'cities' => $city,
            'cntVac' => $cntVac
            ]);
    }

    public function actionVacancy($id){
        //Yii::$app->formatter->locale = 'ru-RU';
        $vacancy =  Vacancy::findOne(['id'=>$id]);
        return $this->render('vacancy',['vacancy'=>$vacancy]);
    }

}