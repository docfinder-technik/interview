<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

use app\models\Post;
use app\modules\admin\controllers\AbstractAdminController;
use app\modules\admin\models\PostForm;

class PostController extends AbstractAdminController
{
    /**
     * If GET: Displays a post with the given $id for the admin.
     * If POST: updates the post with the given $id and then displays it.
     * @param int $id the id of the post to be shown/saved
     * @return string
     */
    public function actionShow($id)
    {
        $post = Post::findOne($id);
        if($post === null) {
            throw new \yii\web\NotFoundHttpException();
        }

        if(Yii::$app->request->post()) {
            $post->load(Yii::$app->request->post());
            $post->author = Yii::$app->user->id;

            if ($post->validate() && $post->update()) {
                $this->redirect(['index']);
            }
        }

        return $this->render("post", [
            "post" => $post,
        ]);
    }

    public function actionCreate()
    {
        $post = new Post();

        if(Yii::$app->request->post()) {
            $post->load(Yii::$app->request->post());
            $post->author = Yii::$app->user->id;

            if ($post->validate() && $post->save()) {
                $this->redirect(['index']);
            }
        }

        return $this->render("post", [
            "post" => $post,
        ]);        
    }

    public function actionDelete($id)
    {
        $post = Post::findOne($id);
        if($post === null) {
            throw new \yii\web\NotFoundHttpException();
        }

        $post->delete();

        $this->redirect(['index']);       
    }

    /**
     * Displays all posts in an overview
     * 
     * @return string
     */
    public function actionIndex()
    {
        $posts = Post::findAllOrderedByNewest();
        if(empty($posts)) {
            throw new \yii\web\NotFoundHttpException();
        }

        return $this->render("posts", [
            "posts" => $posts,
        ]);
    }
}