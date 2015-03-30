<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

    <!--<?= $form->field($model, 'auth_key')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => 255]) ?>-->

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <!--<?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>>-->

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => 45])->label('Complete Name'); ?>

    <?= $form->field($model, 'user_contactno')->textInput(['maxlength' => 45])->label('Contact #'); ?>

    <?= $form->field($model, 'user_homeadd')->textInput(['maxlength' => 45])->label('Home Address'); ?>

    <?= $form->field($model, 'user_actministry')->textInput(['maxlength' => 45])->label('Activity Ministry'); ?>

    <?= $form->field($model, 'user_attendance')->textInput(['maxlength' => 45]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
