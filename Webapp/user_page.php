<?php
	session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['Status'] != "USER")
	{
		echo "This page for User only!";
		exit();
	}	
	
	include('connect.php');
	
	$strSQL = "SELECT * FROM users WHERE UserID = '".$_SESSION['UserID']."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
<html>
<head>
<title>Users Login</title>
<link rel="stylesheet" type="text/css" href="styleuser.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
</head>
</head>
<body>
<p class="h1">Users : <?php echo $objResult["Username"];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Room : <?php echo $objResult["Room"];?>
<p class="h2">Name : <?php echo $objResult["Name"];?>
<p class="h5"><?php 
	$_month_name = array("01"=>"มกราคม",  "02"=>"กุมภาพันธ์",  "03"=>"มีนาคม",   
	"04"=>"เมษายน",  "05"=>"พฤษภาคม",  "06"=>"มิถุนายน",   
	"07"=>"กรกฎาคม",  "08"=>"สิงหาคม",  "09"=>"กันยายน",   
	"10"=>"ตุลาคม", "11"=>"พฤศจิกายน",  "12"=>"ธันวาคม");


	$vardate=date('Y-m-d');
	$mm =date('m');
	$date=$_month_name[$mm]."  ";
	echo "เดือน : ",$date;

?></p>

<div id="frm">
	<p class="textupline"> จำนวนครั้งใช้งาน &nbsp;&nbsp; <span class="h3"><?php echo $objResult["Used"];?></span> &nbsp;&nbsp;ครั้ง<br></p>
	<hr class="line" noshade="noshade" size="5">
  <p class="textunderline"> รวม &nbsp;&nbsp; <span class="h4"><?php echo $objResult["Used"]*20;?></span> &nbsp;&nbsp; บาท<br></p> 
  <br>
</div>
<a href="logout.php"><img id="home" src="home.png"></a>
<?php

	$strSQL1 = "SELECT * FROM	usedtime WHERE Room = '".$objResult["Room"]."' AND MONTH(Usedtime) = '".$mm."' AND WashmachineID = 'G001'";
  $strSQL2 = "SELECT * FROM	usedtime WHERE Room = '".$objResult["Room"]."' AND MONTH(Usedtime) = '".$mm."' AND WashmachineID = 'G002'";
	$objQuery1 = mysqli_query($objCon,$strSQL1);
  $objQuery2 = mysqli_query($objCon,$strSQL2);
  
?>
<div id="frm2">
  <table style="width:92%">
    <tbody> 
      <?php 
      $counter = 0;
      while($objResult1 = mysqli_fetch_array($objQuery1,MYSQLI_ASSOC)){
      $counter++;
      }
      ?>
       <tr>
        <th style="width:15%">เครื่องที่ G001 : </th>
        <th style="width:5%"><?php echo $counter; ?></th>
        <th style="width:10%">ครั้ง</th>
        <th style="width:12%">รูปการใช้งาน</th>
      </tr>
    </tbody>
  </table>
  <details>
    <summary>Detail</summary>
    <table style="width:92%">
      <tbody>
      <?php
      $objQuery1 = mysqli_query($objCon,$strSQL1);
       while($objResult1 = mysqli_fetch_array($objQuery1,MYSQLI_ASSOC)){
      ?>
        <tr>
        <td><?php echo $objResult1["Room"];?></td>
        <td><?php echo $objResult1["Usedtime"];?></td>
        <td><?php echo $objResult1["WashmachineID"];?></td>
        <td><a href="showphoto.php?id=<?php echo $objResult1["UsedID"];?>">ดูรูปภาพ</a></td>
        </tr>
      <?php
       }
      ?>
      </tbody>
    </table>
  </details>

  <table style="width:92%">
    <tbody> 
    <?php 
      $counter = 0;
      while($objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC)){
      $counter++;
      }
      ?>
       <tr>
        <th style="width:15%">เครื่องที่ G002 : </th>
        <th style="width:5%"><?php echo $counter; ?></th>
        <th style="width:10%">ครั้ง</th>
        <th style="width:12%">รูปการใช้งาน</th>
      </tr>
    </tbody>
  </table>
  <details>
    <summary>Detail</summary>
    <table style="width:92%">
      <tbody>
      <?php
      $objQuery2 = mysqli_query($objCon,$strSQL2);
       while($objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC)){
      ?>
        <tr>
        <td><?php echo $objResult2["Room"];?></td>
        <td><?php echo $objResult2["Usedtime"];?></td>
        <td><?php echo $objResult2["WashmachineID"];?></td>
        <td><a href="showphoto.php?id=<?php echo $objResult2["UsedID"];?>">ดูรูปภาพ</a></td>
        </tr>
      <?php
       }
      ?>
      </tbody>
    </table>
  </details>
</div>
<?php

	$usedmonth1 = "SELECT * FROM	usedtime WHERE Room = '".$objResult["Room"]."' AND MONTH(Usedtime) = '1' "; $usedmonth2 = "SELECT * FROM	usedtime WHERE Room = '".$objResult["Room"]."' AND MONTH(Usedtime) = '2' ";
  $usedmonth3 = "SELECT * FROM	usedtime WHERE Room = '".$objResult["Room"]."' AND MONTH(Usedtime) = '3' "; $usedmonth4 = "SELECT * FROM	usedtime WHERE Room = '".$objResult["Room"]."' AND MONTH(Usedtime) = '4' ";
  $usedmonth5 = "SELECT * FROM	usedtime WHERE Room = '".$objResult["Room"]."' AND MONTH(Usedtime) = '5' "; $usedmonth6 = "SELECT * FROM	usedtime WHERE Room = '".$objResult["Room"]."' AND MONTH(Usedtime) = '6' ";
  $usedmonth7 = "SELECT * FROM	usedtime WHERE Room = '".$objResult["Room"]."' AND MONTH(Usedtime) = '7' "; $usedmonth8 = "SELECT * FROM	usedtime WHERE Room = '".$objResult["Room"]."' AND MONTH(Usedtime) = '8' ";
  $usedmonth9 = "SELECT * FROM	usedtime WHERE Room = '".$objResult["Room"]."' AND MONTH(Usedtime) = '9' "; $usedmonth10 = "SELECT * FROM	usedtime WHERE Room = '".$objResult["Room"]."' AND MONTH(Usedtime) = '10' ";
  $usedmonth11 = "SELECT * FROM	usedtime WHERE Room = '".$objResult["Room"]."' AND MONTH(Usedtime) = '11' "; $usedmonth12 = "SELECT * FROM	usedtime WHERE Room = '".$objResult["Room"]."' AND MONTH(Usedtime) = '12' ";
	$objQueryM1 = mysqli_query($objCon,$usedmonth1); $objQueryM2 = mysqli_query($objCon,$usedmonth2); $objQueryM3 = mysqli_query($objCon,$usedmonth3);
  $objQueryM4 = mysqli_query($objCon,$usedmonth4); $objQueryM5 = mysqli_query($objCon,$usedmonth5); $objQueryM6 = mysqli_query($objCon,$usedmonth6);
  $objQueryM7 = mysqli_query($objCon,$usedmonth7); $objQueryM8 = mysqli_query($objCon,$usedmonth8); $objQueryM9 = mysqli_query($objCon,$usedmonth9);
  $objQueryM10 = mysqli_query($objCon,$usedmonth10); $objQueryM11 = mysqli_query($objCon,$usedmonth11); $objQueryM12 = mysqli_query($objCon,$usedmonth12);
  
?>
<div id="frm1">
  <table style="width:100%">
    <tbody>
      <tr>
        <th style="width:8">Jan</th>
        <th style="width:8%">Feb</th>
        <th style="width:8%">Mar</th>
        <th style="width:8%">Apr</th>
        <th style="width:8%">May</th>
        <th style="width:8%">Jun</th>
        <th style="width:8%">Jul</th>
        <th style="width:8%">Aug</th>
		    <th style="width:8">Set</th>
		    <th style="width:8">Oct</th>
		    <th style="width:8">Nov</th>
		    <th style="width:8">Dec</th>
      </tr> 
      <tr>
	 	  <td><?php $counter = 0;
                while($objResultM1 = mysqli_fetch_array($objQueryM1,MYSQLI_ASSOC)){
                $counter++;
              }
              echo $counter;
      ?></td>
      <td><?php $counter = 0;
                while($objResultM2 = mysqli_fetch_array($objQueryM2,MYSQLI_ASSOC)){
                $counter++;
              }
              echo $counter;
      ?></td>
      <td><?php $counter = 0;
                while($objResultM3 = mysqli_fetch_array($objQueryM3,MYSQLI_ASSOC)){
                $counter++;
              }
              echo $counter;
      ?></td>
      <td><?php $counter = 0;
                while($objResultM4 = mysqli_fetch_array($objQueryM4,MYSQLI_ASSOC)){
                $counter++;
              }
              echo $counter;
      ?></td>
      <td><?php $counter = 0;
                while($objResultM5 = mysqli_fetch_array($objQueryM5,MYSQLI_ASSOC)){
                $counter++;
              }
              echo $counter;
      ?></td>
		  <td><?php $counter = 0;
                while($objResultM6 = mysqli_fetch_array($objQueryM6,MYSQLI_ASSOC)){
                $counter++;
              }
              echo $counter;
      ?></td>
      <td><?php $counter = 0;
                while($objResultM7 = mysqli_fetch_array($objQueryM7,MYSQLI_ASSOC)){
                $counter++;
              }
              echo $counter;
      ?></td>
      <td><?php $counter = 0;
                while($objResultM8 = mysqli_fetch_array($objQueryM8,MYSQLI_ASSOC)){
                $counter++;
              }
              echo $counter;
      ?></td>
      <td><?php $counter = 0;
                while($objResultM9 = mysqli_fetch_array($objQueryM9,MYSQLI_ASSOC)){
                $counter++;
              }
              echo $counter;
      ?></td>
      <td><?php $counter = 0;
                while($objResultM10 = mysqli_fetch_array($objQueryM10,MYSQLI_ASSOC)){
                $counter++;
              }
              echo $counter;
      ?></td>
      <td><?php $counter = 0;
                while($objResultM11 = mysqli_fetch_array($objQueryM11,MYSQLI_ASSOC)){
                $counter++;
              }
              echo $counter;
      ?></td>
       <td><?php $counter = 0;
                while($objResultM12 = mysqli_fetch_array($objQueryM12,MYSQLI_ASSOC)){
                $counter++;
              }
              echo $counter;
      ?></td>
      </td>
      </tr>
      
    </tbody>
  </table>
</div> 
</body>
</html>
<?php
	header("Refresh:10");
	mysqli_close($objCon);
?>