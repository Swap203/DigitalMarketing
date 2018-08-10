<?php


	include '../../../common/session.php';

	$idArray = explode("-", $_POST['ID']);

	$id = $idArray[1];

	$query = "DELETE FROM team_efforts where ID ='$id'";

	$obj->execute($query);
?>