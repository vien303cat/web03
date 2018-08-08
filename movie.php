<?php 


if(!empty($_GET["page"])){
    $page = $_GET["page"];
}else{ $page = 1 ; }

$add_page = 4 ;
$open_page = ($page - 1 ) * $add_page ;

$sql = "select * from movie where movie_display = '1'";
$c1  = mysqli_query($link,$sql);
$allrow = mysqli_num_rows($c1);

$sql = "select * from movie where movie_display = '1'  and movie_upday > '$dt'  order by movie_desc limit $open_page,$add_page ";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

$allpage = ceil($allrow/$add_page);
?>
<style>
.look_movie_list{
    width:200px;
    height:200px;
    display:inline-block;
    background-color:#F33;
    margin:5px 4px;
}
</style>

<?php do{ 
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
<div class="look_movie_list">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td colspan="2" align="center" valign="middle">片名：<?=$c2["movie_name"]?></td>
  </tr>
  <tr>
    <td rowspan="2" align="left" valign="middle"><a href='movieintroduce.php?seq=<?=$c2["movie_seq"]?>'><img src="img/<?=$c2["movie_img"]?>" width="100" height="100" ></a></td>
    <td align="left" valign="middle">分級：<img src="img/<?=$lvimg?>" ></td>
  </tr>
  <tr>
    <td align="left" valign="middle">上映日期：<br><font size="2"><?=$c2["movie_upday"]?></font></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><input type="button" value="劇情簡介" onclick="document.location.href='movieintroduce.php?seq=<?=$c2["movie_seq"]?>'"></td>
    <td align="center" valign="middle"><input type="button" value="線上訂票" onclick="document.location.href='ticket.php?seq=<?=$c2["movie_seq"]?>'"></td>
  </tr>

</table></div>
<?php }while($c2  = mysqli_fetch_assoc($c1)) ?>


<div class="ct">
<?php for($i=1;$i<= $allpage;$i++){ 
    echo "<a href='index.php?page=$i'>$i</a>";
 } ?> 
 </div>