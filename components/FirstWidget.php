<?php
namespace app\components;


use yii\base\Widget;

class FirstWidget extends Widget {

    public $name;

    public function init() {
        parent::init();

     //   ob_start();

        if($this->name === null) $this->name = 'Гость';
    }

    public function run() {
     //   $content = ob_get_clean();
       return $this->render('first', ['name' => $this->name]);
    }
}