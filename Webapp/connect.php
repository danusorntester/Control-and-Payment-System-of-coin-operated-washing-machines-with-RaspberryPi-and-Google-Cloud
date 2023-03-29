<?php
$objCon = new mysqli("localhost","root","","login");

  $PastMonth = date('m',strtotime("-1 day"));
  $ThisMonth = date("m");
  $count = 0;

    if($ThisMonth != $PastMonth and $count == 0){
      $strSQL = "UPDATE users SET Used = '0'";
      $objQuery = mysqli_query($objCon,$strSQL);
      $count += 1;
    } 
    
    elseif ($ThisMonth == $PastMonth && $count != 0){
      $count -= 1;
    }
    else{
      
    }


 /* $MonthPast = date('m',strtotime("-1 day"));
  $MonthPresent = date("m");
      
    if($MonthPast == $MonthPresent){
    }
    else{ 

      $strSQL = "UPDATE users SET Used = '0'";
      $objQuery = mysqli_query($objCon,$strSQL);
    
    }*/

?>  
