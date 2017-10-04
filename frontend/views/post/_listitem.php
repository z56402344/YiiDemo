<?php
use yii\helpers\Html;
?>

<div class="post">
    <div class="title">
        <h2><a href="<?= $model->url; ?>"><?= Html::encode($model->title); ?></a> </h2>

        <div class="author" aria-label="作者">
            <span class="glyphicon glyphicon-adjust" aria-hidden="true"></span><em><?= Html::encode($model->author->nickname)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?></em>
            <span class="glyphicon glyphicon-time" aria-hidden="true"></span><em><?= date('Y-m-d H:i:s',$model->create_time); ?></em>
        </div>
    </div>

    <div class="content">
    <?= $model->beginning ?>
    </div>

    <div class="nav">
        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
        <?= implode(', ',$model->tagLinks); ?>
        <br>
        <?= Html::a("评论({$model->commentCount}) | ", $model->url.'#comments') ?>
        <span class="glyphicon glyphicon-time" aria-hidden="true"></span><em><?= date('Y-m-d H:i:s',$model->update_time); ?></em>

    </div>


</div>
