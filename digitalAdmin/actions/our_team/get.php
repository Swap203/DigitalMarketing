<?php
	include '../../../common/session.php';
	
	$id = $_POST['id'];

	$idarray = explode("-", $id);

	$id = $idarray[1];

	$record = $obj->select("*","testimonial","ID ='$id'");

	if(is_array($record)){
		$data['response'] ='y';
		$data['id'] = $record[0][0];
		$data['name'] = $record[0][1];
        $data['designation_company'] = $record[0][2];
        $data['wordings'] = $record[0][3];	

		echo json_encode($data);

	}
	else{
		$data['response'] ='n';
		$data['message'] ='Technical Error';
		echo json_encode($data);
	}
?>