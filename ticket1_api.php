<?php
  session_start();
  $link = mysqli_connect('localhost','root','','db03');
  mysqli_query($link,"SET NAMES UTF8");
  $strtime = strtotime("+6hours"); 
  $time = date("Y-m-d H:i:s",$strtime);
  $today = date("Y-m-d",$strtime);
  
  $strtime = strtotime($today);
 

  $movieseq = $_POST["s1"];


  $sql = "select * from movie where movie_seq = '$movieseq'";
  $c1  = mysqli_query($link,$sql);
  $c2  = mysqli_fetch_assoc($c1);
  $upday = $c2["movie_upday"];

  //抓上映日期後三天
  $downtime1 = strtotime($upday);   
  $downtime2 = strtotime($upday."+1day"); 
  $downtime3 = strtotime($upday."+2day");

  $select_day1 = date("Y-m-d" , $downtime1);
  $select_day2 = date("Y-m-d" , $downtime2);
  $select_day3 = date("Y-m-d" , $downtime3);

  $sel_d1="";
  $sel_d2="";
  $sel_d3="";
  if( $downtime1 >= $strtime ){
    $uselect="";
    if(!empty($_POST["s2"])){ 
      if($_POST["s2"]  == $select_day1){
          $uselect="selected='selected'";
      }
    }
    $sel_d1 = "<option value='".$select_day1."'".$uselect.">".$select_day1."</option>";
  }
  if( $downtime2 >= $strtime ){
    $uselect="";
    if(!empty($_POST["s2"])){ 
      if($_POST["s2"]  == $select_day2){
          $uselect="selected='selected'";
      }
    }
    $sel_d2 = "<option value='".$select_day2."'".$uselect.">".$select_day2."</option>";
  }
  if( $downtime3 >= $strtime ){
    $uselect="";
    if(!empty($_POST["s2"])){ 
      if($_POST["s2"]  == $select_day3){
          $uselect="selected='selected'";
      }
    }
    $sel_d3 = "<option value='".$select_day3."'".$uselect.">".$select_day3."</option>";
  }
  
 

?>

    <select name="s2" id="s2" onchange="select2('<?=$movieseq?>')">
    <option >請選擇日期</option>
<?=$sel_d1?>
<?=$sel_d2?>
<?=$sel_d3?>

    </select>