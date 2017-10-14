<?php
/**
 * Created by PhpStorm.
 * User: salan
 * Date: 13.10.2017
 * Time: 19:11
 */

namespace app\models;




use yii\db\ActiveRecord;

class Product extends ActiveRecord {

    public static function tableName(){
        return 'products';
    }

}