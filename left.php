<style>
#f2{
    width:340px;
    height:50px;
    margin:0 auto;
    display:inline-block;
    overflow:hidden;
    position:relative;
    top:-20px;
}
#f3{
    min-width:500px;
    min-height:50px;
    position:relative;
    background
}
.pic{
    width:35px;
    height:35px;
    background-size:100%;
    background-position:center center;
    display:inline-block;
    margin:0 22;
}

#posttxt{
    width:420px;
    height:35px ;
    text-align:center;
}
#postimg{
    width:420px;
    height:300px ;
}
</style>
<?php 
$sql = "select * from poster where poster_display = '1' order by poster_desc ";
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);
$row = mysqli_num_rows($c1);
?>
<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <ul class="lists">
            <div id="posttxt"><?=$c2["poster_name"]?> </div>
            <div id="postimg"><img src="img/<?=$c2['poster_img']?>"> </div>
          </ul>
          <ul class="controls">
          <input type="button" style="min-width:35px;min-height:70px;background-image:url(img/left.png);position:relative;top:-2px;"  id="b1" onclick="b1c()"> 
          <!--這邊按鈕的style用min-width/height是因為他題目內已經有min-width/height了  所以直接把它改掉就行-->
          <div id="f2">
            <div id="f3">
            <?php 
            $ii = 0 ;
            do{ ?>
                <a href="JavaScript:look_pic('<?=$c2["poster_img"]?>','<?=$c2["poster_name"]?>','<?=$c2["poster_ani"]?>')"><div class="pic" id="pc<?=$ii?>" style="background-image:url(img/<?=$c2["poster_img"]?>)"></div></a>
                <?php $ii++;  }while($c2 = mysqli_fetch_assoc($c1)) ?>
            </div>
          </div>
          <input type="button" style="min-width:35px;min-height:70px;background-image:url(img/right.png);position:relative;top:-2px;" id="b2" onclick="b2c()"  > 
          </ul>
        </div>
      </div>
    </div>





<?php
$sqll = "select * from poster where poster_display = '1' order by poster_desc";
$cc1  = mysqli_query($link,$sqll);
$cc2  = mysqli_fetch_assoc($cc1);
?>

<script>

    //解題順序 : 箭頭撥放 > 點小圖跑大圖 > 自動播放

    // 自動播放  先利用setTimeout讓等一下要放到陣列位置的變數遞增 如果>=資料庫欄位數就變為 0  之後抓三個 圖片位置、圖片名稱、圖片動畫 的資料 放進陣列裡面紀錄值  

    var pic_time = 0 ;
    var cp_name = new Array(<?=$row?>);
    var cp_pic  = new Array(<?=$row?>);
    var cp_ani  = new Array(<?=$row?>);
    <?php
    $ii = 0;
    do{ ?>
        cp_name[<?=$ii?>] = "<?=$cc2['poster_name']?>" ;
        cp_pic[<?=$ii?>] =  "<?=$cc2['poster_img']?>" ; 
        cp_ani[<?=$ii?>] =  "<?=$cc2['poster_ani']?>" ;
    <?php   
    $ii++; }while( $cc2  = mysqli_fetch_assoc($cc1))
    ?>
    change_time();
    function change_time(){
        look_pic(cp_pic[pic_time],cp_name[pic_time],cp_ani[pic_time]);  //輪播資料套完之後再套進點小圖的動畫JS那邊
        pic_time +=1 ;
        if(pic_time >= <?=$row?>) { pic_time = 0 ; }
        setTimeout("change_time()",5000);
    }



    // 箭頭撥放  靠著改變div的position位置來移動

    var p3_left = 0 ;
    function b1c(){
        if(p3_left > 0){
            p3_left -= 1 ;
    }
    gogo();
    }
    function b2c(){
        if(p3_left != <?=$row?> - 4){
            p3_left += 1 ;
    }
    gogo();
    }

    function gogo(){
        now_left = p3_left * 83 ;
        $("#f3").animate({
            left:'-'+now_left+'px'
        },1000);
    }


    //點小圖跑大圖  利用小圖片傳過來的資料庫資料 圖片位置、圖片名稱、圖片動畫 來判斷 先判斷是哪個動畫 然後代到3個動畫function裡面再讓圖片display:none 跑JQ用的動畫讓他跑出來

    function look_pic(pic,picname,anistyle){
        document.getElementById("posttxt").innerHTML = picname ;
        if (anistyle == 1){
            change1(pic);
        }else if (anistyle == 2){
            change2(pic);
        }else if (anistyle == 3){
            change3(pic);
        }
    }
    function change1(pic){
        document.getElementById("postimg").innerHTML = "<img src='img/"+pic+"' class='tt' style='display:none'>" ;
        $(".tt").fadeIn(1000); 
    }
    function change2(pic){
        document.getElementById("postimg").innerHTML = "<img src='img/"+pic+"' class='tt' style='display:none'>" ;
        $(".tt").slideDown(1000); 
    }
    function change3(pic){
        document.getElementById("postimg").innerHTML = "<img src='img/"+pic+"' class='tt' style='display:none'>" ;
        $(".tt").show(1000); 
    }
</script>






    <script>
    //森林系
    /*
$(document).ready(funciton(){
    $(".pic img").hide();
    $(".pic img").slice(0,4);
})

    var i = 0 ;
        function aa(){
            $(".pic").hide();
            $(".pic").slice(i,4+i)
        }
        function bb(){
            $(".pic").hide();
        }
    */</script>

    