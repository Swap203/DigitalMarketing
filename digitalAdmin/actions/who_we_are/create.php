<?php
	//print_r($_POST);
	include '../../../common/session.php';
	if(isset($_POST['category']) && $_POST['category'] !="" && isset($_POST['description']) && $_POST['description'] !=""){

		
		$category = $_POST['category'];
        $description = $_POST['description'];
        
		 $record = $obj->select("*","who_we_are","category = '$category'");

		if(is_array($record))
        {
        	$data['response'] = "n";
			$data['message'] = "Category Already Exist";
			echo json_encode($data);
		}
		else
        {
                $obj->insert("who_we_are","category,description","'$category','$description'");
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