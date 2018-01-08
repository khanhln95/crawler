<?php
class DatabaseX
{
	public $conn;
	public function DatabaseX(){
		 $this->conn = mysqli_connect('localhost','root','','crawler') or die("không thể kết nối tới database");
	}
	public function DoQuery($ins_query ){
		mysqli_query($this->conn, $ins_query);
	}
}
?>
