<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use backend\models\User;
/* @var $this yii\web\View */
/* @var $model backend\models\Prayer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prayer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prayer_code')->textInput(['maxlength' => 10]) 
    ->dropDownList(
            $items = 
                [
                    'Public'=>'Public',
                    'Private'=>'Private'

                     ], // Flat array ('id'=>'label')
            ['prompt'=>'Select PrayerCode']    // options
        );
        ?>
        
    <?= $form->field($model, 'prayer_type')->textInput(['maxlength' => 45])
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

    <?= $form->field($model, 'prayer_desc')->textInput(['maxlength' => 100]) ?>

   <!-- <?= $form->field($model, 'prayer_schedule')->textInput() ?> -->
   <?= $form->field($model, 'prayer_schedule')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'startDate' => '+0d',
            'format' => 'yyyy-mm-dd'
        ]
]);?>

    <?= $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(User::find()->all(),'id', 'user_name'),
    ['prompt'=>'Choose user'])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
