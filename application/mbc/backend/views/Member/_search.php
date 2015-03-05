<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MemberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'member_lastname') ?>

    <?= $form->field($model, 'member_firstname') ?>

    <?= $form->field($model, 'member_contactno') ?>

    <?= $form->field($model, 'member_homeadd') ?>

    <?php // echo $form->field($model, 'member_emailadd') ?>

    <?php // echo $form->field($model, 'member_actministry') ?>

    <?php // echo $form->field($model, 'member_attendance') ?>

    <?php // echo $form->field($model, 'membercol') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
