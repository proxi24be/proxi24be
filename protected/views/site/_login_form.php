<style>

form div.error
{
	margin-top: 5px;
}

</style>

<?php

$login_form = new LoginForm();
$login_form->setBaseController($this);
$login_form->printForm(
	array('username', 'password'),
 	array(
	    'id'=>'user-form',
	    'enableClientValidation'=>true,
	    'clientOptions'=>array('validateOnSubmit'=>true),
	    'errorMessageCssClass'=>'error alert alert-danger',
		'action'=>Yii::app()->createUrl('site/authenticate'),
	),
	array(BsFormBehavior::SUBMIT_BUTTON => Yii::t('login', 'submit'))
);

?>