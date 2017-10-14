<?php
/**
 * Created by PhpStorm.
 * User: salan
 * Date: 14.10.2017
 * Time: 9:28
 */

namespace app\models;


use yii\db\ActiveRecord;

class Article extends ActiveRecord {

    public static function tableName() {
        return 'pages';
    }

}