<?php
namespace tests\models;

use yii\codeception\DbTestCase;
use app\tests\unit\fixtures\UserFixture;

use app\models\User;

class UserTest extends DbTestCase
{
    public function fixtures()
    {
        return [
            "users" => UserFixture::className(),
        ];
    }

    public function testFindUserById()
    {
        expect_that($user = User::findIdentity(1));
        expect($user->username)->equals($this->users("user1")->username);

        expect_not(User::findIdentity(2));
    }

    public function testFindUserByAccessToken()
    {
        expect_that($user = User::findIdentityByAccessToken($this->users("user1")->access_token));
        expect($user->username)->equals($this->users("user1")->username);

        expect_not(User::findIdentityByAccessToken("non-existing"));        
    }

    public function testFindUserByUsername()
    {
        expect_that($user = User::findByUsername($this->users("user1")->username));
        expect_not(User::findByUsername("not-admin"));
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser($user)
    {
        $user = User::findByUsername($this->users("user1")->username);
        expect_that($user->validateAuthKey($this->users("user1")->auth_key));
        expect_not($user->validateAuthKey($this->users("user1")->auth_key."qweqwe"));

        expect_that($user->validatePassword("admin"));
        expect_not($user->validatePassword("123456"));        
    }

}
