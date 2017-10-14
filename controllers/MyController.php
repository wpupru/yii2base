<?php
/**
 * Created by PhpStorm.
 * User: salan
 * Date: 16.09.2017
 * Time: 3:47
 */

namespace app\controllers;


use yii\web\Controller;

class MyController extends AppController {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionHope($id = null){
        $hi = 'I hope to see You again!';
        $ok = 'I`m fine';
        $fio = ['Иванов','Петров','Сидоров','Самойлова','Ложкина'];
        /*return $this->render('hope',
            [
                'hope' => $hi,
                'ok' => $ok,
                'fio' => $names ]

        );*/
        if(!$id) $id = 'demo_status';

        return $this->render('hope',compact('hi','ok','fio','id'));
    }

    public function actionBlogPost(){
        return $this->render('blog-post');
    }
}