<?php
	session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		exit();
	}

	include('connect.php');

	$password = (isset($_POST["txtPassword"])) ? $_POST["txtPassword"] : '';
	$conpassword = (isset($_POST["txtConPassword"])) ? $_POST["txtConPassword"] : '';
	$name = (isset($_POST["txtName"])) ? $_POST["txtName"] : '';
	$phonenumber = (isset($_POST["txtPhoneNumber"])) ? $_POST["txtPhoneNumber"] : '';
	
	if(trim($password) == "")
	{
		echo "Please input Password!";
		exit();	
	}	
		
	if($password != $conpassword)
	{
		echo "Password not Match!";
		exit();
	}
	
	if(trim($name) == "")
	{
		echo "Please input Name!";
		exit();	
	}	
	
	if(trim($phonenumber) == "")
	{
		echo "Please input Name!";
		exit();	
	}	

	$strSQL = "UPDATE users SET Password = '".trim($password)."' ,
								Name = '".trim($name)."' ,
								PhoneNumber = '".trim($phonenumber)."' 
								WHERE UserID = '".$_SESSION["UserID"]."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	
	echo "Save Completed!<br>";
	echo "<br> Go to <a href='admin_page.php'>Admin page</a>";
	
	mysqli_close($objCon);
?>