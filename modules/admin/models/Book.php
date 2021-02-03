<?php
namespace app\modules\admin\models;

class Book extends \app\models\Book
{

    public $imageFile;

    public function rules()
    {
        return [
            ['isbn','unique'],
            [['title','longDescription','status','shortDescription'],'string'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['id','pageCount'],'integer'],
            ['publishedDate','filter','filter'=>[$this,'publishedDate']],
            [['authors','categories'],'string',],
        ];
    }

    public function publishedDate($val){
        $date = new \DateTime();
        return $date->format('c');
    }

    public function upload()
    {
        if ($this->validate()) {
            $fileName = $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs('@webroot/uploads/' . $fileName);
            echo __DIR__;
            $this->thumbnailUrl = $fileName;
            $this->imageFile = null;
            return $fileName;
        } else {
            return false;
        }
    }

}