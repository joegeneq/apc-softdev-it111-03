<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use backend\models\SignupForm;
use yii\web\ForbiddenHttpException;
use backend\models\AuthItem;
use backend\models\User;
/**
 * Site controller
 */
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
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'signup'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
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
        ];
    }

    public function actionIndex()
    {

        if(Yii::$app->user->identity->user_type===1){
            return $this->render('index');
        }
        else 
        {
            Yii::$app->user->logout();
           throw new ForbiddenHttpException('You must be an Administrator to access this page.');
        }
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup()
    {
     if(Yii::$app->user->identity->user_type===1){
        $model = new SignupForm();
        $authItems = AuthItem::find()->all();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                    return $this->redirect(['user/index']);
            }
        }

        return $this->render('signup', [
            'model' => $model,
            'authItems' => $authItems, 
        ]);
        }else 
        {
            throw new ForbiddenHttpException('You must be an Administrator to access this page.');
        }
    }
}
