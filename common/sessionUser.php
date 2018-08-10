<?php 

/*Session Management*/

require 'library.php';

session_start();
if(!isset($_SESSION['log_ISid'])){

	header("Location:index.php");
	exit();
}


?>