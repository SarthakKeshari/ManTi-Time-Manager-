<?php

// Developer's defined Error table - 
// Error  Section       Description
//   0    SignUp/Login  Some error occurred
//   1    SignUp        If Email already exits
//   2    SignUp        If entered and re-entered Password do not match
//   3    Login         If Email entered email do not match with the database login details
//   4    Login         If entered Password do not match with the database login details
	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$login_id = "";
	
	function get_data() {
		$file_name='login_details'. '.json';

		if(file_exists("$file_name")) {
			$current_data=file_get_contents("$file_name");
			$array_data=json_decode($current_data, true);
			// print_r($array_data);
			// print_r($_POST['signUpName'][0]);
			// print_r($_POST['signUpName'][1]);

			global $login_id;
			$login_id = date("ymAdhis").$_POST['signUpName'][0];

			$extra=array(
				'Username' => trim($_POST['signUpName']),
				'Email' => trim($_POST['signUpEmail']),
				'Password' => trim($_POST['signUpPassword']),
				'LoginID' => trim($login_id)
			);
			array_push($array_data["loginCredentials"],$extra);
			echo "file exist<br/>";
			return json_encode($array_data);
		}
		else {
			global $login_id;
			$login_id = date("ymAdhis").$_POST['signUpName'][0];
			$datae=array();
			$datae[]=array(
				'Username' => trim($_POST['signUpName']),
				'Email' => trim($_POST['signUpEmail']),
				'Password' => trim($_POST['signUpPassword']),
				'LoginID' => trim($login_id)
			);
			echo "file not exist<br/>";
			return json_encode($datae);
		}
	}

	$file_name='login_details'. '.json';

	$error_occurred = false;
	$error_type = 0;
	$curr_data=file_get_contents("$file_name");
	$dataArr=json_decode($curr_data, true);
	// print_r($dataArr);

	if($error_occurred == false)
	{
		if($_POST['signUpPassword'] != $_POST['signUpRePassword'])
		{
			$error_occurred = true;
			$error_type = 2;
		}
	}

	if($error_occurred == false)
	{
		foreach ($dataArr["loginCredentials"] as $key => $value) 
		{
			if ($dataArr["loginCredentials"][$key]["Email"] == $_POST['signUpEmail'])
			{
				$error_occurred = true;
				$error_type = 1;
			}
		}
	}

	if($error_occurred==false)
	{
		if(file_put_contents("$file_name", get_data())) {
			header('location: ./home.php?file_name='.$login_id);
		}				
		else {
			header('location: ./error.php?error_type='.$error_type);			
		}
	}
	else
	{
		// echo $error_type;
		header('location: ./error.php?error_type='.$error_type);
	}
	
	
}
	
?>
