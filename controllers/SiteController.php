<?php

namespace app\controllers;

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
        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (!Yii::$app->user->identity->isAdmin) {
            $dataProvider->query->andFilterWhere(['user_id' => Yii::$app->user->id]);
        }
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

}
