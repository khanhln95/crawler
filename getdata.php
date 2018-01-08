<?php
include 'crawler.php';
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
  $x = new Crawler;
  $x->show();
  $input_title = "";
  $input_content = "";
  $getSource = "";
  if(isset($x->url)){
    $mang1 = explode('://',$x->url);
    if(isset($mang1[1])){
      $mang2 = explode('/',$mang1[1]);
      $getSource = $mang2[0];
    }
   
  }
  if($getSource == "vnexpress.net"){
    $handle = new VnExpressCrawler();
    $handle->GetLink();
    $handle->saveData($handle->title, $handle->content, $handle->source);
    $input_title = $handle->title;
    $input_content = $handle->content;
  }else if($getSource == "vietnamnet.vn"){
    $handle = new VietnamnetCrawler();
    $handle->GetLink();
    $handle->saveData($handle->title, $handle->content, $handle->source);
    $input_title = $handle->title;
    $input_content = $handle->content;
  }
  ?>


  <form action="" method="POST">
    <label>Nhập link:</label>
    <input type="text" class="form-control" name="getlink">
    <button class="btn btn-success" type="submit" name="gettlink">GET LINK</button>
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
