<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Prayerrequest */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prayerrequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prayerrequest-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'prayerrequest_code',
            'prayerrequest_type',
            'prayerrequest_description',
        ],
    ]) ?>

</div>
