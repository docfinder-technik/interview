<?php
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = "Post Archive";
?>

<div class="site-index">
    <a href="<?= Url::to(['post/create']) ?>" class="pull-right"><button type="button" class="btn btn-success">Create a new Blog Post</button></a>
    
    <ul>
        <?php foreach($posts as $post) { ?>
            <li>
                <a href="<?= Url::to(['/admin/post/'.$post->id]) ?>">
                    <?= Html::encode($post->title) ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>