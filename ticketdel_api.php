<?php 
session_start();
$link = mysqli_connect('localhost','root','','db03');
mysqli_query($link,"SET NAMES UTF8");

if(!empty($_GET["eno"])){
    $sql = "DELETE FROM ticket where ticket_no = '".$_GET["seq"]."'";
    mysqli_query($link,$sql);
    echo "<script>document.location.href='admin.php?do=admin&redo=order'</script>";
}else if(!empty($_GET["edate"])){
    $sql = "DELETE FROM ticket where ticket_date = '".$_GET["seq"]."'";
    mysqli_query($link,$sql);
    echo "<script>document.location.href='admin.php?do=admin&redo=order'</script>";
}else if(!empty($_GET["emovie"])){
    $sql = "DELETE FROM ticket where ticket_movieseq = '".$_GET["seq"]."'";
    mysqli_query($link,$sql);
    echo "<script>document.location.href='admin.php?do=admin&redo=order'</script>";
}

echo "<script>document.location.href='admin.php?do=admin&redo=order'</script>";

?>