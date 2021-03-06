<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TitheSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tithes';
$this->params['breadcrumbs'][] = $this->title;
$dataProvider->pagination = ['defaultPageSize' => 10];
$query = (new \yii\db\Query())->from('tithe');
$sum = $query->sum('tithe_amount');

?>
<div class="tithe-index">

    <h1 class="inline"><?= Html::encode($this->title) ?></h1>
    <h3 class="inline tithe-total">Total Collected: <?= Html::encode($sum) ?></h3>
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
            //'tithe_date',
            [
                'attribute' => 'tithe_date',
                'value' => 'tithe_date',
                'options'=> ['class'=>'width-25'],
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'tithe_date',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yy-mm-dd',
                        ]
                ]),
            ],
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
