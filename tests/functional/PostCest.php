<?php

use app\tests\unit\fixtures\UserFixture;
use app\tests\unit\fixtures\PostFixture;

class PostCest
{
    public function _fixtures()
    {
        return [
            'users' => UserFixture::class,
            'posts' => PostFixture::class,
        ];
    }

    public function index(\FunctionalTester $I)
    {
        $I->amOnRoute("/");

        $I->see("My Blog", "a");
        $I->see("Blog post #1", "a");
        $I->see("Blog post #2", "a");
        $I->see("Blog post #3", "a");
        $I->see("Blog post #4", "a");
        $I->see("Blog post #5", "a");
        $I->see("Archive", "a");
    }

    public function archive(\FunctionalTester $I)
    {
        $I->amOnRoute("/post/");

        $I->see("Blog post #1", "a");
        $I->see("Blog post #2", "a");
        $I->see("Blog post #3", "a");
        $I->see("Blog post #4", "a");
        $I->see("Blog post #5", "a");

        $I->dontSee("Archive", "a");
    }
}
