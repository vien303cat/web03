<input type="button" value="left" onclick="ll()">
<input type="button" value="right" onclick="rr()"><br><br>
<div style="width:100px;height:100px;background-color:#F00;position:relative" id="vv"></div>
<script src="scripts/jquery-1.9.1.min.js"></script>
<script> 
function ll(){
    $("#vv").animate({
        width:'200px',
        height:'200px',
        top:'100px',
        left:'100px'
    },1000);
}
function rr(){
    $("#vv").animate({
        width:'100px',
        height:'100px',
        top:'0px',
        left:'0px'
    },1000);
}
</script>