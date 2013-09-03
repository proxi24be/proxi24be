<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php
				$source_message->printForm(
				 	array(
					    'id'=>'souce_message_form',
					    'action'=> Yii::app()->createAbsoluteUrl('i18n/sourceMessage/create'),
					    'enableClientValidation'=>true,
					    'clientOptions'=>array('validateOnSubmit'=>true),
					    'errorMessageCssClass'=>'error alert alert-warning',
					),
					array(BsFormBehavior::SUBMIT_BUTTON => Yii::t('login', 'submit'))
				);
			?>
			<?php
				BsFlashAlert::printFlashAlert('creation success', 'alert-success');
				BsFlashAlert::printFlashAlert('creation fail', 'alert-danger');
			?>
		</div>
		<div class="col-md-9">
<?php

$bs_table_manager = new BsTableManager($models, array('id' ,'category', 'message'));
$bs_table_manager->printTable('table');

?>
		</div>
	</div>
</div>