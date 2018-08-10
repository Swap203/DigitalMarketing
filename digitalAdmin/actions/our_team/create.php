<?php
	//print_r($_POST);
	include '../../../common/session.php';
	if(isset($_POST['name']) && $_POST['name'] !="" &&
       isset($_POST['designation']) && $_POST['designation'] !="" &&
       isset($_POST['facebook']) && $_POST['facebook'] !="" &&
       isset($_POST['twitter']) && $_POST['twitter'] !=""){

		
		$name = $_POST['name'];
        $designation = $_POST['designation'];
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        
            if(isset($_FILES['profile_image']) && $_FILES['profile_image']['name']!=""):
                $file=$_FILES['profile_image'];
                $path="../../../assets/images/our_team";
                $type= array("image/gif","image/png","image/jpeg","image/jpg");
                $size = 2*1024*1024;
                $image = $obj->upload_file($file, $type, $size, $path);
                $image = "assets/images/our_team/".$image;
                
                $obj->insert("meet_our_team","name,designation,facebook_url,twitter_url,image","'$name','$designation_company','$wordings','$image'");
            
            else:
                $obj->insert("testimonial","name,designation_company,wordings","'$name','$designation_company','$wordings'");
            endif;
            
			$data['response'] ="y";
			$data['message'] ="Testimonial Added";
			echo json_encode($data);
	}
	else{

		$data['response'] ="n";
		$data['message'] ="All fileds are required";
		echo json_encode($data);
	}

?>