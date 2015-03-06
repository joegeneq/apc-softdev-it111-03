<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tithe */

$this->title = 'Create Tithe';
$this->params['breadcrumbs'][] = ['label' => 'Tithes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tithe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
