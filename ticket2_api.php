<?php
  session_start();
  $link = mysqli_connect('localhost','root','','db03');
  mysqli_query($link,"SET NAMES UTF8");
  $strtime = strtotime("+6hours");
  $today = date("Y-m-d",$strtime);  //抓今天日期判斷訂票時間是不是今天 是的話就不用再刪時段了
  $nowtime = date("H",$strtime);      //如果是今天的話要用到的判斷現在幾點了 而且只要抓小時就好
  $nowtime_pk = strtotime($nowtime);
  $movieseq = $_POST["movieseq"];
  $s2 = $_POST["s2"];
  for($i=1;$i<=5;$i++){
    $chair[$i] = "20";
  }

  if($s2 != $today){
?>

    <select name="s3" id="s3" >
    <option >請選擇場次</option>
    <option value="1" <?php if(!empty($_POST["v3"]) && $_POST["v3"]  == 1 ){ echo "selected:selected"; } ?> >14:00~16:00 剩餘座位 <?=$chair[1]?></option>
    <option value="2" <?php if(!empty($_POST["v3"]) && $_POST["v3"]  == 2 ){ echo "selected:selected"; } ?> >16:00~18:00 剩餘座位 <?=$chair[2]?></option>
    <option value="3" <?php if(!empty($_POST["v3"]) && $_POST["v3"]  == 3 ){ echo "selected:selected"; } ?> >18:00~20:00 剩餘座位 <?=$chair[3]?></option>
    <option value="4" <?php if(!empty($_POST["v3"]) && $_POST["v3"]  == 4 ){ echo "selected:selected"; } ?>>20:00~22:00 剩餘座位 <?=$chair[4]?></option>
    <option value="5" <?php if(!empty($_POST["v3"]) && $_POST["v3"]  == 5 ){ echo "selected:selected"; } ?> >22:00~24:00 剩餘座位 <?=$chair[5]?></option>
    </select>

    <?php }else{
      ?>
    <select name="s3" id="s3" >
    <option >請選擇場次</option>
    <?php if($nowtime <  14 ){  ?> <option value="1" <?php if(!empty($_POST["v3"]) && $_POST["v3"]  == 1 ){ echo "selected:selected"; } ?> >14:00~16:00 剩餘座位 <?=$chair[1]?></option> <?php } ?>
    <?php if($nowtime <  16 ){  ?> <option value="2" <?php if(!empty($_POST["v3"]) && $_POST["v3"]  == 2 ){ echo "selected:selected"; } ?> >16:00~18:00 剩餘座位 <?=$chair[2]?></option> <?php } ?>
    <?php if($nowtime <  18 ){  ?> <option value="3" <?php if(!empty($_POST["v3"]) && $_POST["v3"]  == 3 ){ echo "selected:selected"; } ?> >18:00~20:00 剩餘座位 <?=$chair[3]?></option> <?php } ?>
    <?php if($nowtime <  20 ){  ?> <option value="4" <?php if(!empty($_POST["v3"]) && $_POST["v3"]  == 4 ){ echo "selected:selected"; } ?> >20:00~22:00 剩餘座位 <?=$chair[4]?></option> <?php } ?>
    <?php if($nowtime <  22 ){  ?> <option value="5" <?php if(!empty($_POST["v3"]) && $_POST["v3"]  == 5 ){ echo "selected:selected"; } ?> >22:00~24:00 剩餘座位 <?=$chair[5]?></option> <?php } ?>
    </select>



    <?php }  ?>