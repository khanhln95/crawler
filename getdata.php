<?php
include "lib/crawler.php";
include_once "lib/vnexpresscrawler.php";
include_once "lib/vnnetcrawler.php";
include_once "doquery.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Get Link</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <?php
  $input_title = "";
  $input_content = "";
  $getSource = "";
  $handle = "";
  
  $crawler = new Crawler;
  if(isset($_POST['getlink'])){
    $crawler->setUrl($_POST['getlink']);
    $crawler->crawl();
  }
  //phan tich url de kiem tra source dc lay tu vnexpress or vietnamnet
  if(isset($crawler->url)){
    $src1 = explode('://',$crawler->url);
    if(isset($src1[1])){
      $src2 = explode('/',$src1[1]);
      $getSource = $src2[0];
    } 
  }

  switch($getSource){
    case 'vnexpress.net': $handle = new VnExpressCrawler();
    break;
    case 'vietnamnet.vn': $handle = new VietnamnetCrawler();
    break;
  }

  if($handle != ""){
    $handle->setUrl($_POST['getlink']);
    $handle->getInfo();
    $input_title = $handle->title;
    $input_content = $handle->content;
    $handle->saveData();
  }
  ?>


  <form action="" method="POST">
    <label>Nhập link:</label>
    <input type="text" class="form-control" name="getlink">
    <button class="btn btn-success" type="submit" name="btn-getlink">GET LINK</button>
    <br>
    <label>Source</label>
    <input type="text" name="source" class="form-control" style="height:30px; width: 100%;"  value="<?php echo $getSource; ?>">
    <label>Title</label>
    <input type="text" name="title" class="form-control" style="height:30px; width: 100%;"  value="<?php echo $input_title; ?>"> <br>
    <label>Content</label>
    <textarea rows="5" name="content" class="form-control" style="width:100%;"><?php echo strip_tags($input_content,''); ?></textarea>
    <br>
    <button type="submit" name="submit">Save</button>
  </form>
</body>
</html>
