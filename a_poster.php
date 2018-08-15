<?php   
if(!empty($_POST["postname"])){
    $ee = explode(".",$_FILES["postfile"]["name"])[1] ;
    $imgname = $strtime.".".$ee ;
    $sql = "insert into poster value(NULL,'".$_POST["postname"]."','$imgname','0','0') ;";
    mysqli_query($link,$sql);
    copy($_FILES["postfile"]["tmp_name"],"img/".$imgname);
}

if(!empty($_POST["name"][0])){

    $sql = "update poster set poster_display = '0' ";
    mysqli_query($link,$sql);

    for($i=0;$i<count($_POST["pseq"]);$i++){
        $name = $_POST["name"][$i];
        $desc = $_POST["desc"][$i];
        $pseq = $_POST["pseq"][$i];
        $ani  = $_POST["ani"][$i];

        if(!empty($_POST["display"][$i])){
            $sql = "update poster set poster_display = '1' where poster_seq = '".$_POST["display"][$i]."' ; ";
            mysqli_query($link,$sql);
        }
        
        if(!empty($_POST["ani"][$i])){
          $sql = "update poster set poster_ani = '$ani' where poster_seq = '$pseq' ;";
          mysqli_query($link,$sql);
      }

        if(!empty($_POST["name"][$i])){
            $sql = "update poster set poster_name = '$name' , poster_desc = '$desc' where poster_seq = '$pseq' ;";
            mysqli_query($link,$sql);
        }
        
        if(!empty($_POST["delete"][$i])){
          $sql = "DELETE FROM poster where poster_seq = '".$_POST["delete"][$i]."' ; ";
          mysqli_query($link,$sql);
      }

    }
}


$sql = "select * from poster ";
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);
?>

<form method="post">
<table width="100%" border="1" align="center" cellpadding="2" cellspacing="2" class="ct a rb">
  <tr>
    <td colspan="4" align="center" valign="middle">預告片清單</td>
  </tr>
  <tr>
    <td align="center" valign="middle" width="20%">預告片海報</td>
    <td align="center" valign="middle" width="20%">預告片片名</td>
    <td align="center" valign="middle" width="20%">預告片排序</td>
    <td align="center" valign="middle" width="20%">預告片動畫<br>1淡入2滑入3縮放</td>
    <td align="center" valign="middle" width="20%">操作</td>
  </tr>
  <?php do{ ?>
  <tr>
      <input type="hidden" name="pseq[]" value="<?=$c2["poster_seq"]?>" >
    <td align="center" valign="middle" width="20%"><img src="img/<?=$c2["poster_img"]?>"  width="100" /></td>
    <td align="center" valign="middle" width="20%"><input type="text" value="<?=$c2["poster_name"]?>" name="name[]" ></td>
    <td align="center" valign="middle" width="20%"><input type="text" value="<?=$c2["poster_desc"]?>" name="desc[]" ></td>
    <td align="center" valign="middle" width="20%"><input type="text" value="<?=$c2["poster_ani"]?>" name="ani[]" ></td>
    <td align="center" valign="middle" width="20%">
        顯示<input type="checkbox" name="display[]" value="<?=$c2['poster_seq']?>" <?php if($c2["poster_display"] == 1 ){ ?> checked <?php } ?> >
        刪除<input type="checkbox" name="delete[]" value="<?=$c2['poster_seq']?>" >
    </td>
  </tr>
  <?php }while($c2 = mysqli_fetch_assoc($c1)) ?>
  <tr>
    <td colspan="4" align="center" valign="middle"><input type="submit" value="編輯確定"> <input type="reset" value="重置"></td>
  </tr>
</table>
</form>

<br><br>


<form method="post" enctype="multipart/form-data" >
<table width="100%" border="1" align="center" cellpadding="2" cellspacing="2" class="ct a rb">
  <tr>
    <td align="center" valign="middle">新增預告片海報</td>
  </tr>
  <tr>
    <td align="center" valign="middle">
    預告片海報:<input type="file" name="postfile"/>  
    預告片片名:<input type="text" name="postname"/></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><input type="submit" value="新增"><input type="reset" value="重置"></td>
  </tr>
</table>
</form>