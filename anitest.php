
<html>
<head>
<script src="scripts/jquery-1.9.1.min.js"></script>
</head>
<body>

<input type="button" name="btn1" id="btn1"  value="說你好縮放">
    

<div id="hh" >
<p  style="display:none">你好</p>
<h1 style="display:none;font-size:36px">你不好</h1>
</div>

<br><br>

<input type="button" name="btn2" id="btn2"  value="說你好淡入">
    

    <div id="hh2" >
    <p  style="display:none">你好</p>
    <h1 style="display:none">你不好</h1>
    </div>



<br><br>

<input type="button" name="btn3" id="btn3"  value="說你好?聽說是滑入">
    

    <div id="hh3" >
    <p  style="display:none;font-size:36px">還是要你好</p>
    </div>


<br><br>

</body>
</html>



<script>

$("#btn1").click(function(){

    if( $("#hh h1").is(":hidden") ){
        $("#hh h1").show(5000);
    }else{ 
        $("#hh h1").hide(5000); }

})

$("#btn2").click(function(){

if( $("#hh2 p").is(":hidden") ){
    $("#hh2 p").fadeIn(1000);
}else{ 
    $("#hh2 p").fadeOut(1000); }

})

$("#btn3").click(function(){

if( $("#hh3 p").is(":hidden") ){
    $("#hh3 p").slideDown(5000);
}else{ 
    $("#hh3 p").slideUp(5000); }

})

</script>