<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '评论';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建评论', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'content:ntext',
            ['attribute'=>'content',
                'label' =>'内容',
                'value' =>'beginning'
//                'value' =>function($model){
//                    $tmpStr=strip_tags($model->content);
//                    $tmpLen = mb_strlen($tmpStr);
//
//                    return mb_substr($tmpStr,0,20,'utf-8').($tmpLen>20?'...':$tmpStr);
//                }
            ],
//            'status',
            ['attribute'=>'status',
                'label' =>'状态',
                'value'=>'status0.name',
                'filter' => \common\models\Commentstatus::find()
                    ->select(['name','id'])
                    ->orderBy('position')
                    ->indexBy('id')
                    ->column(),
                'contentOptions' =>
                    function($model){
                            return ($model->status== 1)?['class'=>'bg-danger']:[];
                    }
            ],
//            'create_time:datetime',
            ['attribute'=>'create_time',
                'label' =>'创建时间',
                'format' => ['date','php:Y.m.d H:i:s']
            ],
            'userid',
            // 'email:email',
            // 'url:url',
            // 'post_id',
            'post.title',

            //动作列的配置属性
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}{update}{delete}{approve}',
                'buttons'=>[
                    'approve'=>function($url,$model,$key){
                $options=[
                    'title'=>Yii::t('yii','审核'),
                    'aria-label'=>Yii::t('yii','审核'),
                    'data-confirm'=>Yii::t('yii','你确定要通过此条评论么?'),
                    'data-method'=>'post',
                    'data-pjax'=>'0',
                ];
                        return Html::a('<span class="glyphicon glyphicon-check"></span>>',$url,$options);
                    }
    ],

            ],
        ],
    ]); ?>
</div>
