<?php
	include '../../../common/session.php';
	
	$id = $_POST['id'];

	$idarray = explode("-", $id);

	$id = $idarray[1];

	$record = $obj->select("*","home_page","ID ='$id'");

	if(is_array($record)){
		$data['response'] ='y';
		$data['id'] = $record[0][0];
		$data['heading'] = $record[0][1];
        $data['description'] = $record[0][2];
		

		echo json_encode($data);

	}
	else{
		$data['response'] ='n';
		$data['message'] ='Technical Error';
		echo json_encode($data);
	}
?>