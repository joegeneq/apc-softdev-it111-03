<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Prayer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prayer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prayer_code')->textInput() 
    ->dropDownList(
            $items = 
	            [
		            '1'=>'Public',
		            '2'=>'Private'
		            

	            ], // Flat array ('id'=>'label')
            ['prompt'=>'Select PrivacyType']    // options
        );
     ?>

    <?=  $form->field($model, 'prayer_type')
        ->dropDownList(
            $items = 
	            [
		            'Career'=>'Career',
	            	'Evangelistic'=>'Evangelistic',
	            	'Family'=>'Family',
	            	'Financial'=>'Financial',
	            	'Health'=>'Health',
	            	'Pregnancy'=>'Pregnancy',
	            	'Reconciliation'=>'Reconciliation',
	            	'Relationship'=>'Relationship',
	            	'Spiritual Growth'=>'Spiritual Growth',
	            	'Studies'=>'Studies',
	            	'Travelling'=>'Travelling',
		            'Others'=>'Others'

	            ], // Flat array ('id'=>'label')
            ['prompt'=>'Select PrayerType']    // options
        );
       ?>

    

    <?= $form->field($model, 'prayer_description')->textInput(['maxlength' => 100]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
