<?php
include "./connect.php";
class Crawler
{
  public $response, $ch, $title, $content, $regex_title, $regex_content, $source, $url;
  
  function setUrl($link){
    $this->url = $link;
  }
//boc tach du lieu tu 1 web site
  public function crawl(){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $this->response = curl_exec($ch);
    curl_close($ch);
  }
//lay ra title va content tu url nhap vao
  public function getInfo(){
    $this->crawl();
    preg_match($this->regex_title, $this->response, $titleX);
    preg_match($this->regex_content, $this->response, $contentX);
    if(isset($titleX[1]) && isset($contentX[1])){
      $this->title = $titleX[1];
      $this->content = $contentX[1];
    }
  }
  //save title va content lay duoc vao database
  public function saveData(){
    $ins = new Query(0, $this->title, $this->content, $this->source);
    $ins->insertToDB();
  }

}



?>
