<?php

namespace app\controllers;

use app\models\User;
use Yii;
use app\models\Report;
use app\models\ReportSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use yii\filters\AccessControl;
use dektrium\user\filters\AccessRule;
use kartik\mpdf\Pdf;
use yii\helpers\ArrayHelper;

/**
 * ReportController implements the CRUD actions for Report model.
 */
class ReportController extends Controller
{
    /**
     * @inheritdoc
     */
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
                        'actions' => ['create', 'export','export-graph'],
                        'roles' => ['@', 'admin'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index','test'],
                        'roles' => ['@'],
                    ],

                    [
                        'allow' => true,
                        'actions' => ['update', 'delete', 'view', 'city','export-view'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            if ((!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin) || $this->isUserAuthor()) {
                                return true;
                            }
                            return false;
                        }
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'city'],
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    public function actionExport($layout)
    {
        $centre_arr = ArrayHelper::map(User::find()
            ->select(['id', 'city'])
            ->andFilterWhere(['!=', 'id', 1])
            ->andFilterWhere(['!=', 'id', 75])
            ->asArray()->all(),
            'id', 'city');
        $month_arr = [1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель',
            5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август',
            9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь'];
        $month_from = isset($_GET["month_from"]) ? $_GET["month_from"] : "";
        $month_till = isset($_GET["month_till"]) ? $_GET["month_till"] : "";

        $year_from = isset($_GET["year_till"]) ? $_GET["year_till"] : "";
        $year_till = isset($_GET["year_till"]) ? $_GET["year_till"] : "";

        $centre = isset($_GET["centre"]) ? $_GET["centre"] : "";

        $center_name="Все центры";
        if(isset($centre_arr[$centre])){
            $center_name=$centre_arr[$centre];
        }
        if($year_from==$year_till){
            $range=$center_name.", ".$month_arr[$month_from]." - ".$month_arr[$month_till]." ".$year_till;
        }
        else{
            $range=$center_name.", ".$month_arr[$month_from]." ".$year_from." - ".$month_arr[$month_till]." ".$year_till;
        }

        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->query->andFilterWhere(['>=', 'month', $month_from]);
        $dataProvider->query->andFilterWhere(['>=', 'year', $year_from]);

        $dataProvider->query->andFilterWhere(['<=', 'month', $month_till]);
        $dataProvider->query->andFilterWhere(['<=', 'year', $year_till]);

        if (!Yii::$app->user->identity->isAdmin) {
            $centre = Yii::$app->user->id;
        }
        $report = new Report();
        $dataProvider->query->andFilterWhere(['user_id' => $centre]);

        $pdf = new Pdf([
            'mode' => '', // leaner size using standard fonts
            'content' => $this->renderPartial($layout, [
                'report' => $report,
                'dataProvider' => $dataProvider,
                'range'=>$range
            ]),
            'cssFile' => '@webroot/css/pdf.css',
            'options' => [
                'title' => "Цифровой отчет всех центров от " . $report->getMonth($month_from) . " " . $year_from . " до " . $report->getMonth($month_till) . " " . $year_till,
                'subject' => 'Центр по оказанию бесплатной юридической помощи(ЦБЮП) Министерства Юстиции КР'
            ],
            'methods' => [
                'SetHeader' => ['Центр по оказанию бесплатной юридической помощи(ЦБЮП) Министерства Юстиции КР ' . date("Y-m-d")],
                'SetFooter' => ['|{PAGENO}|'],
            ],
        ]);
        return $pdf->render();
    }

    public function actionExportGraph()
    {
        $range=Yii::$app->request->post('range');
        $sex=Yii::$app->request->post('sex');
        $age=Yii::$app->request->post('age');
        $social=Yii::$app->request->post('social');
        $civil=Yii::$app->request->post('civil');
        $consult=Yii::$app->request->post('consult');
        
        $sex_vi=Yii::$app->request->post('sex_vi');
        $age_vi=Yii::$app->request->post('age_vi');
        $social_vi=Yii::$app->request->post('social_vi');
        $civil_vi=Yii::$app->request->post('civil_vi');

        $pdf = new Pdf([
            'mode' => '', // leaner size using standard fonts
            'content' => $this->renderPartial('graphics_pdf',[
                'range'=>$range,
                'sex'=>$sex,
                'age'=>$age,
                'social'=>$social,
                'civil'=>$civil,
                'consult'=>$consult,
                'sex_vi'=>$sex_vi,
                'age_vi'=>$age_vi,
                'social_vi'=>$social_vi,
                'civil_vi'=>$civil_vi,
            ]),
            'cssFile' => '@webroot/css/pdf.css',
            'options' => [
                'title' => "Графический отчет всех центров",
                'subject' => 'Центр по оказанию бесплатной юридической помощи(ЦБЮП) Министерства Юстиции КР'
            ],
            'methods' => [
                'SetHeader' => ['Центр по оказанию бесплатной юридической помощи(ЦБЮП) Министерства Юстиции КР ' . date("Y-m-d")],
                'SetFooter' => ['|{PAGENO}|'],
            ],
        ]);
        return $pdf->render();
    }

    public function actionExportView($id)
    {
        $model = $this->findModel($id);

        $pdf = new Pdf([
            'mode' => '', // leaner size using standard fonts
            'content' => $this->renderPartial('check/general-stats',[
                'model' => $model,
            ]),
            'cssFile' => '@webroot/css/pdf.css',
            'options' => [
                'title' => "Графический отчет всех центров",
                'subject' => 'Центр по оказанию бесплатной юридической помощи(ЦБЮП) Министерства Юстиции КР'
            ],
            'methods' => [
                'SetHeader' => ['Центр по оказанию бесплатной юридической помощи(ЦБЮП) Министерства Юстиции КР ' . date("Y-m-d")],
                'SetFooter' => ['|{PAGENO}|'],
            ],
        ]);
        return $pdf->render();
    }


    protected function isUserAuthor()
    {
        $user = User::findOne(Yii::$app->user->id);
        if ($user->childs) {
            return true;
        } else
            return $this->findModel(Yii::$app->request->get('id'))->user_id == Yii::$app->user->id;
    }

    /**
     * Lists all Report models.
     * @return mixed
     */
    public function actionIndex()
    {
        $month_from = isset($_GET["month_from"]) ? $_GET["month_from"] : "";
        $month_till = isset($_GET["month_till"]) ? $_GET["month_till"] : "";

        $year_from = isset($_GET["year_from"]) ? $_GET["year_from"] : "";
        $year_till = isset($_GET["year_till"]) ? $_GET["year_till"] : "";

        $centre = isset($_GET["centre"]) ? $_GET["centre"] : "";


        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        $start_date = $year_from."-".$month_from."-01";
        $start_date = date("Y-m-d", strtotime($start_date));

        $end_date = $year_till."-".$month_till."-28";
        $end_date = date("Y-m-d", strtotime($end_date));

        $dataProvider->query->andFilterWhere(['between', 'sort_date', $start_date, $end_date]);

       // ->where(['between', 'date', $start, $end])

        /*$dataProvider->query->andFilterWhere(['>=', 'month', $month_from]);
        $dataProvider->query->andFilterWhere(['>=', 'year', $year_from]);

        $dataProvider->query->andFilterWhere(['<=', 'month', $month_till]);
        $dataProvider->query->andFilterWhere(['<=', 'year', $year_till]);*/

        if (!Yii::$app->user->identity->isAdmin) {
            $centre = Yii::$app->user->id;
        }

        $dataProvider->query->andFilterWhere(['user_id' => $centre]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTable()
    {

    }

    public function actionCity($id)
    {
        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['user_id' => $id]);
        $city = User::findOne($id);

        return $this->render('city', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'city' => $city->city
        ]);
    }

    /**
     * Displays a single Report model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Report model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Report();

        if ($model->load(Yii::$app->request->post())) {
            $model->sort_date = $model->year . "-" . $model->month . "-28";
            $model->save();
            if (Yii::$app->user->identity->isAdmin) {
                return $this->redirect(['city', 'id' => $model->user_id]);
            } else {
                return $this->redirect(['/site/index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Report model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $city = $model->user->city;
        $d = date_parse_from_format("Y-m-d", $model->date_created);
        if (date('m') - $d['month'] > 2) {
            throw new NotFoundHttpException("Истек срок редактирования данного отчета");
        } else {
            if ($model->load(Yii::$app->request->post())) {
                $model->sort_date = $model->year . "-" . $model->month . "-28";
                $model->save();
                if (Yii::$app->user->identity->isAdmin) {
                    return $this->redirect(['city', 'id' => $model->user_id]);
                } else {
                    return $this->redirect(['/site/index']);
                }
            }

            return $this->render('update', [
                'model' => $model,
                'city' => $city
            ]);
        }
    }

    /**
     * Deletes an existing Report model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['site/index']);
    }

    /**
     * Finds the Report model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Report the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Report::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionTest(){
        return $this->render('test');
    }
}
