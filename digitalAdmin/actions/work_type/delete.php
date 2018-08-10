<?php


	include '../../../common/session.php';

	$idArray = explode("-", $_POST['ID']);

	$id = $idArray[1];

	$query = "DELETE FROM work_type where ID ='$id'";

	$obj->execute($query);
?>