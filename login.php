<?php

// Developer's defined Error table - 
// Error  Section       Description
//   0    SignUp/Login  Some error occurred
//   1    SignUp        If Email already exits
//   2    SignUp        If entered and re-entered Password do not match
//   3    Login         If Email entered email do not match with the database login details
//   4    Login         If entered Password do not match with the database login details
	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$file_name='login_details'. '.json';

	$error_occurred = false;
	$error_type = 0;
	$curr_data=file_get_contents("$file_name");
	$dataArr=json_decode($curr_data, true);
	// print_r($dataArr);

    $login_id = "";
	if(sizeof($dataArr["loginCredentials"])==0)
	{
		$error_occurred = true;
		$error_type = 3;
	}

	if($error_occurred == false)
	{
		foreach ($dataArr["loginCredentials"] as $key => $value) 
		{
			if ($dataArr["loginCredentials"][$key]["Email"] == $_POST['loginEmail'])
			{
				if($dataArr["loginCredentials"][$key]["Password"] != $_POST['loginPassword'])
                {
                    $error_occurred = true;
                    $error_type = 4;
                    break;
                }
                else
                {
                    $error_occurred = false;
                    $login_id = $dataArr["loginCredentials"][$key]["LoginID"];
                    break;
                }
			}
            else
            {
                $error_occurred = true;
                $error_type = 3;
            }
		}
	}

	if($error_occurred==false)
	{
		header('location: ./home.php?file_type='.$login_id);
	}
	else
	{
		// echo $error_type;
		header('location: ./error.php?error_type='.$error_type);
	}
	
	
}
	
?>
