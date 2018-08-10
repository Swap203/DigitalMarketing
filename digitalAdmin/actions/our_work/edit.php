<?php

	include '../../../common/session.php';

	if(isset($_POST['for_whom']) && $_POST['for_whom'] !="" &&
       isset($_POST['id']) && $_POST['id'] !="" && 
      isset($_POST['title']) && $_POST['title'] !="" &&
      isset($_POST['url']) && $_POST['url'] !="" &&
      isset($_POST['publish_date']) && $_POST['publish_date'] !="" &&
      isset($_POST['work_type']) && $_POST['work_type'] !=""
      ){
        
        
		$id = $_POST['id'];
		$title = $_POST['title'];
        $publish_date = $_POST['publish_date'];
        $for_whom = $_POST['for_whom'];
        $work_type = $_POST['work_type'];
        $url = $_POST['url'];
		$record = $obj->select("image","our_work","ID='$id'");
        if(isset($_FILES['work_image']) && $_FILES['work_image']['name']!=""):
             
                $work_image = $_FILES['work_image'];
        
                $file=$_FILES['work_image'];
                //$path="assets/images/our_work";
                $path="../../../assets/images/our_work";
                $type= array("image/gif","image/png","image/jpeg","image/jpg");
                $size = 2*1024*1024;
                $image = $obj->upload_file($file, $type, $size, $path);
                $image = "assets/images/our_work/".$image;

            $query = "UPDATE our_work SET title='$title',url='$url',image='$image', publish_date='$publish_date',for_whom='$for_whom',type='$work_type'
            WHERE ID ='$id'";
            unlink("../../../".$record[0][0]);
        else:
		  $query = "UPDATE our_work SET title='$title',url='$url', publish_date='$publish_date',for_whom='$for_whom',type='$work_type'
            WHERE ID ='$id'";
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