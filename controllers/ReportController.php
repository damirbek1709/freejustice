<?php

namespace app\controllers;

use Yii;
use app\models\Report;
use app\models\ReportSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use yii\filters\AccessControl;
use dektrium\user\filters\AccessRule;

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
                        'actions' => ['create'],
                        'roles' => ['@', 'admin'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view','index'],
                        'roles' => ['@'],
                    ],

                    [
                        'allow' => true,
                        'actions' => ['update', 'delete', 'view','city'],
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
                        'actions' => ['index','city'],
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    protected function isUserAuthor()
    {
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

        $year_from = isset($_GET["year_till"]) ? $_GET["year_till"] : "";
        $year_till = isset($_GET["year_till"]) ? $_GET["year_till"] : "";

        $centre = isset($_GET["centre"]) ? $_GET["centre"] : "";

        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->query->andFilterWhere(['>=','month', $month_from]);
        $dataProvider->query->andFilterWhere(['>=','year', $year_from]);

        $dataProvider->query->andFilterWhere(['<=','month', $month_till]);
        $dataProvider->query->andFilterWhere(['<=','year', $year_till]);

        if(!Yii::$app->user->identity->isAdmin){
            $centre = Yii::$app->user->id;
        }

        $dataProvider->query->andFilterWhere(['user_id' => $centre]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCity($id)
    {
        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['user_id'=>$id]);

        return $this->render('city', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        return $this->render('view', [
            'model' => $this->findModel($id),
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if(Yii::$app->user->identity->isAdmin) {
                return $this->redirect(['city', 'id' => $model->user_id]);
            }
            else{
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
        $d = date_parse_from_format("Y-m-d", $model->date_created);
        if (date('m') - $d['month'] > 2) {
            throw new NotFoundHttpException("Истек срок редактирования данного отчета");
        } else {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                if(Yii::$app->user->identity->isAdmin) {
                    return $this->redirect(['city', 'id' => $model->user_id]);
                }
                else{
                    return $this->redirect(['/site/index']);
                }
            }

            return $this->render('update', [
                'model' => $model,
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
}
