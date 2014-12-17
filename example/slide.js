/*
 * This is a JavaScript Scratchpad.
 *
 * Enter some JavaScript, then Right Click or choose from the Execute Menu:
 * 1. Run to evaluate the selected text (Ctrl+R),
 * 2. Inspect to bring up an Object Inspector on the result (Ctrl+I), or,
 * 3. Display to insert the result in a comment after the selection. (Ctrl+L)
 */



/*
funciton bind(){
  var pre=$("pre");
  pre.onclick=function(){
    alert("hello");
  };

}
  */

var index=0;
var stop;
function showPic(){
  pclick(index);
  index++;
  if(index==3)index=0;
  stop=setTimeout("showPic()", 1000);
}

function pclick(index){
   clearTimeout(stop);
    var slide=$("slide");
    var pic=$("#slide img");
    var a=$("a");
    for(i=0; i<3;i++)
    {
     pic[i].setAttribute("class","hide");
     a[i].setAttribute("class",""); 
    };
  
   
//    $(this).setAttribute("class","on");
  pic[index].setAttribute("class","show");
  a[index].setAttribute("class","on"); 
}

function slider(){
  setTimeout("silder(index)", 1000);
}



window.onload=function(){
  var i=0;
  var p=$("a");
  showPic();
 // p.onclick=pclick;
    /*
    pfirst=$("pfirst");
    alert("class"+pfirst.getAttribute("class"));
    pfirst.setAttribute("class","hide", 1);
    alert("class"+$("psecond").getAttribute("class"));
    $("psecond").setAttribute("class","show", 1);
   */
};
