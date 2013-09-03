<?php

Yii::import('ext.bootstrap.*');

class DefaultController extends I18NController
{
	public function actionIndex()
	{
		$source_message = new Message();
		$source_message->setBaseController($this);
    	$this->render('index', array('source_message'=>$source_message));
	}
}