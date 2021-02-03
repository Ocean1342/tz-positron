<?php


namespace app\controllers;


use app\models\Book;
use yii\web\Controller;
use yii\helpers\Json;


class TestController extends Controller
{
/*
 * Необходимо реализовать:

Через консоль - парсинг книг, категорий из источника.
Изображения к книгам должны быть загружены на сервер.
При повторном парсинге элементы не должны дублироваться(если появятся новые книги, то парсер их должен добавить).
Если у товара нет категории, добавлять товар в категорию Новинки
 *
 * */

    protected $dataUrl = 'https://gitlab.com/prog-positron/test-app-vacancy/-/raw/master/books.json';

    public function actionIndex()
    {
        $data = $this->baseGenerator();
        $i = 0;
        foreach ($data as $k => $v) {
            if ($i > 10) break;
            $book = new Book();
            $book->attributes = $v;
            $this->saveImg($v['thumbnailUrl'],$book);
            $book->save();
            $i++;
        }

        return $this->render('index',compact('fail','data','catsInBase','newAr'));

    }

    protected function saveImg (string $imgUrl,Book $modal)
    {
        if (strlen($imgUrl) == 0) {
            $modal->thumbnailUrl = $imgName;
            return 'no-image.jpg';
        }
        $imgUrlParse = parse_url($imgUrl);
        $urlImg = explode('/',$imgUrlParse['path']);
        $imgName = $urlImg[count($urlImg)-1];
        $file  = file_get_contents($imgUrl);
        file_put_contents(\Yii::getAlias('@webroot').\Yii::getAlias('@uploads').'/'.$imgName, $file);
        $modal->thumbnailUrl = $imgName;
//        return $imgName;
    }
    public function actionImg()
    {
        $web = 'test';
        $imgUrl = 'https://s3.amazonaws.com/AKIAJC5RLADLUMVRPFDQ.book-thumb-images/ableson.jpg';
        $imgUrlParse = parse_url($imgUrl);
        $urlImg = explode('/',$imgUrlParse['path']);
        $imgName = $urlImg[count($urlImg)-1];
        $file  = file_get_contents('https://s3.amazonaws.com/AKIAJC5RLADLUMVRPFDQ.book-thumb-images/ableson.jpg');
        file_put_contents(\Yii::getAlias('@webroot').\Yii::getAlias('@uploads').'/'.$imgName, $file);
        return $this->render('img', compact('web'));
    }

    protected function baseGenerator() {
        $base = json_decode(file_get_contents($this->dataUrl), TRUE);
        for ($i=0; $i <count($base) ; $i++) {
            yield $base[$i];
        }
    }

    public function setDataUrl($url)
    {
        if ($url != '') $this->dataUrl = $url;
        else return 'url is empty';
    }

    public function actionClear()
    {
        Book::deleteAll();
    }
}
