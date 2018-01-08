<?php
class DatabaseX
{
	public $conn;
	public function DatabaseX($server, $user, $pass, $dbname){
		 $this->conn = mysqli_connect($server,$user, $pass, $dbname );
	}
	public function InsertToTable($ins_query ){
		mysqli_query($this->conn, $ins_query);
	}
}

?>
