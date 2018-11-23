<?php

namespace tests\models;

use app\models\UserB;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        expect_that($user = UserB::findIdentity(100));
        expect($user->username)->equals('admin');

        expect_not(UserB::findIdentity(999));
    }

    public function testFindUserByAccessToken()
    {
        expect_that($user = UserB::findIdentityByAccessToken('100-token'));
        expect($user->username)->equals('admin');

        expect_not(UserB::findIdentityByAccessToken('non-existing'));
    }

    public function testFindUserByUsername()
    {
        expect_that($user = UserB::findByUsername('admin'));
        expect_not(UserB::findByUsername('not-admin'));
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser($user)
    {
        $user = UserB::findByUsername('admin');
        expect_that($user->validateAuthKey('test100key'));
        expect_not($user->validateAuthKey('test102key'));

        expect_that($user->validatePassword('admin'));
        expect_not($user->validatePassword('123456'));        
    }

}
