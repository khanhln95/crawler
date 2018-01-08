<?php 
include_once './connect.php';
class BaiViet{
    public $id;
    public $title;
    public $content;
    public $source;
    
    public function BaiViet($m_id, $m_title, $m_content, $m_source){
        $this->id = $m_id;
        $this->title = $m_title;
        $this->content = $m_content;
        $this->source = $m_source;
    }

    public function InsertBaiViet(){
        $db = new DatabaseX();
        $query = "INSERT INTO savedata (title, content, source) VALUES ('$this->title','$this->content','$this->source')";
        $db->DoQuery($query);
  
    }
    public function DeleteBaiViet(){

    }
    public function UpdateBaiViet(){

    }
}
?>