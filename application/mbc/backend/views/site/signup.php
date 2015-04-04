<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\authItem;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Add User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to add user:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'user_name')->label('Full Name:');?>
                <?= $form->field($model, 'user_contactno') ->label('Contact #:');?>
                <?= $form->field($model, 'user_homeadd')->label('Home Address:'); ?>
                <?= $form->field($model, 'user_actministry')->label('Activity Ministry:'); ?>
                <?= $form->field($model, 'user_attendance') ->label('Attendance:');?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
<!--                 <?php 
                    $authItems = ArrayHelper::map($authItems, 'name','name');
                ?>
                <?= $form->field($model, 'permissions') -> dropDownList($authItems); ?> -->

                    <?= $form->field($model, 'permissions') -> radioList(
                        ArrayHelper::map(AuthItem::find()->all(), 'name','name'))?>


                <div class="form-group">
                    <?= Html::submitButton('Add User', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
