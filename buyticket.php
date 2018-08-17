<?php 
include_once("head.php"); 

?>
<style>
#ding{
    width:350px;
    height:450px;
    margin:0 auto ;
}
.dingwa{
    width:60px;
    height:100px;
    display:inline-block;
    margin: 3px;
    float:left;
}
.cb{
    width:20px;
    height:20px;
    margin:0 auto ; 
}
</style>
<form method="POST" action="finalbuy.php">
<input type="hidden" value="<?=$_POST["s1"]?>" name="movie" >
<input type="hidden" value="<?=$_POST["s2"]?>" name="time" >
<input type="hidden" value="<?=$_POST["s3"]?>" name="site" >
<div id="mm">

    <div id = "ding">
    <?php 
    for($i=1;$i<=20;$i++){ 
        $p = ceil($i/5);  //無條件進位
        if($p>=1){
            $k = $i - ($p-1)*5 ;
        }else{
            $k = $i ;
        }
        

        $sql = "select * from ticket where ticket_movieseq = '".$_POST["s1"]."' and ticket_date = '".$_POST["s2"]."' and ticket_site = '".$_POST["s3"]."' and ticket_sit = '$i'";
        $c1 = mysqli_query($link,$sql);
        $row = mysqli_num_rows($c1);
        ?>
        <?php if($row == 1 ){ ?>
        <div class="dingwa"><img src='img/03D03.png'><br>
        <?=$p?>排-<?=$k?>號
        
        <?php }else{  ?>
        <div class="dingwa"><img src='img/03D02.png'><br>
        <?=$p?>排-<?=$k?>號
        <div class="cb"><input type="checkbox" name="aa[]" id="cs<?=$i?>" value="<?=$i?>" onclick="check_select(<?=$i?>);" ></div>
 
        <?php }  ?>
        

        </div>
    <?php } ?>
    <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td align="center">您選擇的電影是：</td>
  </tr>
  <tr>
    <td align="center">您選擇的時刻是：</td>
  </tr>
  <tr>
    <td align="center">您已勾選了<span id="c1" style="color:#F00;">0</span>張票，最多可以選擇<span id="c2" ><font color="red">4</font></span>張票</td>
  </tr>
  <tr>
    <td align="center"><input type="submit" value="訂購"><input type="button" value="上一步" onclick="close11()"></td>
  </tr>
</table>
    </div>


</div>
</form>
<script>
var totle_select = 0 ;

function close11(){
    window.close();
}

function check_select(cc){
    ooxx = document.getElementById("cs"+cc).checked ;  //偵測是否處於點擊狀態
    if(ooxx != true){
        totle_select = totle_select -1;
    }else{ if(totle_select >= 4){
            document.getElementById("cs"+cc).checked = false;
        }else{
            totle_select = totle_select +1 ;
        }
    }
    document.getElementById("c1").innerHTML =  totle_select ;
}
</script>


<?php include_once("footer.php"); ?>