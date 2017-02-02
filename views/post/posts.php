<?php
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = "Post Archive";
?>

<div class="site-index">
    <ul>
        <?php foreach($posts as $post) { ?>
            <li>
                <p>
                    <a href="<?php echo Url::to(['post/show', 'id' => $post->id]) ?>">
                        <?= Html::encode($post->title) ?>
                    </a>
                    from <?= Yii::$app->formatter->asDatetime ($post->created_at, 'yyyy-MM-dd HH:mm:ss') ?>
                </p>
            </li>
        <?php } ?>
    </ul>
</div>