<?php
/**
 * User: TRANN
 * Date: 8/12/13
 * Time: 12:09 PM
 */

use application\components as MyComponents;

class PasswordTest extends CTestCase
{

    public function setUp()
    {

    }

    public function tearDown()
    {

    }

    public function testCrypt()
    {
        $hashed_password = MyComponents\Password::crypt("hello the world");
        $this->assertTrue(isset($hashed_password));
    }

    public function testCheck()
    {
        $hashed_password = MyComponents\Password::crypt("hello the world");
        $this->assertTrue(MyComponents\Password::check("hello the world", $hashed_password));

        $hashed_password = MyComponents\Password::crypt("hello the worlD");
        $this->assertFalse(MyComponents\Password::check("hello the world", $hashed_password));

        $hashed_password = MyComponents\Password::crypt("");
        $this->assertFalse(MyComponents\Password::check("hello the world", $hashed_password));
    }
}
