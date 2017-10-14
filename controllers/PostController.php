<?php
/**
 * Created by PhpStorm.
 * User: salan
 * Date: 12.10.2017
 * Time: 12:40
 */

namespace app\controllers;

use app\models\Article;
use app\models\Category;
use app\models\Product;
use Yii;
use app\models\TestForm;


class PostController extends AppController{

    public $layout = 'basic';

    public function actionIndex(){

        $this->view->title = 'Все статьи';
        $this->view->registerMetaTag(['name' => 'keywords','content' => 'ключевик1,ключевик2,ключевик3...']);
        $this->view->registerMetaTag(['name' => 'description','content' => 'описание...']);

        $model = new TestForm();
        if($model->load(Yii::$app->request->post()) ){
            if($model->validate()){
                Yii::$app->session->setFlash('success', 'Данные приняты');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Произошла ошибка, данные не приняты');
            }
        }


       return $this->render('index', compact('model'));
    }

    public function actionShow(){

     //   $this->layout = 'basic';

        $this->view->title = 'Одна статья';
        $this->view->registerMetaTag(['name' => 'keywords','content' => 'ключевик1,ключевик2,ключевик3...']);
        $this->view->registerMetaTag(['name' => 'description','content' => 'описание...']);

// Выборка из базы данных
       // $cats = Category::find()->all();
       // $cats = Category::find()->orderBy(['id' => SORT_ASC])->all();
       // $cats = Category::find()->asArray()->all();
       // $cats = Category::find()->asArray()->where('parent=691')->all();
       // $cats = Category::find()->asArray()->where(['parent' => 692])->all();
       // $cats = Category::find()->asArray()->where(['like','title','pp'])->all();
       // $cats = Category::find()->asArray()->where(['<=','id',695])->all();
       // $cats = Category::find()->asArray()->where('parent=691')->limit(3)->all();
       // $cats = Category::find()->asArray()->where('parent=691')->one();
       // $cats = Category::find()->asArray()->where('parent=691')->count();
       // $cats = Category::findOne(['parent' => 691]);
       // $cats = Category::findAll(['parent' => 876]);

        // Также можно использовать SQL запрос
       // $query = "SELECT * FROM categories WHERE title LIKE '%се%'";
       // $query = "SELECT * FROM categories WHERE id LIKE '%3%'";
      //  $query = "SELECT * FROM categories WHERE alias LIKE '%ak%'"; // %% использовать не безопасно
      //  $cats = Category::findBySql($query)->all();

        $query = "SELECT * FROM categories WHERE title LIKE :search";
        $cats = Category::findBySql($query, ['search' => '%пч%'])->all(); // Безопасно!

     //   $prods = Product::find()->where(['like','title','му'])->all();

       //   $query = "SELECT * FROM products WHERE title LIKE '%кк%'"; // %% использовать не безопасно
       //   $prods = Product::findBySql($query)->all();

      //  $query = "SELECT * FROM products WHERE title LIKE :search";
      //  $prods = Product::findBySql('$query', ['search' => '%кк%'])->all();



       // return $this->render('show', compact('cats'));
        return $this->render('show', compact('cats'));

    }

    public function actionArticle() {
        $article = Article::find()->all();



        return $this->render('article', compact('article'));
    }

}
