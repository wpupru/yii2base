<?php
/**
 * Created by PhpStorm.
 * User: salan
 * Date: 18.09.2017
 * Time: 17:07
 */

namespace app\controllers\admin;

use app\controllers\AppController;
use yii\web\Controller;

class UserController extends AppController {

    public function actionIndex(){

    //    return 'ADMIN';
       return $this->render('index');
    }
}