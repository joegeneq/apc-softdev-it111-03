<?php

namespace backend\controllers;

use Yii;
use app\models\Tithe;
use backend\models\TitheSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TitheController implements the CRUD actions for Tithe model.
 */
class TitheController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tithe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TitheSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tithe model.
     * @param integer $id
     * @param integer $member_ID
     * @return mixed
     */
    public function actionView($id, $member_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $member_ID),
        ]);
    }

    /**
     * Creates a new Tithe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tithe();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'member_ID' => $model->member_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tithe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $member_ID
     * @return mixed
     */
    public function actionUpdate($id, $member_ID)
    {
        $model = $this->findModel($id, $member_ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'member_ID' => $model->member_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tithe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $member_ID
     * @return mixed
     */
    public function actionDelete($id, $member_ID)
    {
        $this->findModel($id, $member_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tithe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $member_ID
     * @return Tithe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $member_ID)
    {
        if (($model = Tithe::findOne(['id' => $id, 'member_ID' => $member_ID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
