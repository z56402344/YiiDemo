<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

    <?php
    //第一种方法
//    $psArray = \common\models\Poststatus::find()->all();
//    $allStatus = \yii\helpers\ArrayHelper::map($psArray, 'id', 'name')

    //第二种方法
    /*   $psArray = Yii::$app->db->createCommand('select id,name from poststatus')->queryAll();
         $allStatus = \yii\helpers\ArrayHelper::map($psArray, 'id', 'name')
        */

    //第三种方法
//    $allStatus = (new \yii\db\Query())
//    ->select(['name','id'])
//    ->from('poststatus')
//    ->indexBy('id')
//    ->column();

    //第四种方法
    $allStatus = \common\models\Poststatus::find()
    ->select(['name','id'])
    ->indexBy('id')
    ->column();

    $allAuthor = \common\models\Adminuser::find()
        ->select(['nickname','id'])
        ->indexBy('id')
        ->column();

    ?>
    <?= $form->field($model, 'status')
        ->dropDownList($allStatus, ['prompt'=>'请选择']) ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'author_id')
        ->dropDownList($allAuthor,['prompt'=>'请选择']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
