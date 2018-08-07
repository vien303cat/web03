<?php include_once("head.php"); ?>

<?php
if(!empty($_POST["ac"])){
  if($_POST["ac"] == "admin" && $_POST["pw"] == "1234"){
    $_SESSION["admin"] = "admin";
    echo "<script>document.location.href='admin.php'</script>";
  }
}
?>

<form method="post" action="" >
  <div id="mm">
    <div class="ct a rb" style="position:relative; width:101.5%; left:-1%; padding:3px; top:-9px;"> <a href="?do=admin&redo=tit">網站標題管理</a>| <a href="?do=admin&redo=go">動態文字管理</a>| <a href="?do=admin&redo=rr">預告片海報管理</a>| <a href="?do=admin&redo=vv">院線片管理</a>| <a href="?do=admin&redo=order">電影訂票管理</a> </div>
    <div class="rb tab">
      <h2 class="ct">登入</h2>
      帳號:<input type="text" name="ac" value="admin"/><br>
      密碼:<input type="password" name="pw" value="1234" /><br> <!--題目沒說要做 所以用個假的不用資料庫 ㄏㄏ-->
      <input type="submit" value="登入"/>
    </div>
  </div>
</form>

  <?php include_once("footer.php"); ?>