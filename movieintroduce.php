<?php 
include_once("head.php"); 
if(!empty($_GET["seq"])){
  $seq = $_GET["seq"];
}


$sql = "select * from movie where movie_seq = '$seq'";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

if($c2["movie_lv"] == 1){
  $lvimg="03C01.png";
  $lv = "普遍級";
}else if($c2["movie_lv"] == 2){
  $lvimg="03C02.png";
  $lv = "輔導級";
}else if($c2["movie_lv"] == 3){
  $lvimg="03C03.png";
  $lv = "保護級";
}else if($c2["movie_lv"] == 4){
  $lvimg="03C04.png";
  $lv = "限制級";
}

?>


  <div id="mm">
    <div class="tab rb" style="width:87%;">
      <div style="background:#FFF; width:100%; color:#333; text-align:left">
        <video src="img/<?=$c2["movie_video"]?>" width="300px" height="250px" controls="" style="float:right;"></video>
        <font style="font-size:24px"> <img src="img/<?=$c2["movie_img"]?>" width="200px" height="250px" style="margin:10px; float:left">
        <p style="margin:3px">影片名稱 ：<?=$c2["movie_name"]?>
          <input type="button" value="線上訂票" onclick="document.location.href='ticket.php?seq=<?=$c2["movie_seq"]?>'" style="margin-left:50px; padding:2px 4px" class="b2_btu">
        </p>
        <p style="margin:3px">影片分級 ：<img src="img/<?=$lvimg?>" >  <?=$lv?> </p>
        <p style="margin:3px">影片片長 ： <?=$c2["movie_long"]?></p>
        <p style="margin:3px">上映日期 <?=$c2["movie_upday"]?></p>
        <p style="margin:3px">發行商 ： <?=$c2["movie_fa"]?></p>
        <p style="margin:3px">導演 ：<?=$c2["movie_dir"]?> </p>
        <br>
        <br>
        <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介：<?=nl2br($c2["movie_con"])?><br>
        </p>
        </font>
        <table width="100%" border="0">
          <tbody>
            <tr>
              <td align="center"><input type="button" value="院線片清單" onclick="document.location.href='index.php'"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php include_once("footer.php"); ?>