<?php include_once("head.php");
if(!empty($_GET["redo"])){
  if($_GET["redo"] == "rr"){
    $include = "a_poster.php";
  }else if($_GET["redo"] == "go"){

  }

}else{ $include = "a_main.php"; }
?>

  <div id="mm">
    <div class="ct a rb" style="position:relative; width:100%; padding:3px; top:-9px;"> <a href="?do=admin&redo=tit">網站標題管理</a>
    | <a href="?do=admin&redo=go">動態文字管理</a>
    | <a href="?do=admin&redo=rr">預告片海報管理</a>
    | <a href="?do=admin&redo=vv">院線片管理</a>
    | <a href="?do=admin&redo=order">電影訂票管理</a> </div>
<?php include_once($include); ?>
  </div>


  <?php include_once("footer.php"); ?>