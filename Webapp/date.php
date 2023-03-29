<?php

  include('connect.php');
	
	$strSQL = "SELECT * FROM usertime WHERE Room = '101'";
	$objQuery = mysqli_query($objCon,$strSQL);
  	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
  
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
</head>
<body>
<?php
$thai_month_arr=array(
    "0"=>"",
    "1"=>"มกราคม",
    "2"=>"กุมภาพันธ์",
    "3"=>"มีนาคม",
    "4"=>"เมษายน",
    "5"=>"พฤษภาคม",
    "6"=>"มิถุนายน", 
    "7"=>"กรกฎาคม",
    "8"=>"สิงหาคม",
    "9"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"                 
);
?>
<br>
<div style="margin:auto;width:500px;">
 
  <form method="post" action="">
    เลือกเดือน
    <select name="month_check" id="month_check">
      <?php for($i=1;$i<=12;$i++){ ?>
      <option value="<?=sprintf("%02d",$i)?>" <?=((isset($_POST['month_check']) && $_POST['month_check']==sprintf("%02d",$i)) || (!isset($_POST['month_check']) && date("m")==sprintf("%02d",$i)))?" selected":""?> >
      <?=$thai_month_arr[$i]?>
      </option>
      <?php } ?>
    </select>
    ปี
    <select name="year_check" id="year_check">
    <?php
    $data_year=intval(date("Y",strtotime("-2 year")));
    ?>
      <?php for($i=0;$i<=5;$i++){ ?>
      <option value="<?=$data_year+$i?>" <?=((isset($_POST['year_check']) && $_POST['year_check']==intval($data_year+$i)) || (!isset($_POST['year_check']) && date("Y")==intval($data_year+$i)))?" selected":""?> >
      <?=intval($data_year+$i)+543?>
      </option>
      <?php } ?>
    </select>
    <input type="submit" name="showData" id="showData" value="แสดงข้อมูล" />
  </form>
   
  <br>
  <br>
 
<?php
 // ถ้าไม่มีการส่งเดือนและปีมา ให้ใช้เดือนและปีในขณะปัจจุบันนั้น เป้นตัวกำหนด
if(!isset($_POST['month_check']) && !isset($_POST['year_check'])){
    $date_data_check=date("Y-m-");// จัดรูปแบบปีและเดือนของวันปัจจุบันในรูปแบบ 0000-00-
    $num_month_day=date("t"); // หาจำนวนวันของเดืนอ
    $use_month_check = $date_data_check;    
    $start_date_check = $date_data_check."01";
    $end_date_check = $date_data_check.$num_month_day;
    echo $use_month_check."<br>";
    echo $start_date_check."<br>"; // ได้ตัวแปรวันที่เริ่มต้นของเดือนไปใช้งาน
    echo $end_date_check."<br>"; // ได้ตัวแปรวันที่สิ้นสุดของเดือนไปใช้งาน
}else{ // ถ้ามีการส่งข้อมูล เดือนและปี มา ให้ใช้เดือนและปี ของค่าที่ส่งมาเป้นตำกำหนด
    $date_data_check=$_POST['year_check']."-".$_POST['month_check']."-"; // จัดรูปแบบปีและเดืนอที่ส่งมาในรูปแบบ 0000-00-
    $num_month_day=date("t",strtotime($_POST['year_check']."-".$_POST['month_check']."-01")); // หาจำนวนวันของเดืนอ
    $use_month_check = $date_data_check;        
    $start_date_check = $date_data_check."01";
    $end_date_check = $date_data_check.$num_month_day;
    echo $use_month_check."<br>";
    echo $start_date_check."<br>"; // ได้ตัวแปรวันที่เริ่มต้นของเดือนไปใช้งาน
    echo $end_date_check."<br>"; // ได้ตัวแปรวันที่สิ้นสุดของเดือนไปใช้งาน
}
?>
 
 
</div>
<div id="frm">
  <table style="width:60%">
    <tbody>
      <tr>
        <th style="width:20%">Room</th>
        <th style="width:20%">Usedtime</th>
        <th style="width:20%">WashmachineID</th>
      
      </tr>
      <?php
      while($objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC)){
          ?>  
      <tr>
        <td style="width:20%"><?php echo $objResult["Room"];?></td>
        <td style="width:20%"><?php echo $objResult["Usedtime"];?></td>
        <td style="width:20%"><?php echo $objResult["WashmachineID"];?></td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>