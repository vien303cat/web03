<?php 
include_once("head.php"); 
if(!empty($_GET["seq"])){
  $seq = $_GET["seq"];
}else{$seq=0;}
if(!empty($_GET["v2"])){
  $v2 = $_GET["v2"];
}
if(!empty($_GET["v3"])){
  $v3 = $_GET["v3"];
}


$sql = "select * from movie where movie_display = '1' and movie_upday >= '$dt' order by movie_desc "; //下檔日期利用上檔日期減三天 詳情在head比較方便  因為index也要用到讓下檔的影片不顯示
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>

<form method="POST" action="buyticket.php?">
  <div id="mm">
  <table width="60%" border="1" align="center" cellpadding="2" cellspacing="2"　class="ct a rb">
  <tr>
    <td width="20%" align="center" valign="middle">電影：</td>
    <td  width="80%" align="left" valign="middle">
    <select name="s1" id="s1" onchange="select1()" >
    <?php do{ ?>
    <option value="<?=$c2["movie_seq"]?>" <?php if($c2["movie_seq"] == $seq){ echo "selected='selected'"; } ?> ><?=$c2["movie_name"]?></option>
    <?php }while($c2 = mysqli_fetch_assoc($c1)) ?>
    </select>
    </td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">日期：</td>
    <td width="80%" align="left" valign="middle">
        <div id="date"></div>
    </td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">場次：</td>
    <td width="80%" align="left" valign="middle">
        <div id="site"></div>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><input type="submit" value="確定">　　<input type="button" value="重置" onclick="document.location.href='ticket.php?seq=<?=$seq?>'"></td>
  </tr>
</table>
  </div>

</form>
    <script>
    select1();

    <?php  if(!empty($_GET["v3"])){ echo "select22()" ;} ?>


    function select1(){
        s1 = document.getElementById("s1").value;             /* var s1 = $("#s1").val(); */
        $.post("ticket1_api.php",{s1},function(dd){
            document.getElementById("date").innerHTML = dd ;  /* $("date").html(dd);*/
        })
    }
    function select2(movieseq){
        s2 = document.getElementById("s2").value ;
        $.post("ticket2_api.php",{s2,movieseq},function(dd){
          document.getElementById("site").innerHTML = dd ;  /* $("site").html(dd);*/
        })
    
    }
/*
    function select22(){
      v3 = "<?=$v3?>";        //索引 t2_api
      s2 = "<?=$v2?>";        //日期 
      s1 = "<?=$seq?>";      //索引 t1_api
      movieseq =  <?=$seq?> ;
      $.post("ticket1_api.php",{s1,s2},function(dd){
        document.getElementById("date").innerHTML = dd ;  /* $("site").html(dd); 
      })
      $.post("ticket2_api.php",{s2,movieseq,v3},function(dd){
        document.getElementById("site").innerHTML = dd ;  /* $("site").html(dd);
      })  
    
    }
*/
    </script>



  <?php include_once("footer.php"); ?>