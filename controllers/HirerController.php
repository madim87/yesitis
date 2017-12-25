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
use app\models\City;
use Faker\Provider\Company;
use Yii;
use yii\helpers\ArrayHelper;
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

    public function actionHirermanage($id)
    {
        $hirer = Hirer::findOne(['id'=>$id]);
        $query = Vacancy::find()
            ->where(['id_hirer'=>$id])
            ->orderBy(['id'=>SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=>3]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->all();
        $cnt = $countQuery->count();
        return $this->render('hirermanage',[
            'hirer'=>$hirer,
            'models'=>$models,
            'pages'=>$pages,
            'count'=>$cnt
        ]);
    }

    public function actionHireradd()
    {
        $hirer = new Hirer();
        if(Yii::$app->getUser()){
            $role = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);
            $id_user = Yii::$app->getUser()->id;
            $hirer->user_id = $id_user;
//            var_dump($role);
//            var_dump(Yii::$app->user->id);
            if(empty($role)|| $role->name=='aspirant'){
                //   throw new AccessDeniedException();
            }
        }

        $cities = City::find()->all();
        $items_cities = ArrayHelper::map($cities,'id','name');
        if($hirer->load(Yii::$app->request->post())){
            if($hirer->validate()){
                $hirer->save();
            }else {
                return print_r($hirer->getErrors());
            }
        }

        return $this->render('hireradd',[
            'hirer_mod'=>$hirer,
            'items_cities'=>$items_cities,

        ]);

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


}