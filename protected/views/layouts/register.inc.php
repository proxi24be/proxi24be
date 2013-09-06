<?php

$this->beginWidget('ext.bootstrap.modal.ModalWidget', 
	array('id'=>'myRegisterForm', 'modal_title'=> 'register form'));
	$user = new User();
	$user->printForm();
$this->endWidget();