<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\MyAddress;

/* @var $this yii\web\View */
/* @var $model app\models\MyComment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="my-comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

	<?= $form->field($model, 'myaddress_id')-> dropDownList(
		ArrayHelper::map(MyAddress::find()->all(),'id','lastname'),
		['prompt'=>'Select Last Name'])->label('Last Name') ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
