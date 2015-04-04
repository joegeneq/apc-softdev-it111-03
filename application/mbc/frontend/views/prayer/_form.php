<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model frontend\models\Prayer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prayer-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput(['value'=>Yii::$app->user->identity->user_name, 'readOnly'=>true]) ?>

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

    <?= $form->field($model, 'prayer_desc')->textArea(['maxlength' => 100]) ?>

  <!--   <?= $form->field($model, 'prayer_schedule')->textInput() ?> -->
    <?= $form->field($model, 'prayer_schedule')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
