<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
$dataProvider->pagination = ['defaultPageSize' => 10];
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['site/signup'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            // 'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',
             'user_name',
             'user_contactno',
             'user_homeadd',
             'user_actministry',
             'user_attendance',
             //'user_type',
            [   'attribute'=>'user_type', 
                'options'=> ['class'=>'width-25'],
                'filter'=> [ '1'=>'Administrator', '2'=>'Member' ], 
            // Flat array ('id'=>'label') 
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
