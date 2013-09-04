<div class="container">
	<div class="row">
		<div class="col-xs-1 col-md-4 col-md-offset-4">
<?php
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
?>
		</div>
	</div>
</div>