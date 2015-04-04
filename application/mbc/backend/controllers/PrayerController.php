<?php

namespace backend\controllers;

use Yii;
use backend\models\Prayer;
use backend\models\PrayerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * PrayerController implements the CRUD actions for Prayer model.
 */
class PrayerController extends Controller
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
     * Lists all Prayer models.
     * @return mixed
     */
    public function actionIndex()
    {
        if( Yii::$app->user->can( 'admin')){
            $searchModel = new PrayerSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else 
        {
            Yii::$app->user->logout();
           throw new ForbiddenHttpException('You must be a Administrator to access this page.');
        }
    }

    /**
     * Displays a single Prayer model.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionView($id, $user_id)
    {
        if( Yii::$app->user->can( 'admin')){
            return $this->render('view', [
                'model' => $this->findModel($id, $user_id),
            ]);
        }else 
        {
            Yii::$app->user->logout();
           throw new ForbiddenHttpException('You must be a Administrator to access this page.');
        }
    }

    /**
     * Creates a new Prayer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if( Yii::$app->user->can( 'admin')){
            $model = new Prayer();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }else 
        {
            Yii::$app->user->logout();
           throw new ForbiddenHttpException('You must be a Administrator to access this page.');
        }
    }

    /**
     * Updates an existing Prayer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionUpdate($id, $user_id)
    {
        if( Yii::$app->user->can( 'admin')){
            $model = $this->findModel($id, $user_id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }else 
        {
            Yii::$app->user->logout();
           throw new ForbiddenHttpException('You must be a Administrator to access this page.');
        }
    }

    /**
     * Deletes an existing Prayer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($id, $user_id)
    {
        $this->findModel($id, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Prayer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $user_id
     * @return Prayer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $user_id)
    {
        if (($model = Prayer::findOne(['id' => $id, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
