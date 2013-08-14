<?php
/**
 * User: TRANN
 * Date: 8/12/13
 * Time: 2:53 PM
 */

use application\components as MyComponents;


class UserManagerTest extends CDbTestCase {

    private $_required_parameters = array(
      'first_name', 'last_name', 'email', 'locked', 'last_connection', 'password',
    );

    private $_user_manager;

    public function setUp() {
        $this->_user_manager = new MyComponents\UserManager();
    }

    public function tearDown() {

    }

    public function testCreateNewUser() {
        $password = 'new_password';
        $params = array(
            'first_name' => 'john_1',
            'last_name' => 'doe_1',
            'email' => 'john.doe_1@test.be',
            'password' => $password,
            'locked' => 0,
            'last_connection' => time(),
        );
        $this->assertEquals(FALSE, $this->_user_manager->createNewUser(array()));

        $user_id = $this->_user_manager->createNewUser($params);
        $this->assertEquals(TRUE, $user_id !== FALSE );

        $user = User::model()->findByPk($user_id);
        // The password has been encrypted !!
        $this->assertNotEquals($password, $user->password);

        // check the hashed password.
        $this->assertEquals(FALSE, $this->_user_manager->checkPassword('bad_password', $user->password));
        $this->assertEquals(TRUE, $this->_user_manager->checkPassword('new_password', $user->password));
    }

}