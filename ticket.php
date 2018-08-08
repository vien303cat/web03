<?php 
include_once("head.php"); 
if(!empty($_GET["seq"])){
  $seq = $_GET["seq"];
}


$sql = "select * from movie where movie_display = '1' and movie_upday > '$dt' "; //下檔日期利用上檔日期減三天 詳情在head比較方便  因為index也要用到讓下檔的影片不顯示
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

?>


  <div id="mm">
  <table width="60%" border="1" align="center" cellpadding="2" cellspacing="2"　class="ct a rb">
  <tr>
    <td width="20%" align="center" valign="middle">電影：</td>
    <td  width="80%" align="left" valign="middle">
    <select name="s1" id="s1" onchange="select1()" >
    <?php do{ ?>
    <option value="<?=$c2["movie_seq"]?>"><?=$c2["movie_name"]?></option>
    <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
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

    <script>
    
    function select1(){
        s1 = document.getElementById("s1").value;         /* var s1 = $("#s1").val(); */
        $.post("ticket1_api.php",{s1},function(dd){
            document.getElementById("date").innerHTML = dd ;  /* $("date").html(dd);*/
        })
    }
    function select2(movieseq){
        s2 = document.getElementById("s2").value ;
        alert(s2);
        alert(movieseq);
    
    }

    </script>



  <?php include_once("footer.php"); ?>