var c=document.getElementById("chicagocanvas");
var ctx=c.getContext("2d");

ctx.fillStyle = "333333";
ctx.font = "45px Helvetica";
ctx.textAlign="center"; 
ctx.fillText("Chicago",569,55); 

ctx.strokeStyle = "333333";
ctx.beginPath();
ctx.lineWidth=2;
ctx.lineCap="butt";
ctx.moveTo(0,40);
ctx.lineTo(460,40);
ctx.moveTo(680,40);
ctx.lineTo(1170,40);
ctx.stroke();
