<?php 
  $link = mysqli_connect('localhost','root','','db03');
  mysqli_query($link,"SET NAMES UTF8");

  $sql = "DELETE FROM movie where movie_seq = '".$_GET["seq"]."';" ;
  mysqli_query($link,$sql);

  echo "<script>document.location.href='admin.php?do=admin&redo=vv'</script>"
?>