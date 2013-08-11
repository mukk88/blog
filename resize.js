function autoResize(){
  var i, len, iframedivs, canvases, ctx;
  var width = $('#travel').width();
  var adjusted = width*0.57;
  iframedivs = document.getElementsByClassName("iframediv");
  for(i = 0, len = iframedivs.length;i<len;i++){
    iframedivs[i].style.height = (adjusted +"px");
  }

  canvases = document.getElementsByClassName("canvas");
  for(i = 0, len = canvases.length;i<len;i++){
    canvases[i].width = canvases[i].width;
    ctx = canvases[i].getContext("2d");

    ctx.fillStyle = "888888";
    ctx.font = "45px Helvetica";
    ctx.textAlign="center"; 
    var text = canvases[i].id;
    var left = ctx.measureText(text).width;
    ctx.fillText(text,width/2,55); 

    ctx.strokeStyle = "888888";
    ctx.beginPath();
    ctx.lineWidth=2;
    ctx.lineCap="butt";
    ctx.moveTo(0,40);
    ctx.lineTo((width-left)*0.45,40);
    ctx.moveTo(width-((width-left)*0.45),40);
    ctx.lineTo(width,40);
    ctx.stroke();
  }
}