<?php
/**
 * Created by PhpStorm.
 * User: salan
 * Date: 13.10.2017
 * Time: 16:21
 */

namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord {

// Функция для вывода таблицы с названием не соответствующем названию модели
    public static function tableName(){
        return 'categories';
    }

}