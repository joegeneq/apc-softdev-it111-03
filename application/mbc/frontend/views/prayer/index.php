<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PrayerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prayers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prayer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Prayer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'prayerrequest_code',
            'prayerrequest_type',
            'prayerrequest_description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
