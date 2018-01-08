<?php 
include_once "crawler.php";
class VietnamnetCrawler extends Crawler {
  function VietnamnetCrawler(){
    $this->source = 'vietnamnet.vn';
    $this->regex_title = '/\<h1 class="title".*\>(.*)\<\/h1\>/isU';
    $this->regex_content= '/\<div id="ArticleContent" class="ArticleContent".*\>(.*)\<\/div\>/isU';
  }
  
}
 ?>