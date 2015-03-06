<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Prayerrequest */

$this->title = 'Create Prayerrequest';
$this->params['breadcrumbs'][] = ['label' => 'Prayerrequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prayerrequest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
