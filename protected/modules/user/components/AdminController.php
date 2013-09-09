<?php

namespace application\modules\user\components;

class AdminController extends \Controller
{
	public $layout = 'column2';

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'ips'=>array('127.0.0.1'),
            ),

            array('deny',  // deny all users
                'users'=>array('*'),
                'message'=>'Access Denied.',
            ),
        );
    }
}