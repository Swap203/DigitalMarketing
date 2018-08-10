<?php
	include '../../../common/session.php';
	if(isset($_POST['work_type']) && $_POST['work_type']){

		
		$work_type = $_POST['work_type'];
        
		$record = $obj->select("type","work_type","type='$work_type'");

		if(is_array($record))
        {
            $data['response'] ="n";
            $data['message'] ="Type Already Exist";
            echo json_encode($data);
		}
		else
        {
                $obj->insert("work_type","type","'$work_type'");
                $data['response'] ="y";
                $data['message'] ="Data Added successfully";
                echo json_encode($data);
		}
	}
	else{

		$data['response'] ="n";
		$data['message'] ="All fileds are required";
		echo json_encode($data);
	}

?>