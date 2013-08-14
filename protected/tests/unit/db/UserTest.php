<?php
/**
 * User: TRANN
 * Date: 8/12/13
 * Time: 1:22 PM
 */

class UserTest extends CDbTestCase {

    public $fixtures = array(
        'user' => 'User',
    );

    public function testCountUser() {
        $fixtures_count = count($this->user);
        $records = User::model()->findAll();
        $this->assertEquals($fixtures_count, count($records));
    }

}