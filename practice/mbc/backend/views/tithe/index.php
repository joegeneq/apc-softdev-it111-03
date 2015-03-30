<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TitheSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tithes';
$this->params['breadcrumbs'][] = $this->title;
$dataProvider->pagination = ['defaultPageSize' => 10];
?>
<div class="tithe-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tithe', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'tithe_date',
            'tithe_envno',
            'tithe_amount',

            [
                'attribute'=>'user_id',
                'value'=>'user.user_name'
            ],

            //'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
