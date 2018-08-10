<?php

	
include '../../../common/library.php';
	

if(isset($_POST['user_name']) && isset($_POST['password']) && $_POST['user_name']!='' && $_POST['password']!=''){
	
		$user_name = $_POST['user_name'];
		
		$password = $_POST['password'];
		//echo $user_name;
    //echo $password;
		$record1 = $obj->select("ID","admin","user_name='$user_name'");
		if(is_array($record1)){
			//$password = $password;
			$record = $obj->select("*","admin","password='$password' AND user_name ='$user_name'");

			if(is_array($record)){
				$data["response"]='y';
				session_start();
				$_SESSION["digital_login_id"] = $record[0][0];
				echo json_encode($data);
			}
			else{
				$data["response"]='n';
				$data["message"]='Password Does Not Match';
				echo json_encode($data);
			}

		}
		else{
			$data["response"]='n';
			$data["message"]='User Name is Not Register';
			echo json_encode($data);

		}
	}
?>
