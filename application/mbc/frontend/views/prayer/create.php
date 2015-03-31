<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Prayer */

$this->title = 'Create Prayer';
$this->params['breadcrumbs'][] = ['label' => 'Prayers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prayer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
