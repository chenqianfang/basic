window.onload = function(){
    var outer=document.getElementById("outer");
    var oInner=document.getElementById("inner");
    var oLis=oInner.getElementsByTagName("li");
    var oleft=document.getElementById("left");
    var oright=document.getElementById("right");
    var step=0;
    var timer=null;	/*图片移动*/
    function buttur(ele,obj){
    	window.clearTimeout(ele.timer);/*清楚自动轮播*/
    	var end=null;
    	for(direc in obj){
    		var direc1=direc.toLowerCase();/*left*/
    		var strOffset="offset"+direc1.substr(0,1).toUpperCase()+direc1.substring(1).toLowerCase();/*offsetLeft*/
    		var target=obj[direc];/*目标的left*/
    		var nSpeed=(target-ele[strOffset])/10;/*图片移动速度，逐渐减少，变成0*/
    		nSpeed=nSpeed>=0?Math.ceil(nSpeed):Math.floor(nSpeed);/*速度取整 ceil向上取整 floor向下取整*/
    		ele.style[direc1]=ele[strOffset]+nSpeed+"px";/*图片移动left改变*/
    		end+=nSpeed;/*end判断是不是移动速度为0*/
    	}
    	if(end){
    		
            ele.timer=window.setTimeout(function(){buttur(ele,obj)},30);
    		
			}
    }
   var divs=document.createElement("div");
   divs.setAttribute("id","nav");
    for(var i=0; i<oLis.length;i++){
        var oa=document.createElement("em");
        oa.innerHTML=i+1;
        divs.appendChild(oa);
    }
    outer.appendChild(divs);
    var btn=document.getElementById("nav").getElementsByTagName("em");
    for(var i=0; i<btn.length; i++){
        btn[i].indx=i;
        btn[0].className="ehover";
        btn[i].onclick=function(){
            //window.clearTimeout(timer);
            for(var i=0; i<btn.length; i++){
                btn[i].className="";
                btn[this.indx].className="ehover";
            }
            buttur(oInner,{left:-oLis[0].offsetWidth*this.indx}); 
        }    
    }
	//自动播放
   function autoMove(){
     	step++;
    	if(step<btn.length){
             for(var i=0; i<btn.length; i++){
                btn[i].className="";
                btn[step].className="ehover";
                buttur(oInner,{left:step*-1090});//图片宽
            }           
    	 }else{ 
                step=btn.length-6;     //图片数   
         }
     	timer=window.setTimeout(autoMove,3000);
    }
    autoMove(); 
  
   oInner.onmouseover=function(){window.clearTimeout(timer);}
   oInner.onmouseout=function(){timer=window.setTimeout(autoMove,3000);}
   oleft.onmouseover=function(){window.clearTimeout(timer);}
   oleft.onmouseout=function(){timer=window.setTimeout(autoMove,3000);}
   oright.onmouseover=function(){window.clearTimeout(timer);}
   oright.onmouseout=function(){timer=window.setTimeout(autoMove,3000);}    
}

	function biaodan(){
		alert("请确认是否输入书名");	
		}
	
	function sousuo(){
		window.open('http://www.baidu.com','_blank','height=1000,width=1400,toolbar=yes,status=yes,menubar=yes,scrollbars=yes,status=no');
		}
		