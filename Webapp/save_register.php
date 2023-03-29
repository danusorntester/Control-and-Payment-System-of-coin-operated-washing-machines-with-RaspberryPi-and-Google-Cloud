<?php

	include('connect.php');
	
	if(trim($_POST["txtUsername"]) == "")
	{
		echo "Please input Username!";
		exit();	
	}
	
	if(trim($_POST["txtPassword"]) == "")
	{
		echo "Please input Password!";
		exit();	
	}	
		
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo "Password not Match!";
		exit();
	}
	
	if(trim($_POST["txtName"]) == "")
	{
		echo "Please input Name!";
		exit();	
	}	
	
	if(trim($_POST["txtPhoneNumber"]) == "")
	{
		echo "Please input Name!";
		exit();	
	}	
	
	$strSQL = "SELECT * FROM users WHERE Username = '".trim($_POST['txtUsername'])."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if($objResult)
	{
			echo "Username already exists!";
	}
	else
	{	
		
		$strSQL = "INSERT INTO users (Username,Password,Name,Status,PhoneNumber,Room) VALUES ('".$_POST["txtUsername"]."', 
		'".$_POST["txtPassword"]."','".$_POST["txtName"]."','".$_POST["Status"]."','".$_POST["txtPhoneNumber"]."','".$_POST["txtRoom"]."')";
		$objQuery = mysqli_query($objCon,$strSQL);
		
		echo "Register Completed!<br>";		
	
		echo "<br> Go to <a href='admin_page.php'>Admin page</a>";
		
	}

	mysqli_close($objCon);
?>