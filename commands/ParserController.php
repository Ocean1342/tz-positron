<?php


namespace app\commands;
use app\models\Book;
use yii\console\Controller;
use yii\console\ExitCode;

class ParserController extends Controller
{
    protected $en = "\n";
    protected $dataUrl = 'https://gitlab.com/prog-positron/test-app-vacancy/-/raw/master/books.json';

    public function actionIndex()
    {
        $data = $this->baseGenerator();

        foreach ($data as $k => $v) {
            $book = new Book();
            $book->attributes = $v;
            try{
                $book->save();
                echo $k, " book loading {$this->en}";
            } catch (\Exception $e){
                echo $k, " book exists (isbn - ".$v['isbn']." ) {$this->en}";
            }
        }
        return 0;
    }

    protected function baseGenerator() {
        $base = json_decode(file_get_contents($this->dataUrl), TRUE);
        echo 'count books = ', count($base), $this->en;
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