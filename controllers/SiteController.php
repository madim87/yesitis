<?php

namespace app\controllers;

use app\models\FormCity;
use app\models\User;
use app\models\Vacancy;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $cnt = Vacancy::find()->count();

//        '{vacancyCount, plural, one{vacancy} other{vacancies}}' => '{vacancyCount, plural, one{вакансия} few{ вакансии} many{вакансий} other{ вакансии}}';

        $str = Yii::t('app', '{vacancyCount, plural, one{вакансия} few{ вакансии} many{вакансий} other{ вакансии}}', ['vacancyCount' => $cnt],`ru`)." ".
            Yii::t('app', '{vacancyCount, plural, one{доступна}  other{ доступны}}', ['vacancyCount' => $cnt]);
 //       $str = Yii::powered('');
       // $str = Yii::t('app', '{n} запись|записи|записей', $cnt);

        $last = Vacancy::find()->orderBy(['id'=>SORT_DESC])->limit(5)->all();
        return $this->render('index',[
            'vacanciesAll' => $last,
            'cntVacancy' => $cnt,
            'word' => $str]);
    }



    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
       return $this->render('about');
    }

    public function actionPigi(){
        $form_city = new FormCity();
        return $this->render('pigi',compact('form_city'));
    }

}
