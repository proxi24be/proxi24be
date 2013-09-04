<?php

$this->beginWidget('ext.bootstrap.modal.ModalWidget', 
	array('id'=>'myRegisterForm', 'modal_title'=> 'register form'));
	$user = new User();
	$user->setBaseController($this);
	$user->printForm(
		array(
			'id'=>'register-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array('validateOnSubmit'=>true),
			'errorMessageCssClass'=>'error alert alert-warning',
			'action'=>Yii::app()->createUrl('user/register/create'),
		),
		array(BsFormBehavior::SUBMIT_BUTTON => Yii::t('user', 'submit'))
	);
$this->endWidget();