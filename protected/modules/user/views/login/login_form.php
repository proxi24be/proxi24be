<div class="container">
	<div class="row">
		<div class="col-md-4 col-xs-1 col-md-offset-4">
<?php

$login_form->printForm(
    array(
        'id'=>'user-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array('validateOnSubmit'=>true),
        'errorMessageCssClass'=>'error alert alert-warning',
        'action'=>Yii::app()->createUrl('user/login/read'),
  	),
  	array(BsFormBehavior::SUBMIT_BUTTON => Yii::t('login', 'submit'))
);

?>	
		</div>
	</div>
</div>