<style>
form div.error
{
	margin-top: 5px;
}
</style>

<?php 

// It is more convenient to put the model here.
// Despite it violates the MVC pattern. (we are in the view here)
if(!isset($model))
	$model = new LoginForm();

$form = $this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
    'errorMessageCssClass'=>'error alert alert-danger',
	'action'=>Yii::app()->createUrl('site/authenticate'),
)); 

?>

<div class="form-group">
	<?= $form->labelEx($model,'username');?>
	<?= $form->textField($model,'username', array(
		'placeholder'=>Yii::t('login','placeholder_username'),
		'class' => 'form-control',
		));?>
	<?php echo $form->error($model,'username'); ?>
</div>

<div class="form-group">
	<?= $form->labelEx($model,'password');?>
	<?= $form->passwordField($model,'password', array(
		'placeholder'=>Yii::t('login','placeholder_password'),
		'class'=> 'form-control',
		));?>
	<?php echo $form->error($model,'password'); ?>
</div>

<?= CHtml::submitButton(
		Yii::t('login', 'submit'),
		array('class'=>'btn btn-primary')
	);
?>

<?php $this->endWidget(); ?>