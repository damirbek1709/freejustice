<?php

namespace app\controllers;

use app\models\Report;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\ReportSearch;
use dektrium\user\filters\AccessRule;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public $layout;


    function behaviors()
    {
        return [
            'roleAccess' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['error'],
                        'roles' => ['?', '@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],
                    ],

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

    public function actionIndex()
    {
        if (Yii::$app->user->identity->isAdmin) {
            $userModel = User::find()->select(['id', 'city'])->andFilterWhere(['!=', 'id', 1])->asArray()->all();
            return $this->render('index', ['reportModel' => $userModel]);
        }
        else{
            $report = Report::find()->select(['id','month'])->andFilterWhere(['user_id'=>Yii::$app->user->id])->all();
            return $this->render('simple_index',['report'=>$report]);
        }
    }

}
