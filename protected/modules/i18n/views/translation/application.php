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
<<<<<<< HEAD
=======
		SourceMessage: "<?= Yii::app()->createAbsoluteUrl('i18n/sourceMessage/'); ?>",
>>>>>>> 0f02f250a4a8e0df8d4c9de416a008be0f926c2b
	}
}

</script>

<div id='ng-app' ng-app='Translation' class='ng-app:Translation'>
    	<div ng-view><!--The content is dynamically replaced--></div>	
</div>

<script type="text/javascript" src="<?= $publish . '/Translation.js'?>"></script>
<script type="text/javascript" src="<?= $publish . '/controller/DefaultController.js'?>"></script>
<script type="text/javascript" src="<?= $publish . '/model/CrudModel.js'?>"></script>