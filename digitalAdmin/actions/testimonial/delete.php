<?php


	include '../../../common/session.php';

	$idArray = explode("-", $_POST['ID']);

	$id = $idArray[1];

    $record = $obj->select("image","testimonial","ID='$id'");

	$query = "DELETE FROM testimonial WHERE ID ='$id'";

	$obj->execute($query);
    unlink("../../../".$record[0][0]);
?>