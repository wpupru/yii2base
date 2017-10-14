<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<h2>Post Index</h2><br><br>
<?php

//debug($model);

?>

<?php if(Yii::$app->session->hasFlash('success')): ?>
    <?php echo Yii::$app->session->getFlash('success'); ?>
<?php endif; ?>

<?php if(Yii::$app->session->hasFlash('error')): ?>
    <?php echo Yii::$app->session->getFlash('error'); ?>
<?php endif; ?>

<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal', 'id' => 'testForm']]) ?>
<h2>Почтовая форма</h2>
<?= $form->field($model, 'name')?>
<?= $form->field($model, 'email')?>
<?= $form->field($model, 'text')->textarea(['rows' => 5]) ?>
<?= Html::submitButton("Отправить", ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>


