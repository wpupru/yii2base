<?php
/**
 * Created by PhpStorm.
 * User: salan
 * Date: 12.10.2017
 * Time: 12:33
 */

namespace app\controllers;



use yii\web\Controller;

class AppController extends Controller {

    public function debug($arr){
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }

}