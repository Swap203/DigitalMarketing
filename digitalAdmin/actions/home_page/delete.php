<?php


	include '../../../common/session.php';

	$idArray = explode("-", $_POST['ID']);

	$id = $idArray[1];

	$query = "DELETE FROM categories where ID ='$id'";

	$obj->execute($query);
?>