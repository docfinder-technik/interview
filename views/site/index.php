<?php
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Blog';
?>

<div class="site-index">
    <?php foreach($posts as $post) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a href="<?php echo Url::to(['post/show', 'id' => $post->id]); ?>">
                        <?= Html::encode($post->title) ?>
                    </a>
                </h3>
            </div>
            <div class="panel-body">
                <?= Html::encode($post->content) ?>
            </div>
        </div>
    <?php } ?>

    <a href="<?php echo Url::to(['post/']) ?>">Archive</a>
</div>
