<?php 
include_once "crawler.php";
class VnExpressCrawler extends Crawler {
  function __construct(){
    $this->source = 'vnexpress.net';
    $this->regex_title = '/\<h1 class="title_news_detail mb10".*\>(.*)\<\/h1\>/isU';
    $this->regex_content= '/\<article class="content_detail fck_detail width_common block_ads_connect".*\>(.*)\<\/article\>/isU';
  }
}
 ?>