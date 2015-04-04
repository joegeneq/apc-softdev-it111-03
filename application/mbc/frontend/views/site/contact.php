<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you. <Br> <Br>

        Muntinlupa Baptist Church | Contact No: 861-59-24 | Email-Add: mbc_phil74@yahoo.com | Address: 35 Summit Circle, Bayanan, Muntinlupa City
    </p>

   <!--  <?php if(Yii::$app->session->hasFlash('success')) { ?>

    	<div class="alert alert-success"><p>Thank you for contacting us. We will respond to you as soon as possible.</p></div>

    	<?php  //else { ?>

    	<!-- <div class="alert alert-danger"><p>There was an error sending email.</p></div>

    	<?php } ?>  -->

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'subject') ?>
                <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
      <div>
        <img src="images/mbc.png" style="width:550px;height:380px;" </img>
        </div>
    </div>

</div>
