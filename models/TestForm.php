<?php
/**
 * Created by PhpStorm.
 * User: salan
 * Date: 13.10.2017
 * Time: 11:07
 */

namespace app\models;

use yii\base\Model;

class TestForm extends Model {

    public $name;
    public $email;
    public $text;

    public function attributeLabels() {
        return [
            'name' => 'Имя',
            'email' => 'Электронная почта',
            'text' => 'Текст сообщения',
        ];
    }

    public function rules() {
        return [
            [['name', 'email'], 'required'],
            ['name' , 'string', 'min' => 2],
            ['email', 'email'],
            ['text', 'trim'],
        ];
    }



}