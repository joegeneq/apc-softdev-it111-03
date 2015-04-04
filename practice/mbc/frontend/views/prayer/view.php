<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Prayer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prayers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prayer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'user_id' => $model->user_id], [
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
            'prayer_desc',
            'prayer_type',
            'prayer_code',
            'prayer_schedule',
            'user_id',
        ],
    ]) ?>

</div>
