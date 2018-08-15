<?php

$sql = "select * from ticket,movie where ticket_movieseq = movie_seq group by ticket_no order by ticket_no desc  " ;
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>


<form method="post">
<table width="80%" border="0" align="center" cellpadding="2" cellspacing="2" class="ct a rb">
  <tr>
    <td colspan="7" align="center">訂單清單</td>
  </tr>
  <tr height="80">
    <td colspan="6" align="center">快速刪除：
    <input type="radio" value ="1" name="ee" id="e1">依日期  <input type="date" id="edate" name="edate">　　
    <input type="radio" value ="2" name="ee" id="e2">依電影
    <select name = "emovie" id="emovie">
    <?php      
      $sqll = "select * from movie ";
      $cc1 = mysqli_query($link,$sqll);
      $cc2 = mysqli_fetch_assoc($cc1);
      do{ ?>
    <option value="<?=$cc2["movie_seq"]?>"> <?=$cc2["movie_name"]?> </option>
    <?php }while($cc2 = mysqli_fetch_assoc($cc1)) ?>
    </secect>
    </td>
    <td align="left"><input type="button" value="刪除" onclick="AUS()"></td>
  </tr>
  <tr>
    <td width="12%" align="center">訂單編號</td>
    <td width="12%" align="center">電影名稱</td>
    <td width="12%" align="center">日期</td>
    <td width="12%" align="center">場次時間</td>
    <td width="12%" align="center">訂購數量</td>
    <td width="12%" align="center">訂購位置</td>
    <td width="12%" align="center">操作</td>
  </tr>
  <?php do{  
      if($c2["ticket_site"] == 1){    //場次時間
        $sitetime = "14:00~16:00";
      }else if($c2["ticket_site"] == 2){
        $sitetime = "16:00~18:00";
      }else if($c2["ticket_site"] == 3){
        $sitetime = "18:00~20:00";
      }else if($c2["ticket_site"] == 4){
        $sitetime = "20:00~22:00";
      }else if($c2["ticket_site"] == 5){
        $sitetime = "22:00~24:00";
      }
      
      ?>
  <tr>
    <td width="12%" align="center"><?=$c2["ticket_no"]?></td>
    <td width="12%" align="center"><?=$c2["movie_name"]?></td>
    <td width="12%" align="center"><?=$c2["ticket_date"]?></td>
    <td width="12%" align="center"><?=$sitetime?></td>

      <?php 
      $sqll = "select * from ticket where ticket_no = '".$c2["ticket_no"]."'";
      $cc1 = mysqli_query($link,$sqll);
      $roww = mysqli_num_rows($cc1);
      $cc2 = mysqli_fetch_assoc($cc1);
      ?>
    <td width="12%" align="center"><?=$roww?></td>
    
    <td width="12%" align="center">
    <?php 
    do{ 
        $p = ceil($cc2["ticket_sit"]/5);
        $k = $cc2["ticket_sit"] - ($p-1) * 5 ;
        echo $p."排".$k."號"."<br>"; 
    }while($cc2 = mysqli_fetch_assoc($cc1))
     ?>
    </td>
    <td width="12%" align="center"><input type="button" value="刪除" onclick="document.location.href='ticketdel_api.php?eno=1&seq=<?=$c2["ticket_no"]?>'"></td>
  </tr>
  <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
</table>

<script>
function AUS(){
    var ox = confirm("確定要刪除嗎?");
    if (ox == true){
        var de = document.getElementById("e1").checked ;
        if(de == 1){
            ff = document.getElementById('edate').value ;
            document.location.href='ticketdel_api.php?edate=1&seq='+ff;
        }else{
            ff = document.getElementById('emovie').value ;
            document.location.href='ticketdel_api.php?emovie=1&seq='+ff;
        }
    }else{
       alert("沒有刪除");
    }
}
</script>