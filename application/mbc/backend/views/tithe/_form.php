<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tithe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tithe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tithe_date')->textInput() ?>

    <?= $form->field($model, 'tithe_envno')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'tithe_amount')->textInput() ?>

    <?= $form->field($model, 'tithe_total')->textInput() ?>

    <?= $form->field($model, 'member_ID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
