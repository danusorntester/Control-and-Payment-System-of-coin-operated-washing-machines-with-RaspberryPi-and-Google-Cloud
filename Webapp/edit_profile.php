<?php

  include('connect.php');
	
	$strSQL = "SELECT * FROM users WHERE UserID = ".$_GET['id'];
	$objQuery = mysqli_query($objCon,$strSQL);
  $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
  
?>
<html>
<head>
<title>Users Login</title>
<link rel="stylesheet" type="text/css" href="styleedit.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<div id ="frm">
  <form name="form1" method="post" action="save_profile.php">
    <p class="text1">Edit Profile!!</p><br>
    <table class="table">
      <tbody>
        <tr>
          <td class="text"> UserID&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td class="text2">
            <?php echo $objResult["UserID"];?>
          </td>
        </tr>
        <tr>
          <td class="text"> Username&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td class="text2">
            <?php echo $objResult["Username"];?>
          </td>
        </tr>
        <tr>
          <td class="text"> Password&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td><input name="txtPassword" type="password" id="txtPassword" value="<?php echo $objResult["Password"];?>">
          </td>
        </tr>
        <tr>
          <td class="text"> Confirm Password&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td><input name="txtConPassword" type="password" id="txtConPassword" value="<?php echo $objResult["Password"];?>">
          </td>
        </tr>
        <tr>
          <td class="text"> Name&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td><input name="txtName" type="text" id="txtName" value="<?php echo $objResult["Name"];?>"></td>
        </tr>
        <tr>
          <td class="text"> PhoneNumber&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td><input name="txtPhoneNumber" type="text" id="txtPhoneNumber" value="<?php echo $objResult["PhoneNumber"];?>"></td>
        </tr>
        <tr>
          <td class="text"> Room&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td class="text2">
            <?php echo $objResult["Room"];?>
          </td>
        </tr>
      </tbody>
    </table>
    <input class="button" type="submit" name="Submit" value="Save"></a>
    &nbsp;&nbsp;
    <a href="admin_page.php"><input class="button1" Type="submit" name="Submit" value="Back"></a>
  </form>
</div>
</body>
</html>
<?php
	mysqli_close($objCon);
?>