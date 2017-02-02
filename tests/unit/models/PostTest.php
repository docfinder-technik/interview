<?php
namespace tests\models;

use yii\codeception\DbTestCase;
use app\tests\unit\fixtures\PostFixture;

use app\models\Post;

class PostTest extends DbTestCase
{
    public function fixtures()
    {
        return [
            'posts' => PostFixture::className(),
        ];
    }

    public function testValidatePost_NoEntries()
    {
        $post = new Post();
        $this->assertFalse($post->validate());
    }

    public function testValidatePost_ValidEntries()
    {
        $post = new Post();
        $post->title = "qweqwe";
        $post->content = "qweqweqwe";
        $post->author = 1;
        $this->assertTrue($post->validate());
    }

    public function testValidatePost_InvalidTitle()
    {
        $post = new Post();
        $post->title = "";
        $post->content = "qweqweqwe";
        $post->author = 1;
        $this->assertFalse($post->validate());
    }

    public function testValidatePost_InvalidContent()
    {
        $post = new Post();
        $post->title = "qweqweqwe";
        $post->content = "";
        $post->author = 1;
        $this->assertFalse($post->validate());
    }

    public function testValidatePost_InvalidAuthor()
    {
        $post = new Post();
        $post->title = "qweqweqwe";
        $post->content = "qweqwewe";
        $post->author = null;
        $this->assertFalse($post->validate());
    }

    public function testFindNewest()
    {
        $posts = Post::findNewest(5);
        $this->assertEquals(5, count($posts));

        $datetime = PHP_INT_MAX;
        foreach($posts as $post) {
            $this->assertTrue($post instanceof Post);

            $this->assertTrue($datetime >= $post->created_at);
            $datetime = $post->created_at;
        }
    }

    public function testFindNewestZero()
    {
        $posts = Post::findNewest(0);
        $this->assertTrue(is_array($posts));
        $this->assertEquals(0, count($posts));
    }

    public function testFindAllOrderedByNewest()
    {
        $posts = Post::findAllOrderedByNewest();

        $datetime = PHP_INT_MAX;
        foreach($posts as $post) {
            $this->assertTrue($post instanceof Post);

            $this->assertTrue($datetime >= $post->created_at);
            $datetime = $post->created_at;
        }
    }

}