<?php 
include_once("head.php"); 
$strtime = strtotime("+6hour");
$theday = date("Y-m-d",$strtime);
$sql = "select * from ticket order by ticket_cnt desc limit 1  ";
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);
$row = $c2["ticket_cnt"] + 1;
$dd = strtotime($_POST["time"]);

$pd = date("Ymd",$dd).str_pad($row,4,'0',STR_PAD_LEFT);
$sql = "select * from movie where movie_seq = '".$_POST["movie"]."'" ; 
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);

$ww = count($_POST["aa"]);  //座位

if($_POST["site"] == 1){    //場次時間
  $sitetime = "14:00~16:00";
}else if($_POST["site"] == 2){
  $sitetime = "16:00~18:00";
}else if($_POST["site"] == 3){
  $sitetime = "18:00~20:00";
}else if($_POST["site"] == 4){
  $sitetime = "20:00~22:00";
}else if($_POST["site"] == 5){
  $sitetime = "22:00~24:00";
}


?>
<br>
<table width="60%" border="1" cellspacing="2" align="center" cellpadding="2" class="ct a rb">
  <tr>
    <td colspan="2" align="left">感謝您的訂購，您的訂單編號是：<?=$pd?></td>
  </tr>
  <tr>
    <td width="20%" align="left">電影名稱：</td>
    <td align="left"><?=$c2["movie_name"]?></td>
  </tr>
  <tr>
    <td width="20%" align="left">日期：</td>
    <td align="left"><?=$_POST["time"]?></td>
  </tr>
  <tr>
    <td width="20%" align="left">場次時間：</td>
    <td align="left"><?=$sitetime?></td>
  </tr>
  <tr>
    <td colspan="2" align="left">座位：<br> <?php for($i = 0 ; $i < $ww ; $i++){ 
      $p = ceil($_POST["aa"][$i]/5);
      $k = $_POST["aa"][$i] - ($p-1) * 5 ;
      echo $p."排".$k."號"."<br>"; 
      
      $sql = "insert into ticket value(NULL,'".$c2["movie_seq"]."','".$_POST["time"]."','".$_POST["site"]."','".$_POST["aa"][$i]."','".$pd."','".$row."');" ;
      mysqli_query($link,$sql);
      } ?>
      </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="button" value="確認" onclick="document.location.href='index.php'"></td>
  </tr>
</table>




<?php include_once("footer.php"); ?>