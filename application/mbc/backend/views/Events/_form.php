<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Events */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-form">

    <?php $form = ActiveForm::begin(); ?>

   <!-- <?= $form->field($model, 'events_date')->textInput() ?> -->

	<?= $form->field($model, 'events_date')->widget(
    DatePicker::className(), [
        // inline too, not bad
        'inline' => false, 
        'clientOptions' => [
            'autoclose' => true,
            'startDate' => '+0d',
            'format' => 'dd-M-yyyy'
        ]
	]);?>

    <?= $form->field($model, 'events_location')->textInput(['maxlength' => 100]) ?>

   <!-- <?= $form->field($model, 'events_prioritylevel')->textInput() ?> -->

   <?= $form->field($model, 'events_prioritylevel')->textInput() 

    ->dropDownList(
            $items = 
	            [
		            '1'=>'High',
		            '2'=>'Normal'
		            

	            ], // Flat array ('id'=>'label')
            ['prompt'=>'Select Priority Level']    // options
        );
     ?>

    <?= $form->field($model, 'no_of_attendees')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
