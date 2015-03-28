<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TitheSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tithe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tithe_date') ?>

    <?= $form->field($model, 'tithe_envno') ?>

    <?= $form->field($model, 'tithe_amount') ?>

    <?= $form->field($model, 'tithe_total') ?>

    <?php // echo $form->field($model, 'member_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
