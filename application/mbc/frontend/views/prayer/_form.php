<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Prayer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prayer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prayer_code')->textInput() ?>

    <?= $form->field($model, 'prayer_type')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'prayer_description')->textInput(['maxlength' => 100]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
