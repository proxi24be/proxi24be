<?php 
	$angularPath = Yii::getPathOfAlias('application.modules.i18n.javascript.default');
	$publish = Yii::app()->getAssetManager()->publish($angularPath);
?>

<script type="text/javascript">

var myConfig = 
{
	url : 
	{
		application: "<?= Yii::app()->createAbsoluteUrl('/i18n/'); ?>",
		SourceMessage: "<?= Yii::app()->createAbsoluteUrl('/i18n/sourceMessage'); ?>"
	}
}

</script>

<div id='ng-app' ng-app='i18n' class='ng-app:i18n'>
    	<div ng-view><!--The content is dynamically replaced--></div>	
</div>

<script type="text/javascript" src="<?= $publish . '/i18n.js'?>"></script>
<script type="text/javascript" src="<?= $publish . '/controller/SourceMessageController.js'?>"></script>
<script type="text/javascript" src="<?= $publish . '/model/CrudModel.js'?>"></script>