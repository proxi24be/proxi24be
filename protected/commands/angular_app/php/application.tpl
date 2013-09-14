<?php 
	$angularPath = Yii::getPathOfAlias('application.modules.i18n.javascript.{application_name}');
	$publish = Yii::app()->getAssetManager()->publish($angularPath);
?>

<script type="text/javascript">

var myConfig = 
{
	url : 
	{
		application: "<?= Yii::app()->createAbsoluteUrl('{MODULE_NAME}/{application_name}/'); ?>",
	}
}

</script>

<div id="ng-app" ng-app="{APPLICATION_NAME}" class="ng-app:{APPLICATION_NAME}">
    	<div ng-view><!--The content is dynamically replaced--></div>	
</div>

<script type="text/javascript" src="<?= $publish . '/{APPLICATION_NAME}.js'?>"></script>
<script type="text/javascript" src="<?= $publish . '/controller/DefaultController.js'?>"></script>
<script type="text/javascript" src="<?= $publish . '/model/CrudModel.js'?>"></script>