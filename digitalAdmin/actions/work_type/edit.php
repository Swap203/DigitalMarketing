<?php

	include '../../../common/session.php';

	if(isset($_POST['work_type']) && $_POST['work_type'] !="" &&
       isset($_POST['id']) && $_POST['id'] !=""){
		$id = $_POST['id'];
		$work_type = $_POST['work_type'];
        
        $record = $obj->select("type","work_type","type='$work_type'");

		if(is_array($record))
        {
            $data['response'] ="n";
            $data['message'] ="Type Already Exist";
            echo json_encode($data);
		}
        else{
            $query = "UPDATE work_type SET type='$work_type' WHERE ID ='$id'";
            $obj->execute($query);

            $data['response'] ='y';
            $data['message'] ="Update Successfully";
            echo json_encode($data);
        }
	}
	else{
		$data['response'] ='n';
		$data['message'] ="All fields are required";
		echo json_encode($data);
	}
?>