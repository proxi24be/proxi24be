<?php

Yii::import('ext.bootstrap.form.*');
Yii::import('ext.bootstrap.table.*');
yii::import('ext.bootstrap.alert.*');

class DefaultController extends I18NController
{
	public function actionIndex()
	{
		$source_message = new SourceMessage();
		$source_message->setBaseController($this);
		$models = SourceMessage::model()->findAll();
		$this->render('index', array('models' => $models, 'source_message' => $source_message));
	}
}