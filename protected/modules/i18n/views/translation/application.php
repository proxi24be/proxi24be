<?php 
	$angularPath = Yii::getPathOfAlias('application.modules.i18n.javascript.translation');
	$publish = Yii::app()->getAssetManager()->publish($angularPath);
?>

<script type="text/javascript">

var myConfig = 
{
	url : 
	{
		application: "<?= Yii::app()->createAbsoluteUrl('i18n/translation/'); ?>",
	}
}

</script>

<div id='ng-app' ng-app='Translation' class='ng-app:Translation'>
    	<div ng-view><!--The content is dynamically replaced--></div>	
</div>

<script type="text/javascript" src="<?= $publish . '/Translation.js'?>"></script>
<script type="text/javascript" src="<?= $publish . '/controller/DefaultController.js'?>"></script>
<script type="text/javascript" src="<?= $publish . '/model/CrudModel.js'?>"></script>