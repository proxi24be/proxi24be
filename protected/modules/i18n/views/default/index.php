
<div class="container">
	<div class="row">
		<div class="col-xs-1 col-md-6">
<?php

$source_message->printForm(
 	array(
	    'id'=>'message-form',
	    'enableClientValidation'=>true,
	    'clientOptions'=>array('validateOnSubmit'=>true),
	    'errorMessageCssClass'=>'error alert alert-danger',
	),
	array(BsFormBehavior::SUBMIT_BUTTON => Yii::t('login', 'submit'))
);

?>
		</div>
	</div>
</div>