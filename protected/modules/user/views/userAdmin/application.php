<?php 
	$angularPath = Yii::getPathOfAlias('application.modules.user.javascript.user_admin');
	$publish = Yii::app()->getAssetManager()->publish($angularPath);
?>

<script type="text/javascript">

var myConfig = 
{
	angularUrl : "<?= Yii::app()->createAbsoluteUrl('user/userAdmin/'); ?>"
}

</script>

<div id='ng-app' ng-app='UserAdmin' class='ng-app:UserAdmin'>
    	<div ng-view><!--The content is dynamically replaced--></div>	
</div>

<script type="text/javascript" src="<?= $publish . '/UserAdmin.js'?>"></script>
<script type="text/javascript" src="<?= $publish . '/controller/UserController.js'?>"></script>
<script type="text/javascript" src="<?= $publish . '/model/UserModel.js'?>"></script>
