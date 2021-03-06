<?php

Yii::import('ext.bootstrap.form.*');
Yii::import('application.modules.user.models.*');

class SiteController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionSetLanguage($lang)
	{
		setcookie('lang', $lang);
		$this->redirect('index');
	}

	public function actionError()
	{
		$error=Yii::app()->errorHandler->error;
        if($error)
        {
            if(Yii::app()->request->isAjaxRequest)
                    echo $error['message'];
            else
                    $this->render('error', $error);
        }
	}
}