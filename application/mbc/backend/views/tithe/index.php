<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TitheSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tithes';
$this->params['breadcrumbs'][] = $this->title;
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

            'id',
            'tithe_date',
            'tithe_envno',
            'tithe_amount',
            'tithe_total',
            // 'member_ID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>