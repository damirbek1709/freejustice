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
                        'actions' => ['index', 'summary'],
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
        $user = User::findOne(Yii::$app->user->id);

        if (Yii::$app->user->identity->isAdmin) {
            $userModel = User::find()->select(['id', 'city'])->andFilterWhere(['!=', 'id', Yii::$app->user->identity->id])->asArray()->all();
            return $this->render('index', ['reportModel' => $userModel]);
        } else {
            if ($user->childs) {
                $userModel = User::find()->select(['id', 'city'])->andFilterWhere(['!=', 'id', Yii::$app->user->identity->id])->andFilterWhere(['parent' => Yii::$app->user->identity->id])->asArray()->all();
                return $this->render('index', ['reportModel' => $userModel]);
            } else {
                $month_from = isset($_GET["month_from"]) ? $_GET["month_from"] : "";
                $month_till = isset($_GET["month_till"]) ? $_GET["month_till"] : "";

                $year_from = isset($_GET["year_till"]) ? $_GET["year_till"] : "";
                $year_till = isset($_GET["year_till"]) ? $_GET["year_till"] : "";

                $searchModel = new ReportSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andFilterWhere(['>=', 'month', $month_from]);
                $dataProvider->query->andFilterWhere(['>=', 'year', $year_from]);

                $dataProvider->query->andFilterWhere(['<=', 'month', $month_till]);
                $dataProvider->query->andFilterWhere(['<=', 'year', $year_till]);
                $dataProvider->query->andFilterWhere(['user_id' => Yii::$app->user->id]);
                return $this->render('simple_index', ['dataProvider' => $dataProvider]);
            }
        }
    }


    public function actionSummary()
    {

        $month_from = isset($_GET["month_from"]) ? $_GET["month_from"] : "";
        $month_till = isset($_GET["month_till"]) ? $_GET["month_till"] : "";

        $year_from = isset($_GET["year_from"]) ? $_GET["year_from"] : "";
        $year_till = isset($_GET["year_till"]) ? $_GET["year_till"] : "";

        $start_date = $year_from . "-" . $month_from . "-01";
        $start_date = date("Y-m-d", strtotime($start_date));

        $end_date = $year_till . "-" . $month_till . "-28";
        $end_date = date("Y-m-d", strtotime($end_date));

        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        if (isset($_GET["centre"]) && Yii::$app->user->identity->parent != 0) {
            $centre = $_GET["centre"];
            $dataProvider->query->andFilterWhere(['user_id' => $centre]);
        }

        elseif (isset($_GET["centre"]) && Yii::$app->user->identity->parent == 0) {
            $centre_arr = \app\models\User::find()->andFilterWhere(['parent' => Yii::$app->user->id])->all();
            $new_arr = [];

            foreach ($centre_arr as $item) {
                $new_arr[] = $item->id;
            }
            $dataProvider->query->andFilterWhere(['user_id' => $new_arr]);
        }


        //$dataProvider->query->andFilterWhere(['user_id' => $centre_arr]);

        $dataProvider->query->andFilterWhere(['between', 'sort_date', $start_date, $end_date]);


        return $this->render('summary_index', ['dataProvider' => $dataProvider]);
    }


}
