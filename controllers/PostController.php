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
use app\models\MailForm;


class PostController extends AppController{

    public $layout = 'basic';

    public function actionIndex(){

        $this->view->title = 'Все статьи';
        $this->view->registerMetaTag(['name' => 'keywords','content' => 'ключевик1,ключевик2,ключевик3...']);
        $this->view->registerMetaTag(['name' => 'description','content' => 'описание...']);

// Обращение к данным в таблице
     //  $post = MailForm::findOne(5);

        // Обновление и изменение данных в таблице
    //   $post->email = 'kruk@taganka.org';
     //  $post->save(); // Для обновления нескольких записей используетя метод updateAll()

        // Удаление данных из базы
      //  $post = MailForm::findOne(2);
      //  $post->delete();

        // Для удаление нескольких записей используется метод deleteAll()
      //  MailForm::deleteAll(['>', 'id', 4]);




        $model = new MailForm();

    /*    $model->name = 'Автор';
        $model->email = 'pke@pochta.ws';
        $model->text = 'Пробный текст для организации приёмы данных из формы.';
        $model->save();*/

    // Метод save() подставляется вместо метода валидации, поскольку он уже включает в себя валидацию!

        if($model->load(Yii::$app->request->post()) ){
            if($model->save()){
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

      //  $query = "SELECT * FROM categories WHERE title LIKE :search";
      //  $cats = Category::findBySql($query, ['search' => '%пч%'])->all(); // Безопасно!

     //   $prods = Product::find()->where(['like','title','му'])->all();

       //   $query = "SELECT * FROM products WHERE title LIKE '%кк%'"; // %% использовать не безопасно
       //   $prods = Product::findBySql($query)->all();

      // $query = "SELECT * FROM products WHERE title LIKE :search";
      //  $prods = Product::findBySql('$query', ['search' => '%кк%'])->all();

      //  $cats = Category::findOne(694); // Ленивая(отложенная загрузка)

        //  $cats = Category::find()->with('products')->where('id=694')->all(); // Жадная(полная) загрузка


// С with() загрузка будет жадной, и будет только 6 запросов к ДБ, беоз with() загрузка ленивая, и будет 41 запрос при одинаковом результате вывода.
      //  $cats = Category::find()->->all(); // ленивая загрузка(41 запрос) - результат одинаковый
        $cats = Category::find()->with('products')->all(); // жадная загрузка (6 запросов) - результат одинаковый

       // return $this->render('show', compact('cats'));
        return $this->render('show', compact('cats'));

    }

    public function actionArticle() {
     //   $article = Article::find()->all();

      //  $articles_query = "SELECT * FROM pages WHERE title LIKE '%мп%'";
      //    $article = Article::findBySql($articles_query)->all();

        $articles_query = "SELECT * FROM pages WHERE description LIKE :search";
          $article = Article::findBySql($articles_query, ['search' => '%ак%'])->all();



        return $this->render('article', compact('article'));
    }

    public function actionWidget(){
        return $this->render('widget');
    }

}
