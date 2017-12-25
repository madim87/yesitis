<?php
/**
 * Created by PhpStorm.
 * User: madim
 * Date: 25.12.2017
 * Time: 12:05
 */

namespace app\controllers;


use yii\helpers\Url;
use yii\web\Controller;
use app\models\User;

use Yii;
use yii\filters\AccessControl;

use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class AuthController extends Controller
{
    public $layout = 'auth';
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
            return $this->goBack(Url::to(['site/index']));
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegistr()
    {
        $model = new User();
        if($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->setPassword($_POST['User']['password_hash']);
                $model->save();
                if ($model->status == 1){
                    $role= Yii::$app->authManager->getRole('aspirant');
                    Yii::$app->authManager->assign($role, $model->id);
                }elseif ($model->status == 2){
                    $role= Yii::$app->authManager->getRole('hirer');
                    Yii::$app->authManager->assign($role, $model->id);
                }

                Yii::$app->user->login($model, true ? 3600 * 24 * 30 : 0);
                return $this->redirect('/');
            } else {
                return print_r($model->getErrors());
            }
        }


        return $this->render('registr', [
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




}