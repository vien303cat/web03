<?php

$sql = "select * from movie order by movie_desc";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

?>

<span class="ct a rb"><a href='admin.php?do=admin&redo=vvadd'>新增電影</a></span>

<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="ct a rb">

<?php 
do{ 
    if($c2["movie_lv"] == 1){
        $lvimg="03C01.png";
    }else if($c2["movie_lv"] == 2){
        $lvimg="03C02.png";
    }else if($c2["movie_lv"] == 3){
        $lvimg="03C03.png";
    }else if($c2["movie_lv"] == 4){
        $lvimg="03C04.png";
    }

?>
  <tr>
    <td width="30%" rowspan="4" align="center" valign="middle"><img src="img/<?=$c2["movie_img"]?>" width="200" height="100" >分級:<img src="img/<?=$lvimg?>"></td>

    <td width="70%" align="center" valign="middle">片名:<?=$c2["movie_name"]?>&nbsp;&nbsp;　片長:<?=$c2["movie_long"]?>&nbsp;&nbsp;　上映時間:<?=$c2["movie_upday"]?></td>
  </tr>
  <tr>
    <td width="70%" align="center" valign="middle">
    排序:<?=$c2["movie_desc"]?>　　
    顯示:<?php if($c2["movie_display"] == 1){ echo "上檔"; }else{ echo "下檔"; } ?>
     </td>
  </tr>
  <tr>
    <td width="70%" align="right" valign="middle">
    <a href='admin.php?do=admin&redo=vvupdate&seq=<?=$c2["movie_seq"]?>'>修改電影資料</a>&nbsp;&nbsp;&nbsp;　
    <a href='vv_del_api.php?seq=<?=$c2["movie_seq"]?>'>刪除電影</a></td>
  </tr>
  <tr>
    <td width="70%" align="center" valign="middle"><?=$c2["movie_con"]?></td>
  </tr>

<?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
</table>