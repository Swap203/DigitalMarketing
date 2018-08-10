<?php


	include '../../../common/session.php';

	$idArray = explode("-", $_POST['ID']);

	$id = $idArray[1];

	$query = "DELETE FROM who_we_are where ID ='$id'";

	$obj->execute($query);
?>