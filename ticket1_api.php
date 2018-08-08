<?php
  session_start();
  $link = mysqli_connect('localhost','root','','db03');
  mysqli_query($link,"SET NAMES UTF8");
  $strtime = strtotime("+6hours"); 
  $time = date("Y-m-d H:i:s",$strtime);  
  $downtime = strtotime("+6hours-3day");   
  $dt = date("Y-m-d",$downtime);     
  $movieseq = $_POST["s1"];
  
?>

    <select name="s2" id="s2" onchange="select2('<?=$movieseq?>')">
    <option >請選擇場次</option>
    <option value="1">14:00~16:00</option>
    <option value="2">16:00~18:00</option>
    <option value="3">18:00~20:00</option>
    <option value="4">20:00~22:00</option>
    <option value="5">22:00~24:00</option>
    </select>