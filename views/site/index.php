<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>PUBLISH</h1>
    </div>
    <div class="body-content">
        <div class="row">
            <?php
                if (empty($books)) {
                    echo 'Здесь будет вывод книг';
                } else{
                foreach ($books as $key => $book){
                    $shortDescription = ($book['shortDescription'] != '') ? $book['shortDescription']  : mb_strimwidth($book['longDescription'],0,600) ;
                ?>
                    <div class=" col-xs-12 col-md-6 col-lg-4 main">
                        <h2 class="main__head"><?=$book['title']?></h2>
                        <p class="main__text"><?=$shortDescription ?></p>
                        <p><a class="btn btn-default" href="<?=\yii\helpers\Url::to(['site/book','id'=>$book['id']])?>">Подробнее</a></p>
                    </div>
                <?php
                    }
                }
                    ?>
            </div>
        </div>
    </div>
</div>
