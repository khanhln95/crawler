<?php 
include_once './connect.php';
class Query{
    public $id;
    public $title;
    public $content;
    public $source;
    
    public function Query($m_id, $m_title, $m_content, $m_source){
        $this->id = $m_id;
        $this->title = $m_title;
        $this->content = $m_content;
        $this->source = $m_source;
    }

    public function insertToDB(){
        $db = new DatabaseX();
        $query = "INSERT INTO savedata (title, content, source) VALUES ('$this->title','$this->content','$this->source')";
        mysqli_query($db->conn, $query);
    }
}
?>