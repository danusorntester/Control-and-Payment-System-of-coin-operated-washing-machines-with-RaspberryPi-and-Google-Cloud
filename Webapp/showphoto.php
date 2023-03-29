<?php 

include('connect.php');

	$query = "SELECT * FROM usedtime WHERE UsedID = ".$_GET['id'];
  $result = mysqli_query($objCon,$query);
  $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Usage Picture</title>
<link rel="stylesheet" type="text/css" href="stylephoto.css">
</head>
<body>
<div id="frm">
  <table width='640' height='480'>
    <tbody>
      <tr align='center' bgcolor='#dcc7a1'>
        <th> รูปการใช้งาน </th>
      </tr> 
      <tr>
        <td><img src="FileName/<?php echo $row["FileName"];?>"></td>
      </tr>
    </tbody>
  </table>
</div>
<a href="user_page.php"><img id="home" src="home.png" width="1" height="1"></a>
<?php 
mysqli_close($objCon);
?>
</body>
</html>