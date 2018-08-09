<?php 
include_once("head.php"); 
$strtime = strtotime("+6hour");
$theday = date("Y-m-d",$strtime);
$sql = "select * from ticket where ticket_date = '$theday' ";
$c1 = mysqli_query($link,$sql);
$row = mysqli_num_rows($c1);
$pd = date("Ymd",$strtime).str_pad($row,4,'0',STR_PAD_LEFT);
$sql = "select * from movie where movie_seq = '".$_POST["movie"]."'" ; 
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);
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
    <td align="left"><?=$_POST["site"]?></td>
  </tr>
  <tr>
    <td colspan="2" align="left">座位：</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="確認"></td>
  </tr>
</table>




<?php include_once("footer.php"); ?>