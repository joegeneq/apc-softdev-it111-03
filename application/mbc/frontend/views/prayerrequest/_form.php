<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PrayerRequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prayer-request-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'prayerrequest_code')->textInput() ?>


     <?=  $form->field($model, 'prayerrequest_type')
        ->dropDownList(
            $items = 
	            [
		            'Male'=>'Male',
		            'Female'=>'Female'
	            ], // Flat array ('id'=>'label')
            ['prompt'=>'Select PrayerType']    // options
        );
     ?>


    <?= $form->field($model, 'prayerrequest_description')->textInput(['maxlength' => 100]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
