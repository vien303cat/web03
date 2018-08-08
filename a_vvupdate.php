<?php

    $seq = $_GET["seq"];
    $sql = "select * from movie where movie_seq ='$seq'";
    $c1  = mysqli_query($link,$sql);
    $c2  = mysqli_fetch_assoc($c1);

    if(!empty($_POST["name"])){
        $name = $_POST["name"] ;
        $lv   = $_POST["lv"] ;
        $long = $_POST["long"] ;
        $upday = $_POST["year"]."-".$_POST["month"]."-".$_POST["day"] ;
        $fa   = $_POST["fa"] ;
        $dir  = $_POST["dir"] ;
        $con  = $_POST["con"] ;
        $display = $_POST["display"];
        $desc = $_POST["desc"];

        $sql="update movie set 
        movie_name='$name',
        movie_con='$con',
        movie_long='$long',
        movie_upday='$upday',
        movie_lv='$lv',
        movie_dir='$dir',
        movie_fa='$fa',
        movie_display='$display',
        movie_desc='$desc'  
        where movie_seq = '$seq'";

        mysqli_query($link,$sql);
         
        if(!empty($_FILES["img"]["name"])){
            copy($_FILES["img"]["tmp_name"],"img/".$c2["movie_img"]);
        }

        if(!empty($_FILES["video"]["name"])){
            copy($_FILES["video"]["tmp_name"],"img/".$c2["movie_video"]); 
        }
    }


$seq = $_GET["seq"];
$sql = "select * from movie where movie_seq ='$seq'";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

$day = explode("-",$c2["movie_upday"]);  //把$c2["movie_upday"] 利用 "-"  分成3等分 變成陣列
$dy = $day[0] ;
$dm = $day[1] ;
$dd = $day[2] ;
?>


<form method="post" enctype="multipart/form-data" >

<table width="100%" border="0" cellspacing="2" cellpadding="2" class="ct a rb">
  <tr>
    <td colspan="2" align="center" valign="middle"><span style="font-size:36px">新增院線片</span></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">片　　名：</td>
    <td width="80%" align="left" valign="middle"><input type="text" name="name" value="<?=$c2["movie_name"]?>"></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">分　　級：</td>
    <td width="80%" align="left" valign="middle">
    <select name="lv" id="lv">
    <option value="1" <?php if($c2["movie_lv"] == 1){ echo "selected"; } ?> >普遍級</option>
    <option value="2" <?php if($c2["movie_lv"] == 2){ echo "selected"; } ?> >輔導級</option>
    <option value="3" <?php if($c2["movie_lv"] == 3){ echo "selected"; } ?> >保護級</option>
    <option value="4" <?php if($c2["movie_lv"] == 4){ echo "selected"; } ?> >限制級</option>
    </select></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">片　　長：</td>
    <td width="80%" align="left" valign="middle"><input type="text" name="long" value='<?=$c2["movie_long"]?>'></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">上映日期：</td>
    <td width="80%" align="left" valign="middle">

    <!-- 另外一種日期方法 不過題目有說到要三個欄位... 不過這個真的快很多 -->
    <!-- <input type="date" value="<?=$c2["movie_upday"]?>" >       -->


    <select name="year" id="year">
    <option value="2018" <?php if($dy == 2018){ echo "selected"; } ?> >2018</option>
    <option value="2019" <?php if($dy == 2019){ echo "selected"; } ?> >2019</option>
    <option value="2020" <?php if($dy == 2020){ echo "selected"; } ?> >2020</option>
    <option value="2021" <?php if($dy == 2021){ echo "selected"; } ?> >2021</option>
    </select>年

    <select name="month" id="month">
    <?php for($i=1;$i<=12;$i++){ ?>
    <option value="<?=$i?>" <?php if($dm == $i){ echo "selected"; } ?> > <?=$i?> </option>
    <?php } ?>
    </select>月
    <select name="day" id="day">
    <?php for($i=1;$i<=31;$i++){ ?>
    <option value="<?=$i?>" <?php if($dd == $i){ echo "selected"; } ?> ><?=$i?></option>
    <?php } ?>
    </select>日
    </td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">發 行 商：</td>
    <td width="80%" align="left" valign="middle"><input type="text" name="fa" value='<?=$c2["movie_fa"]?>'></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">導　　演：</td>
    <td width="80%" align="left" valign="middle"><input type="text" name="dir" value='<?=$c2["movie_dir"]?>'></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">預告影片：</td>
    <td width="80%" align="left" valign="middle"><input type="file" name="video"></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">電影海報：</td>
    <td width="80%" align="left" valign="middle"><input type="file" name="img"></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">排　　序：</td>
    <td width="80%" align="left" valign="middle"><input type="text" name="desc" value='<?=$c2["movie_desc"]?>'></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">顯　　示：</td>
    <td width="80%" align="left" valign="middle">
    <select name="display" id="display">
    <option value="0" <?php if($c2["movie_display"] == 0){ echo "selected"; } ?> >下檔</option>
    <option value="1" <?php if($c2["movie_display"] == 1){ echo "selected"; } ?> >上檔</option>
    </select>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle">劇情簡介<textarea style="width:800px; height:140px" name="con"><?=nl2br($c2["movie_con"])?></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><input type="submit" value="修改"><input type="reset" value="重置"></td>
  </tr>
</table>

</form>