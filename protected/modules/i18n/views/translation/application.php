<?php 
	$angularPath = Yii::getPathOfAlias(strtolower('application.modules.i18n.javascript.Translation'));
	$publish = Yii::app()->getAssetManager()->publish($angularPath);
?>

<script type="text/javascript">

var myConfig = 
{
	url : 
	{
		application: "<?= Yii::app()->createAbsoluteUrl('i18n/translation/'); ?>",
		SourceMessage: "<?= Yii::app()->createAbsoluteUrl('i18n/sourceMessage/'); ?>",
	}
}

</script>

<div id='ng-app' ng-app='Translation' class='ng-app:Translation'>
    	<div ng-view><!--The content is dynamically replaced--></div>	
</div>

<script type="text/javascript" src="<?= $publish . '/Translation.js'?>"></script>
<script type="text/javascript" src="<?= $publish . '/controller/DefaultController.js'?>"></script>
<script type="text/javascript" src="<?= $publish . '/model/CrudModel.js'?>"></script>