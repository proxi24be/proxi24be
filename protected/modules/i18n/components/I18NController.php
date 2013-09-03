<?php

class I18NController extends Controller
{
	public $layout = '/layouts/main';

	public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',  // allow only authenticated to perform 'index' and 'view' actions
                'ips'=>array('127.0.0.1'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
                'message'=>'access denied.',
            ),
        );
    }
}