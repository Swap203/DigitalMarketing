<?php

	include '../../../common/session.php';

	if(isset($_POST['heading']) && $_POST['heading'] !="" && 
       isset($_POST['description']) && $_POST['description'] !="" && 
       isset($_POST['id']) && $_POST['id'] !=""){
        
		$id = $_POST['id'];
		$heading = $_POST['heading'];
        $description = $_POST['description'];
        //echo $description;
        //echo $heading;
        $record = $obj->select("image","home_page","ID='$id'");
            if(isset($_FILES['home_page_image']) && $_FILES['home_page_image']['name']!=""):
                $file=$_FILES['home_page_image'];
                $path="../../../assets/images/home_page";
                $type= array("image/gif","image/png","image/jpeg","image/jpg");
                $size = 2*1024*1024;
                $image = $obj->upload_file($file, $type, $size, $path);
                $image = "assets/images/home_page/".$image;
                $query="UPDATE home_page SET heading='$heading', description='$description', image='$image'  WHERE ID='$id'";
                unlink('../../../'.$record[0][0]);
            else:
                $query="UPDATE home_page SET heading='$heading', description='$description' WHERE ID='$id'";
            endif;
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