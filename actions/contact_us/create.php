<?php
	include '../../common/session.php';
	if(isset($_POST['name']) && $_POST['name'] !="" &&
       isset($_POST['email']) && $_POST['email'] !="" && 
       isset($_POST['subject']) && $_POST['subject'] !="" && 
       isset($_POST['message']) && $_POST['message'] !=""){

		
		$name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        
		$obj->insert("contact_us","name,email,subject,message",
                     "'$name','$email','$subject','$message'");
        $data['response'] ="y";
        $data['message'] ="Your Message Submitted Successfully, We'll Get Back to You Shortly";
        echo json_encode($data);
		}
	else{

		$data['response'] ="n";
		$data['message'] ="All fileds are required";
		echo json_encode($data);
	}

?>