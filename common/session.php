<?php 

/*Session Management*/

require 'library.php';

session_start();
if(!isset($_SESSION['digital_login_id']) ){
	header("Location:index.php");
	exit();
}
/*

if(in_array(2, array_values($_SESSION['log_role']))){
	header("Location:index.php");
	exit();
}
*/



?>