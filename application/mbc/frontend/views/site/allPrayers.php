<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PrayerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Prayers';
$this->params['breadcrumbs'][] = $this->title;
$dataProvider->pagination = ['defaultPageSize' => 10];
?>
<div class="prayer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'user_id',
                'value'=>'user.user_name',
            ],
            'prayer_desc',
             [   'attribute'=>'prayer_type', 
                'filter'=> [ 
                    'Career'=>'Career',
                    'Evangelistic'=>'Evangelistic',
                    'Family'=>'Family',
                    'Financial'=>'Financial',
                    'Health'=>'Health',
                    'Pregnancy'=>'Pregnancy',
                    'Reconciliation'=>'Reconciliation',
                    'Relationship'=>'Relationship',
                    'Spiritual Growth'=>'Spiritual Growth',
                    'Studies'=>'Studies',
                    'Travelling'=>'Travelling',
                    'Others'=>'Others' ], 
            ],
            'prayer_code',
            [
                'attribute' => 'prayer_schedule',
                'value' => 'prayer_schedule',
                'options'=> ['class'=>'width-25'],
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'prayer_schedule',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yy-mm-dd',
                        ]
                ]),
            ],
            //' prayer_schedule',
            // 'user_id',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
