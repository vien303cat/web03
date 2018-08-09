<?php  
  $movie=$_POST["mymv"]; 
  $link=mysqli_connect("localhost","root","","db03"); 
  mysqli_query($link,"set names utf8"); 
  
// SQL:取3個日期---> interval 
  $sql ="select vdate as d1,DATE_ADD(vdate, INTERVAL 1 day) as d2,DATE_ADD(vdate, INTERVAL 2 day) as d3 from admin_vv where seq='$movie' "; 
  $ro= mysqli_query($link,$sql); 
  $rr=mysqli_fetch_assoc($ro); 

// 組合日期:option 
  $d1=$rr["d1"]; 
  $d2=$rr["d2"];
  $d3=$rr["d3"]; 
  $myoption="";   
  $today= date("Y-m-d",strtotime("+6hour"));
  if($d1>=$today){ $myoption.= "<option value='$d1'>$d1</option>";  } 
  if($d2>=$today){ $myoption.= "<option value='$d2'>$d2</option>";  } 
  if($d3>=$today){ $myoption.= "<option value='$d3'>$d3</option>";  }
?>  

<option>...請選擇日期... </option>  
   <?=$myoption?> 


