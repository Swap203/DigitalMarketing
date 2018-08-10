<?php

	include '../../../common/session.php';

	if(isset($_POST['working_hours']) && $_POST['working_hours'] !="" &&
       isset($_POST['happy_clients']) && $_POST['happy_clients'] !="" &&
       isset($_POST['awards']) && $_POST['awards'] !="" &&
       isset($_POST['projects']) && $_POST['projects'] !="" &&
       isset($_POST['id']) && $_POST['id'] !=""){
		$id = $_POST['id'];
		$working_hours = $_POST['working_hours'];
        $happy_clients = $_POST['happy_clients'];
        $awards = $_POST['awards'];
        $projects = $_POST['projects'];
                    
		$query = "UPDATE team_efforts SET working_hours='$working_hours',happy_clients='$happy_clients',awards='$awards',projects='$projects' WHERE ID ='$id'";
        $obj->execute($query);

		$data['response'] ='y';
		$data['message'] ="Update Successfully";
		echo json_encode($data);

	}
	else{
		$data['response'] ='n';
		$data['message'] ="All fields are required";
		echo json_encode($data);
	}
?>