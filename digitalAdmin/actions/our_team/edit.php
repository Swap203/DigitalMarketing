<?php

	include '../../../common/session.php';

	if(isset($_POST['name']) && $_POST['name'] !="" &&
       isset($_POST['designation_company']) && $_POST['designation_company'] !="" &&
       isset($_POST['wordings']) && $_POST['wordings'] !="" && 
       isset($_POST['id']) && $_POST['id'] !=""){
        
		$id = $_POST['id'];
		$name = $_POST['name'];
        $designation_company = $_POST['designation_company'];
        $wordings = $_POST['wordings'];
        
        $record = $obj->select("image","testimonial","ID='$id'");
        
            if(isset($_FILES['testimonial_image']) && $_FILES['testimonial_image']['name']!=""):
                $file=$_FILES['testimonial_image'];
                $path="../../../assets/images/testimonial";
                $type= array("image/gif","image/png","image/jpeg","image/jpg");
                $size = 2*1024*1024;
                $image = $obj->upload_file($file, $type, $size, $path);
                $image = "assets/images/testimonial/".$image;
                
                $query="UPDATE testimonial SET name='$name', designation_company='$designation_company', wordings='$wordings',image='$image' WHERE ID='$id'";
                unlink('../../../'.$record[0][0]);
            
            else:
                $query="UPDATE testimonial SET name='$name', designation_company='$designation_company', wordings='$wordings' WHERE ID='$id'";
            endif;
        $obj->execute($query);
        
		$data['response'] ='y';
		$data['message'] ="Updated Successfully";
		echo json_encode($data);

	}
	else{
		$data['response'] ='n';
		$data['message'] ="All fields are required";
		echo json_encode($data);
	}
?>