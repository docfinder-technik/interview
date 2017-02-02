<?php

namespace app\controllers;

use yii\web\Controller;

use app\models\Post;

class PostController extends Controller
{
    /**
    * @inheritdoc
    */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays a post with the given ID.
     * @param int $id the id of the post to be shown
     * @return string
     */
    public function actionShow($id)
    {
        $post = Post::findOne($id);
        if($post === null) {
            throw new \yii\web\NotFoundHttpException();
        }

        return $this->render('post', [
            'post' => $post,
        ]);
    }

    /**
     * Displays all posts in an overview
     * 
     * @return string
     */
    public function actionIndex()
    {
        $posts = Post::findAllOrderedByNewest();
        return $this->render('posts', [
            'posts' => $posts,
        ]);
    }
}