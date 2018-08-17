<?php
  $sql="select * from rr where rrlook=1";
  $rrArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  $rrJson=json_encode($rrArr);
  // print_r($rrJson);
?>
<div id="picShow" height=300>
</div>
<div id="picList" height=300 style="display: flex;justify-content: center;">
</div>
<script>
  var rrObj=<?=$rrJson?>;
  var rrLen=rrObj.length;
  var i=0;
  setInterval("autoShow()",5000);
  function autoShow(){
    $('#picShow').html(
      "<div id='ani' style='position:absolute;'><img src='imgs/"+
      rrObj[i]['rrpic']+
      "' width=250></div>"
    );
    switch(rrObj[i]['rrani']) {
    case '1':
        $("#ani").animate({width:'-=100%',height:'-=100%'});
        $("#ani").animate({width:'+=100%',height:'+=100%'},3000);
        break;
    case '2':
        $("#ani").animate({left:'500px'},3000);
        break;
    case '3':
        $("#ani").animate({opacity: '0'},3000);
        break; 
    }
    i++;
    if(i>=rrLen){i=0}
  }
  autoShow();
</script>
