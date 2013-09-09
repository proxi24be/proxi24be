<div class="container">
	<div class="row">
		<div class="col-xs-1 col-md-4 col-md-offset-4">

<?php if (Yii::app()->user->hasFlash('account_already_exist')):?>
		<div class="alert alert-danger">
			<?= Yii::app()->user->getFlash('account_already_exist');?>
		</div>
<?php endif; ?>

<?php
	$user->printForm();
?>
		</div>
	</div>
</div>