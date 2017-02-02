<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>

<div class="col-lg-12">
    <?= $form->field($post, 'title') ?>
    <?= $form->field($post, 'content')->textarea(["rows" => 6]) ?>

    <a href="<?= Url::to(['post/delete/'.$post->id]) ?>"><button type="button" class="btn btn-danger pull-left">Delete</button>
    <button type="submit" class="btn btn-success pull-right">Save</button>
</div>
<?php ActiveForm::end() ?>