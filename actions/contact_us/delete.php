<?php


	include '../../common/session.php';
    echo $_POST['ID'];
	$idArray = explode("-", $_POST['ID']);
    
	$id = $idArray[1];
    echo $id;
	$query = "DELETE FROM contact_us where ID ='$id'";

	$obj->execute($query);
?>