<?php

Yii::import('ext.bootstrap.form.*');
Yii::import('application.modules.user.components.*');
Yii::import('application.modules.user.models.*');

use application\modules\user\components as MyComponents;

class UserManagerTest extends CDbTestCase
{
	public $fixtures = array(
        'user' => 'User',
    );

    private $_user_manager;

	public function setUp()
	{
		parent::setUp();
		$this->_user_manager = new MyComponents\UserManager();
	}

	public function testUserCreation()
	{
		$params = array
		(
			'first_name' => 'test',
			'last_name' => 'test',
			'email' => 'test',
			'password' => 'test',
		);
		$user = $this->_user_manager->createUser($params);

		// email is not a corrected formated email address.
		// password is too short.
		$this->assertFalse($user);

		$params['email'] = 'test@test.be';
		$user = $this->_user_manager->createUser($params);

		// password is too short.
		$this->assertEquals(false, $user);

		$params['password'] = '123456789';
		$user = $this->_user_manager->createUser($params);

		// The user has been created.
		$this->assertNotEquals(false ,$user);

		// Check if the correct information has been saved.
		$this->assertEquals('test@test.be', $user->email);

		$users = \User::model()->findAll();

		// With the fixtures the total of users should be 4.
		$this->assertEquals(4, count($users));
	}

	public function testCheckErrors()
	{
		$params = array();
		$user = $this->_user_manager->createUser($params);
		$error_message = $this->_user_manager->getErrorMessage();

		$this->assertTrue(strpos($error_message, 'first_name') !== false);

		$params['first_name'] = 'first name';
		$user = $this->_user_manager->createUser($params);
		$error_message = $this->_user_manager->getErrorMessage();

		$this->assertTrue(strpos($error_message, 'first_name') === false);
	}

	public function testCheckPassword()
	{
		$params = array
		(
			'first_name' => 'test',
			'last_name' => 'test',
			'email' => 'test@test.be',
			'password' => '123456789',
		);

		$user = $this->_user_manager->createUser($params);
		$this->assertNotNull($user);
		$this->assertFalse($this->_user_manager->checkPassword($user->email, '12345678'));
		$this->assertEquals(true, $this->_user_manager->checkPassword($user->email, '123456789'));
	}

	public function testUpdatePassword()
	{
		$this->assertFalse($this->_user_manager->updatePassword('username', 'new_password'));
	}
}
