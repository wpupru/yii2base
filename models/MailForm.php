<?php
/**
 * Created by PhpStorm.
 * User: salan
 * Date: 13.10.2017
 * Time: 11:07
 */

namespace app\models;

use yii\db\ActiveRecord;


class MailForm extends ActiveRecord {

    public static function tableName() {
        return 'posts';
    }


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
            ['email', 'email'],
            ['text', 'trim'],
        ];
    }



}