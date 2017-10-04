<?php
namespace console\controllers;


use common\models\Post;
use yii\web\Controller;

class HelloController extends Controller{

    public function actionIndex(){

        echo "Hello World \n";
    }

    public function actionList(){

        $posts = Post::find()->all();
        foreach ($posts as $post){
            echo ($post['id'].'-'.$post['title'].'\n');
        }
    }
}