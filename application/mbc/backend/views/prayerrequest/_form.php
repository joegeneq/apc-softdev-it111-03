<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Prayerrequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prayerrequest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'prayerrequest_code')->textInput() ?>

    <?= $form->field($model, 'prayerrequest_type')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'prayerrequest_description')->textInput(['maxlength' => 100]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
