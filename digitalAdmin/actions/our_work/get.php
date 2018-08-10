<?php
	include '../../../common/session.php';
	
	$id = $_POST['id'];

	$idarray = explode("-", $id);

	$id = $idarray[1];

	$record = $obj->select("*","our_work","ID ='$id'");

	if(is_array($record)){
		$data['response'] ='y';
		$data['id'] = $record[0][0];
		$data['title'] = $record[0][1];
        $data['url'] = $record[0][2];
        $data['publish_date'] = $record[0][4];
        $data['for_whom'] = $record[0][5];
		
        $work_type_id = $record[0][6];
        
        $record = $obj->select("ID,type","work_type","1");
        $work_type  = $obj->dynamic_edit_dropdown($record,"work_type","Work Type",$work_type_id);
        
        $data['type'] = $work_type;

		echo json_encode($data);

	}
	else{
		$data['response'] ='n';
		$data['message'] ='Technical Error';
		echo json_encode($data);
	}
?>