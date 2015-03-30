<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

 use backend\models\User;
// use common\models\User;


/* @var $this yii\web\View */
/* @var $model backend\models\Tithe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tithe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tithe_date')->textInput() ?>

    <?= $form->field($model, 'tithe_envno')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'tithe_amount')->textInput() ?>

    <!--<?= $form->field($model, 'user_id')->textInput() ?>-->

    <!--<?= $form->field($model, 'user_id')
		    ->dropDownList(
		    [''=>'Select user', '1' =>'111', '2'=>'222'])?> -->

        <?= $form->field($model, 'user_id')->dropDownList(
    	ArrayHelper::map(User::find()->all(),'id', 'user_name'),
    	['prompt'=>'Choose user'])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
