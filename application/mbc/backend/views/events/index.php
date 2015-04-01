<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
$dataProvider->pagination = ['defaultPageSize' => 10];
?>
<div class="events-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Events', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //  'id',
            [
                'attribute' => 'events_date',
                'value' => 'events_date',
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'events_date',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yy-mm-dd',
                        ]
                ]),
            ],
         // 'events_date',
            'events_location',
            'events_prioritylevel',
            'event_desc',
            // 'no_of_attendees',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
