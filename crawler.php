<?php
include "connect.php";
class Crawler
{
  public $url, $response, $ch, $title, $content, $sql, $regex_title, $regex_content,$source ;
  public function crawl(){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $this->response = curl_exec($ch);
    curl_close($ch);
  }

  public function show(){
    if(isset($_POST['getlink'])){
      $this->url = $_POST['getlink'];
      $this->crawl();
    }
  }

  public function getInfo()
  {
    $this->show();
    preg_match($this->regex_title, $this->response, $titleX);
    preg_match($this->regex_content, $this->response, $contentX);
    if(isset($titleX[1]) && isset($contentX[1])){
      $this->title = $titleX[1];
      $this->content = $contentX[1];
    }
    if(isset($_POST["submit"])){
      $title = $_POST["title"];
      $content = $_POST["content"];
      $source = $_POST["source"];
    }
  }

  public function GetLink(){
    $result = $this->getInfo();
    return $result;
  }
  public function saveData($title, $content, $source){
    $db1 = new DatabaseX('localhost','root','','crawler');
    $query = "insert into savedata (title, content, source) values ('$title','$content','$source')";
    $db1->InsertToTable($query);
  }
}

class VnExpressCrawler extends Crawler {
  function VnExpressCrawler(){
    $this->regex_title = '/\<h1 class="title_news_detail mb10".*\>(.*)\<\/h1\>/isU';
    $this->regex_content= '/\<article class="content_detail fck_detail width_common block_ads_connect".*\>(.*)\<\/article\>/isU';
  }
}
class VietnamnetCrawler extends Crawler {
  function VietnamnetCrawler(){
    $this->regex_title = '/\<h1 class="title".*\>(.*)\<\/h1\>/isU';
    $this->regex_content= '/\<div id="ArticleContent" class="ArticleContent".*\>(.*)\<\/div\>/isU';
  }
}
?>
