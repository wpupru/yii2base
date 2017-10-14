<?php $this->beginBlock('block1') ?>
    <h1>Заголовок страницы</h1>
    <?php $this->endBlock() ?>

<h1>Show action</h1>

<?php
 foreach ($cats as $cat){
    echo '<ul>';
        echo '<li>' .$cat->title. '</li>';
            $products = $cat->products;
            foreach ($products as $product){
                echo '<ul>';
                echo '<li>' .$product->title. '</li>';
                echo '</ul>';
            }
    echo '</ul>';
}
//?>

<?php
//foreach ($prods as $prod){
//    echo $prod->title . '<br>';
//}
?>

<?php// debug($cats) ?>
<?php// echo count($cats[0]->products) ?>
<?php// debug($cats) ?>
<?php// debug($prods) ?>

<?php $this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']) ?>