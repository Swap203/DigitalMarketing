<?php

require 'connection.php';

 class Helper extends Connection{

	public function select($fieldName, $tableName, $condition){
		$query ="SELECT $fieldName FROM $tableName Where $condition";

		$result = $this->conn->query($query) or die($this->conn->error);

		if($result->num_rows == 0){

			return "No Data";
		}
		else{
			while($row = $result->fetch_array()){
				$data[] = $row;
			}
			return $data;
		}
	}

	public function insert($tableName, $fieldName, $value){
		$query = "INSERT INTO $tableName ($fieldName) VALUES ($value)";

		 $this->conn->query($query) or die($this->conn->error);
		 return $this->conn->insert_id;
	}

	public function execute($query){
		$this->conn->query($query) or die($this->conn->error);
	}

	public function dynamic_dropdown($data, $name, $type){
			$select = '';
			$selected = '<select name="'. $name .'" id="' . $name .'" style="width:220px;">'; 
			if(is_array($data)){
				$selected .= '<option value="">Select '.$type.'</option>';
					foreach ($data as $key => $value) {
						$selected .= '<option ' . $select . ' value="'.$value[0].'">'.$value[1].'</option>';
					}
				
			}
			else{
				$selected .= '<option value="">Nothing Found</option>';
			}
			$selected .= '</select>';

			return $selected;
	}

	public function dynamic_dropdown_multiple($data, $name, $type){
			$select = '';
			$selected = '<select name="'. $name .'" id="' . $name .'" style="width:220px;" multiple>'; 
			if(is_array($data)){
				//$selected .= '<option value="">Select '.$type.'</option>';
					foreach ($data as $key => $value) {
						$selected .= '<option ' . $select . ' value="'.$value[0].'">'.$value[1].'</option>';
					}
				
			}
			else{
				$selected .= '<option value="">Nothing Found</option>';
			}
			$selected .= '</select>';

			return $selected;
	}	
	
	
	public function dynamic_edit_dropdown($data, $name, $type, $id){
			
			$selected = '<select name="'. $name .'" class="' . $name .'" id="' . $name .'" style="width:220px;">';
			if(is_array($data)){
				$selected .= '<option value="">Select '.$type.'</option>';
					foreach ($data as $key => $value) {
						//print_r($value);
						if($id){
							$id==$value[0]?$select = 'selected="selected"': $select='';
						}
						$selected .= '<option ' . $select . ' value="'.$value[0].'">'.$value[1].'</option>';
					}
				
			}
			else{
				$selected .= '<option value="">Nothing Found</option>';
			}
			$selected .= '</select>';
			return $selected ;
		}

	/*dynamic dropdown using code */
	
	public function dynamic_dropdown2($data, $name, $type){
			$select = '';
			$selected = '<select name="'. $name .'" id="' . $name .'" style="width:220px;">'; 
			if(is_array($data)){
				$selected .= '<option value="">Select '.$type.'</option>';
					foreach ($data as $key => $value) {
						$selected .= '<option ' . $select . ' value="'.$value[0].'">'.$value[1].' - '.$value[2].'</option>';
					}
				
			}
			else{
				$selected .= '<option value="">Nothing Found</option>';
			}
			$selected .= '</select>';

			return $selected;
	}

	public function createDir($path){
		if (!file_exists($path)) {
    		mkdir($path, 0777, true);
		}
	}

	public function upload_file($file, $type, $max_size, $path){
		
		if($file['name'] == ''){
			return 'File Name is Empty';
		}
		if($file['error'] == 1){
			return 'File Cannot Be Uploaded Try Again!';
		}
		if($file['size'] > $max_size){
			return 'File Size Exceeds ' . ($max_size/(1024*1024)) . 'MB';
		}
		if(!in_array($file['type'], $type)){
			return 'File Type . ' . $file['type'] . 'not allowed';
		}

		if(!is_dir($path)){
			mkdir($path, 0755);
		}

		$final_name =time().$file['name'];
		$source_path = $file['tmp_name'];
		$destination_path = $path.'/' .$final_name;
		move_uploaded_file($source_path, $destination_path);
		return $final_name;
	}


	public function multiple_upload_file($file, $type, $max_size, $path){
		
		$count = 0;
		foreach($file['name'] as $value){
			if($file['name'][$count] == ''){
				return 'File Name is Empty';
			}
			if($file['error'][$count] == 1){
				return 'File Cannot Be Uploaded Try Again!';
			}
			if($file['size'][$count] > $max_size){
				return 'File Size Exceeds ' . ($max_size/(1024*1024)) . 'MB';
			}
			if(!in_array($file['type'][$count], $type)){
				return 'File Type . ' . $file['type'][$count] . 'not allowed';
			}

			if(!is_dir($path)){
				mkdir($path, 0755);
			}

			$final_name = time().$file['name'][$count];
			$source_path = $file['tmp_name'][$count];
			$destination_path = $path. $final_name;
			move_uploaded_file($source_path, $destination_path);
			$count++;
			$file_name[] = $final_name;
		}
		return $file_name;
	}

	public function thumnail_creation($imageName, $imagePath, $width, $ratio, $thumb_path,$height){
		//echo $imageName;
		
		$pos = strrpos($imagePath, '.');
		$ext = strtolower(substr($imagePath, $pos+1));
		//echo '<br/>';
		if($ext == 'jpg' || $ext == 'jpeg'){
			$original_image = imagecreatefromjpeg($imagePath);
		}
		else if($ext == 'png' ){
			$original_image = imagecreatefrompng($imagePath);
		}
		else if($ext == 'gif'){
			$original_image = imagecreatefromgif($imagePath);
		}
		else {
			return 'Only Jpg, gif and png images are allowed.';
		}
		//print_r($original_image);
		$original_width = imagesx($original_image);
		$original_height = imagesy($original_image);
		if($original_height>0 && $original_width>0){
			//Thumbnamil Width Height Calculation
			if($ratio == 0){
				$thumb_width = $width;
				$thumb_height = round(($thumb_width*$original_height)/$original_width);
			}
			else if($ratio == 2){
				$thumb_width = $width;
				$thumb_height = $height;
			}
			else{
				$thumb_width = $width;
				$thumb_height = $width;	
			}
		}
		else{
			return 'Image Height or Width can\'t be Zero';
		}

		if(!is_dir($thumb_path)){
			mkdir($thumb_path, '0755');
		}

		$thumb_image = imagecreatetruecolor($thumb_width, $thumb_height);
		$color = imagecolorallocate($thumb_image, 224, 224, 222);
		imagefill($thumb_image, 0, 0, $color);
		imagecopyresampled($thumb_image, $original_image, 0, 0, 0, 0, $thumb_width, $thumb_height, $original_width, $original_height);
		$destination_path = $thumb_path . '/' . $imageName;
		
			
		if($ext == 'jpg' || $ext == 'jpeg'){
			imagejpeg($thumb_image,$destination_path);
		}
		else if($ext == 'png' ){
			imagepng($thumb_image,$destination_path);
		}
		else if($ext == 'gif'){
			imagegif($thumb_image,$destination_path);
		}
	}

	
}




$obj= new Helper();
?>