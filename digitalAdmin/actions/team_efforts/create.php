<?php
	include '../../../common/session.php';
	if(isset($_POST['working_hours']) && $_POST['working_hours'] !="" && isset($_POST['happy_clients']) && $_POST['happy_clients'] !="" && 
    isset($_POST['awards']) && $_POST['awards'] !="" && 
    isset($_POST['projects']) && $_POST['projects'] !=""){

		
		$working_hours = $_POST['working_hours'];
        $happy_clients = $_POST['happy_clients'];
        $awards = $_POST['awards'];
        $projects = $_POST['projects'];
        
		$record = $obj->select("*","team_efforts","1");

		if(is_array($record))
        {
            $query = "UPDATE team_efforts SET working_hours='$working_hours',happy_clients='$happy_clients',awards='$awards',projects='$projects'";
            $obj->execute($query);
        	$data['response'] = "y";
			$data['message'] = "Data Updated Successfully...";
			echo json_encode($data);
		}
		else
        {
                $obj->insert("team_efforts","working_hours,happy_clients,awards,projects",
                             "'$working_hours','$happy_clients','$awards','$projects'");
                $data['response'] ="y";
                $data['message'] ="Data Added successfully";
                echo json_encode($data);
		}
	}
	else{

		$data['response'] ="n";
		$data['message'] ="All fileds are required";
		echo json_encode($data);
	}

?>