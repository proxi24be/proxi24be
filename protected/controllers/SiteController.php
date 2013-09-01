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
<<<<<<< HEAD

	public function actionLogin()
	{
		$this->redirect('index');
	}
=======
>>>>>>> 1eb0e07b0a373fe1a27218b2b3bcd4081fc80370
}