<?php

    if(!empty($_POST["name"])){
        $name = $_POST["name"] ;
        $lv   = $_POST["lv"] ;
        $long = $_POST["long"] ;
        $upday = $_POST["year"]."-".$_POST["month"]."-".$_POST["day"] ;
        $fa   = $_POST["fa"] ;
        $dir  = $_POST["dir"] ;
        $con  = $_POST["con"] ;
        $ee = explode(".",$_FILES["img"]["name"])[1];
        $imgname = date("YmdHis",$strtime).".".$ee;
        $ee = explode(".",$_FILES["video"]["name"])[1];
        $videoname = date("YmdHis",$strtime).".".$ee;

        $sql="insert into movie value(NULL,'$name','$con','$long','$upday','$lv','$dir','$fa','$imgname','$videoname','1','0')";
        mysqli_query($link,$sql);
        copy($_FILES["img"]["tmp_name"],"img/".$imgname);
        copy($_FILES["video"]["tmp_name"],"img/".$videoname);
    }

?>


<form method="post" enctype="multipart/form-data" >

<table width="100%" border="0" cellspacing="2" cellpadding="2" class="ct a rb">
  <tr>
    <td colspan="2" align="center" valign="middle"><span style="font-size:36px">新增院線片</span></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">片　　名：</td>
    <td width="80%" align="left" valign="middle"><input type="text" name="name"></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">分　　級：</td>
    <td width="80%" align="left" valign="middle">
    <select name="lv" id="lv">
    <option value="1">普遍級</option>
    <option value="2">輔導級</option>
    <option value="3">保護級</option>
    <option value="4">限制級</option>
    </select></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">片　　長：</td>
    <td width="80%" align="left" valign="middle"><input type="text" name="long"></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">上映日期：</td>
    <td width="80%" align="left" valign="middle">
    <select name="year" id="year">
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
    </select>年

    <select name="month" id="month">
    <?php for($i=1;$i<=12;$i++){ ?>
    <option value="<?=$i?>"><?=$i?></option>
    <?php } ?>
    </select>月
    <select name="day" id="day">
    <?php for($i=1;$i<=31;$i++){ ?>
    <option value="<?=$i?>"><?=$i?></option>
    <?php } ?>
    </select>日
    </td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">發 行 商：</td>
    <td width="80%" align="left" valign="middle"><input type="text" name="fa"></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">導　　演：</td>
    <td width="80%" align="left" valign="middle"><input type="text" name="dir"></td>
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
    <td colspan="2" align="center" valign="middle">劇情簡介<textarea style="width:800px; height:140px" name="con"></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><input type="submit" value="新增"><input type="reset" value="重置"></td>
  </tr>
</table>

</form>