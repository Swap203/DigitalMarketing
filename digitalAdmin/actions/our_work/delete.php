<?php


	include '../../../common/session.php';

	$idArray = explode("-", $_POST['ID']);

	$id = $idArray[1];
    $record = $obj->select("image","our_work","ID='$id'");
	$query = "DELETE FROM our_work where ID ='$id'";
    $obj->execute($query);
    unlink("../../../".$record[0][0]);
?>