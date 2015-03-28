<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Member */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'member_lastname')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'member_firstname')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'member_contactno')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'member_homeadd')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'member_emailadd')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'member_actministry')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'member_attendance')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'membercol')->textInput(['maxlength' => 45]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
