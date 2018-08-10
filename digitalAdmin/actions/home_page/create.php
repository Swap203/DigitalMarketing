<?php
	//print_r($_POST);
	include '../../../common/session.php';
	if(isset($_POST['heading']) && $_POST['heading'] !="" && isset($_POST['description']) && $_POST['description'] !=""){

		
		$heading = $_POST['heading'];
        $description = $_POST['description'];
        
        
		 $record = $obj->select("*","home_page","1");

		if(is_array($record)){
            $id = $record[0][0];
            
            if(isset($_FILES['home_page_image']) && $_FILES['home_page_image']['name']!=""):
                $file=$_FILES['home_page_image'];
                $path="../../../assets/images/home_page";
                $type= array("image/gif","image/png","image/jpeg","image/jpg");
                $size = 2*1024*1024;
                $image = $obj->upload_file($file, $type, $size, $path);
                $image = "assets/images/home_page/".$image;
            
                $query="UPDATE home_page SET heading='$heading', description='$description', image='$image'  WHERE ID='$id'";
                unlink('../../../'.$record[0][3]);
            else:
                $query="UPDATE home_page SET heading='$heading', description='$description' WHERE ID='$id'";
            endif;
            
            
            $obj->execute($query);
           
			$data['response'] ="y";
			$data['message'] ="Updated Existing Data";
			echo json_encode($data);
		}
		else{
            
            if(isset($_FILES['home_page_image']) && $_FILES['home_page_image']!=""):
                $file=$_FILES['home_page_image'];

                $path="../../../assets/images/home_page";

                $type= array("image/gif","image/png","image/jpeg","image/jpg");
                $size = 2*1024*1024;

                $image = $obj->upload_file($file, $type, $size, $path);

                $image = "assets/images/home_page/".$image;

                $obj->insert("home_page","heading,description,image","'$heading','$description','$image'");

                $data['response'] ="y";
                $data['message'] ="Data Created successfully";
                echo json_encode($data);
            else:
                $data['response'] ="n";
                $data['message'] ="Please Select Image";
                echo json_encode($data);
            endif;
		}
	}
	else{

		$data['response'] ="n";
		$data['message'] ="All fileds are required";
		echo json_encode($data);
	}

?>