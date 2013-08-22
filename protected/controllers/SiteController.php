<?php

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

	public function actionAuthenticate()
	{
	
	}

}