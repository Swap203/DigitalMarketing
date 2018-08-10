<?php
	//print_r($_POST);
	include '../../../common/session.php';

		
  	if(isset($_POST['title']) && $_POST['title'] !="" && 
       isset($_POST['url']) && $_POST['url'] !="" &&
       isset($_POST['publish_date']) && $_POST['publish_date'] !="" &&
       isset($_POST['for_whom']) && $_POST['for_whom'] !="" &&
       isset($_POST['work_type']) && $_POST['work_type'] !=""){

        
		$title = $_POST['title'];
        $url = $_POST['url'];
        $publish_date = $_POST['publish_date'];
        $for_whom = $_POST['for_whom'];
        $work_type = $_POST['work_type'];
       
        if(isset($_FILES['work_image']) && $_FILES['work_image']['name']!=""):
             $work_image = $_FILES['work_image'];
        
                $file=$_FILES['work_image'];
                //$path="assets/images/our_work";
                $path="../../../assets/images/our_work";
                $type= array("image/gif","image/png","image/jpeg","image/jpg");
                $size = 2*1024*1024;
                $image = $obj->upload_file($file, $type, $size, $path);
                $image = "assets/images/our_work/".$image;
                //echo $image;
                $obj->insert("our_work","title,url,image,publish_date,for_whom,type","'$title','$url','$image','$publish_date','$for_whom','$work_type'");
            
			$data['response'] ="y";
			$data['message'] ="Data Added Successfully";
			echo json_encode($data);
		else:
                $data['response'] ="n";
                $data['message'] ="Please Select Image";
                echo json_encode($data);
        endif;
	}
	else{

		$data['response'] ="n";
		$data['message'] ="All fileds are required";
		echo json_encode($data);
	}

?>