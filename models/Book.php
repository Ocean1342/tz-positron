<?php


namespace app\models;


use yii\db\ActiveRecord;
use yii\helpers\Url;
use function foo\func;

class Book extends ActiveRecord
{
    public static function tableName()
    {
        return "book";
    }
    public function rules()
    {
        return [
//            ['isbn','unique'],
            [['isbn', 'title'], 'unique', 'targetAttribute' => ['isbn', 'title']],
            [['longDescription','status','shortDescription'],'string'],
            [['thumbnailUrl'], 'filter', 'filter' =>[$this,'thumbnailUrl']],
            ['pageCount','integer'],
            ['publishedDate','filter','filter'=>[$this,'publishedDate']],
            [['authors'],'filter', 'filter' => [$this,'authors']],
            [['categories'],'filter', 'filter' => [$this,'categories']]
        ];
    }
        public function categories($value){
            if (empty($value)) {
                $str = 'New';
            }else{
                $str = implode(',', $value);
            }
            return $str;
        }
        public function authors($value){
            $str = implode(',', $value);
            return $str;
        }
        public function publishedDate($val){
            $date = new \DateTime($val['$date']);
            return $date->format('c');
        }

        public function thumbnailUrl($imgUrl)
        {
            if (strlen($imgUrl) == 0) return 'no-image.jpg';
            $imgUrlParse = parse_url($imgUrl);
            $urlImg = explode('/',$imgUrlParse['path']);
            $imgName = $urlImg[count($urlImg)-1];
            $serverPath = \Yii::getAlias('@app').\Yii::getAlias('@uploads').'/'.$imgName;
            if (file_exists($serverPath) ) return $imgName;
            try{
                $file  = file_get_contents($imgUrl);
            } catch (\Exception $e) {
                echo $e->getMessage();
                return 'no-image.jpg';
            }
            file_put_contents($serverPath, $file);
            return $imgName;
        }

}