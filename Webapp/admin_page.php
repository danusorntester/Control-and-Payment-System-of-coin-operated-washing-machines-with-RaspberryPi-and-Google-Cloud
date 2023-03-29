<?php

	include('connect.php');

  if(isset($_GET['id'])) {
    mysqli_query($objCon,"DELETE FROM users WHERE UserID = ".$_GET['id']);
  }

	session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['Status'] != "ADMIN")
	{
		echo "This page for Admin only!";
		exit();
	}	

	
	$strSQL = "SELECT * FROM users";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
<html>
<head>
<title>Users Login</title>
<link rel="stylesheet" type="text/css" href="styleadmin.css">
</head>
</head>
<body>
<p class="h1">Admin : <?php echo strtoupper($objResult["Username"]);?></p>
<a href="register.php" class="buttonregis">Add</a>
<div id="frm">
  <table style="width:100%">
    <tbody>
      <tr>
        <th style="width:10">UserID</th>
        <th style="width:12%">Uername</th>
        <th style="width:12%">Password</th>
        <th style="width:26%">Name</th>
        <th style="width:10%">PhoneNumber</th>
        <th style="width:10%">Room</th>
        <th style="width:10%">Edit</th>
        <th style="width:10%">Delete</th>
      </tr>
      <?php
      while($objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC)){
          ?>  
      <tr>
        <td><?php echo $objResult["UserID"];?></td>
        <td style="text-align:left"><?php echo $objResult["Username"];?></td>
        <td style="text-align:left"><?php $pass=md5($objResult["Password"]); echo $pass;?></td>
        <td><?php echo $objResult["Name"];?></td>
        <td><?php echo $objResult["PhoneNumber"];?></td>
        <td><?php echo $objResult["Room"];?></td>
        <td><a href="edit_profile.php?id=<?php echo $objResult["UserID"];?>" class="buttonedit">Edit</a></td>
        <td><a href="admin_page.php?id=<?php echo $objResult["UserID"];?>" onclick="return confirm('Do you want to delete this Users? !!!')" class="buttondelete">Delete</a>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>
<br>
  <a href="logout.php"><img id="home" src="home.png" width="1" height="1"></a>
</body>
</html>
<?php
	mysqli_close($objCon);
?>