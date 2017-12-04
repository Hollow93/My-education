<?php
error_reporting(E_ALL);
mb_internal_encoding('utf-8');

class News
{
    private static $time;
    private static $date;
    private $label;
    private $comment;


    public function getTime()
    {
        return self::$time = date("H:i:s");
    }
    public function getDate()
    {
        return self::$date = date('Y-m-d');
    }

    public function getLabel()
    {
        return $this->label = $_POST['label'];
    }
    public function getComment()
    {
        return $this->comment = $_POST['comment'];
    }
}

$news_daily = new News();
$save[0] = $news_daily->getTime().PHP_EOL;
$save[1] = $news_daily->getDate().PHP_EOL;
$save[2] = $news_daily->getLabel().PHP_EOL;
$save[3] = $news_daily->getComment().PHP_EOL;

$name = $_POST['label'];


file_put_contents("$name.json",$save ,FILE_APPEND);






