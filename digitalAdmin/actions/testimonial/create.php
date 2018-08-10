<?php
	//print_r($_POST);
	include '../../../common/session.php';
	if(isset($_POST['name']) && $_POST['name'] !="" &&
       isset($_POST['designation_company']) && $_POST['designation_company'] !="" &&
       isset($_POST['wordings']) && $_POST['wordings'] !=""){

		
		$name = $_POST['name'];
        $designation_company = $_POST['designation_company'];
        $wordings = $_POST['wordings'];
        
            if(isset($_FILES['testimonial_image']) && $_FILES['testimonial_image']['name']!=""):
                $file=$_FILES['testimonial_image'];
                $path="../../../assets/images/testimonial";
                $type= array("image/gif","image/png","image/jpeg","image/jpg");
                $size = 2*1024*1024;
                $image = $obj->upload_file($file, $type, $size, $path);
                $image = "assets/images/testimonial/".$image;
                
                $obj->insert("testimonial","name,designation_company,wordings,image","'$name','$designation_company','$wordings','$image'");
            
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