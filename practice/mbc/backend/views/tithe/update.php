<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tithe */

$this->title = 'Update Tithe: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tithes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tithe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
