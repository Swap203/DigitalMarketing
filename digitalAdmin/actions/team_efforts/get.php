<?php
	include '../../../common/session.php';
	
	$id = $_POST['id'];

	$idarray = explode("-", $id);

	$id = $idarray[1];

	$record = $obj->select("*","team_efforts","ID ='$id'");

	if(is_array($record)){
		$data['response'] ='y';
		$data['id'] = $record[0][0];
		$data['working_hours'] = $record[0][1];
        $data['happy_clients'] = $record[0][2];
        $data['awards'] = $record[0][3];
        $data['projects'] = $record[0][4];
		
		echo json_encode($data);

	}
	else{
		$data['response'] ='n';
		$data['message'] ='Technical Error';
		echo json_encode($data);
	}
?>