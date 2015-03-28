<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tithe */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tithes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tithe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'member_ID' => $model->member_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'member_ID' => $model->member_ID], [
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
            'tithe_date',
            'tithe_envno',
            'tithe_amount',
            'tithe_total',
            'member_ID',
        ],
    ]) ?>

</div>
