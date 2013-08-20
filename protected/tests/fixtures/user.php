<?php

use application\components as MyComponents;

return array(

    'user_1' => array(
        'first_name' => 'john',
        'last_name' => 'doe',
        'create_time'=> time(),
        'update_time'=> time(),
        'email'=>'john.doe@test.be',
        'last_connection'=> time(),
        'locked'=>0,
        'password'=>MyComponents\Password::crypt('1234567890'),
    ),

    'user_2' => array(
        'first_name' => 'john',
        'last_name' => 'doe',
        'create_time'=> time(),
        'update_time'=> time(),
        'email'=>'john.doe@test.be',
        'last_connection'=> time(),
        'locked'=>0,
        'password'=>MyComponents\Password::crypt('0987654321'),
    ),

    'user_3' => array(
        'first_name' => 'john',
        'last_name' => 'doe',
        'create_time'=> time(),
        'update_time'=> time(),
        'email'=>'john.doe@test.be',
        'last_connection'=> time(),
        'locked'=>0,
        'password'=> MyComponents\Password::crypt('abcdefghij'),
    ),
);