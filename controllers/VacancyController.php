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
use app\models\Currency;
use app\models\Region;
use app\models\SkillStatus;
use app\models\TypeWorkTime;
use app\models\Vacancy;
use app\models\VacExperience;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use app\models\Hirer;

class VacancyController extends Controller
{

    public function behaviors()
    {
        return [
           /* 'access' => [
                'class' => AccessControl::className(),
                'only' => ['vacancylist','vacancy','vacancyadd','vacancyedit'],
                'rules' => [
                    [
                        'actions' => ['vacancylist','vacancy'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['vacancyadd','vacancyedit'],
                        'allow' => true,
                        'roles' => ['admin','hirer']
                    ]
                ],
            ],*/
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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
        $query = $query
            ->andWhere(['public'=>1])
            ->orderBy(['id' => SORT_DESC]);
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

    public function actionVacancy($id)
    {
        //Yii::$app->formatter->locale = 'ru-RU';
        $vacancy =  Vacancy::findOne(['id'=>$id]);
        return $this->render('vacancy',['vacancy'=>$vacancy]);
    }

    public function actionVacancyadd()
    {
        if(Yii::$app->getUser()){
            $role = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);
//            var_dump($role);
//            var_dump(Yii::$app->user->id);
           if(empty($role)|| $role->name=='aspirant'){
            //   throw new AccessDeniedException();
           }
        }
        $typeworks = TypeWorkTime::find()->all();
        $items_typework = ArrayHelper::map($typeworks,'id','type_work');
        $cities = City::find()->all();
        $city_params = ArrayHelper::map($cities,'id','name');
        $currencies = Currency::find()->all();
        $items_currency = ArrayHelper::map($currencies,'id','name');
        $vac_experiences = VacExperience::find()->all();
        $items_experience = ArrayHelper::map($vac_experiences,'id','value');
        $skills = SkillStatus::find()->all();
        $items_skills = ArrayHelper::map($skills,'id','status');
        $vakancy = new Vacancy();
        $categories = Category::find()->all();
        $items_categories = ArrayHelper::map($categories,'id','name_category');
        //print_r($_POST);
        if($vakancy->load(Yii::$app->request->post())){
            if($vakancy->validate()){
                $vakancy->save();
            }else {
                return print_r($vakancy->getErrors());
            }
        }
//        print_r($items_skills);
        return $this->render('vacancyadd',[
            'typeworks'=>$typeworks,
            'cities'=>$cities,
            'items_city'=>$city_params,
            'items_typework'=>$items_typework,
            'items_currency'=>$items_currency,
            'items_experience'=>$items_experience,
            'items_skills'=>$items_skills,
            'items_categories'=>$items_categories,
            'currencies'=>$currencies,
            'vacExperiences'=>$vac_experiences,
            'skills'=>$skills,
            'vacancy_mod'=> $vakancy,


        ]);
    }

    public function actionVacancyedit($id)
    {

        $typeworks = TypeWorkTime::find()->all();
        $items_typework = ArrayHelper::map($typeworks,'id','type_work');
        $cities = City::find()->all();
        $city_params = ArrayHelper::map($cities,'id','name');
        $currencies = Currency::find()->all();
        $items_currency = ArrayHelper::map($currencies,'id','name');
        $vac_experiences = VacExperience::find()->all();
        $items_experience = ArrayHelper::map($vac_experiences,'id','value');
        $skills = SkillStatus::find()->all();
        $items_skills = ArrayHelper::map($skills,'id','status');
        $vakancy = Vacancy::findOne(['id'=>$id]);

        //print_r($_POST);
        if($vakancy->load(Yii::$app->request->post())){
            if($vakancy->validate()){
                $vakancy->save();
            }else {
                return print_r($vakancy->getErrors());
            }
        }
        return $this->render('vacancyadd',[
            'typeworks'=>$typeworks,
            'cities'=>$cities,
            'items_city'=>$city_params,
            'items_typework'=>$items_typework,
            'items_currency'=>$items_currency,
            'items_experience'=>$items_experience,
            'items_skills'=>$items_skills,
            'currencies'=>$currencies,
            'vacExperiences'=>$vac_experiences,
            'skills'=>$skills,
            'vacancy_mod'=> $vakancy,


        ]);
    }

    public function actionVacancymanage()
    {
        return $this->render('vacancymanage');
    }

}