<?php
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = Html::encode($post->title);
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="<?php echo Url::to(['post/show', 'id' => $post->id]); ?>">
                <?= Html::encode($post->title) ?>
            </a>
            from <?= Yii::$app->formatter->asDatetime ($post->created_at, 'yyyy-MM-dd HH:mm:ss') ?>
        </h3>
    </div>
    <div class="panel-body">
        <?= Html::encode($post->content) ?>
    </div>
</div>