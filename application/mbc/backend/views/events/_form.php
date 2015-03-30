<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Events */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'events_date')->textInput() ?>

    <?= $form->field($model, 'events_location')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'events_prioritylevel')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'event_desc')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'no_of_attendees')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
