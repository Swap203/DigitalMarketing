<?php

	include '../../../common/session.php';

	if(isset($_POST['category']) && $_POST['category'] !="" && 
       isset($_POST['description']) && $_POST['description'] !="" && 
       isset($_POST['id']) && $_POST['id'] !=""){
		$id = $_POST['id'];
		$category = $_POST['category'];
		$description = $_POST['description'];
        
		$query = "UPDATE who_we_are SET category='$category',description='$description'  WHERE ID ='$id'";

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