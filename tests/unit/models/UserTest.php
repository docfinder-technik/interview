<?php
namespace tests\models;

use app\tests\unit\fixtures\PostFixture;
use app\tests\unit\fixtures\UserFixture;

use app\models\User;
use Codeception\Test\Unit;

class UserTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function _fixtures()
    {
        return [
            'users' => UserFixture::class,
            'posts' => PostFixture::class,
        ];
    }

    public function testFindUserById()
    {
        $userFixture = $this->tester->grabFixture("users")['user1'];
        expect_that($user = User::findIdentity(1));
        expect($user->username)->equals($userFixture['username']);

        expect_not(User::findIdentity(2));
    }

    public function testFindUserByAccessToken()
    {
        $userFixture = $this->tester->grabFixture("users")['user1'];
        expect_that($user = User::findIdentityByAccessToken($userFixture['access_token']));
        expect($user->username)->equals($userFixture['username']);

        expect_not(User::findIdentityByAccessToken("non-existing"));
    }

    public function testFindUserByUsername()
    {
        $userFixture = $this->tester->grabFixture("users")['user1'];
        expect_that($user = User::findByUsername($userFixture['username']));
        expect_not(User::findByUsername("not-admin"));
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser($user)
    {
        $userFixture = $this->tester->grabFixture("users")['user1'];

        $user = User::findByUsername($userFixture['username']);
        expect_that($user->validateAuthKey($userFixture['auth_key']));
        expect_not($user->validateAuthKey($userFixture['auth_key']."qweqwe"));

        expect_that($user->validatePassword("admin"));
        expect_not($user->validatePassword("123456"));        
    }

}
