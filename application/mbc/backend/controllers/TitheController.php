<?php

namespace backend\controllers;

use Yii;
use backend\models\Tithe;
use backend\models\TitheSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\filters\AccessControl;

/**
 * TitheController implements the CRUD actions for Tithe model.
 */
class TitheController extends Controller
{
    public function behaviors()
    {
        return [
         'access' => [
                'class' => AccessControl::className(),
                    'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete','view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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
        if(Yii::$app->user->identity->user_type===1){
            $searchModel = new TitheSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else 
        {
            Yii::$app->user->logout();
           throw new ForbiddenHttpException('You must be an Administrator to access this page.');
        }
    }

    /**
     * Displays a single Tithe model.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionView($id, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $user_id),
        ]);
    }

    /**
     * Creates a new Tithe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->identity->user_type===1){
            $model = new Tithe();

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
           throw new ForbiddenHttpException('You must be an Administrator to access this page.');
        }
    }

    /**
     * Updates an existing Tithe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionUpdate($id, $user_id)
    {
        if(Yii::$app->user->identity->user_type===1){
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
           throw new ForbiddenHttpException('You must be an Administrator to access this page.');
        }
    }

    /**
     * Deletes an existing Tithe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($id, $user_id)
    {
        if(Yii::$app->user->identity->user_type===1){
            $this->findModel($id, $user_id)->delete();

            return $this->redirect(['index']);
        }else 
        {
            Yii::$app->user->logout();
           throw new ForbiddenHttpException('You must be an Administrator to access this page.');
        }
    }

    /**
     * Finds the Tithe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $user_id
     * @return Tithe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $user_id)
    {
        if (($model = Tithe::findOne(['id' => $id, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
