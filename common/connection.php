<?php

class Connection{

	protected $conn ="";

	public function __construct()
	{
		
		$this->conn = new mysqli("localhost","root","","digital_marketing");
	}

	public function __destruct(){
		$this->conn->close();
	}
}

?>


