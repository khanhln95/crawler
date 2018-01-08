<?php
class DatabaseX
{
    public $conn;
    //ket noi toi database
	public function DatabaseX(){
		 $this->conn = mysqli_connect('localhost','root','','crawler') or die("không thể kết nối tới database");
	}
}
?>
