/*
 * This is a JavaScript Scratchpad.
 *
 * Enter some JavaScript, then Right Click or choose from the Execute Menu:
 * 1. Run to evaluate the selected text (Ctrl+R),
 * 2. Inspect to bring up an Object Inspector on the result (Ctrl+I), or,
 * 3. Display to insert the result in a comment after the selection. (Ctrl+L)
 */


function $(element){
  return document.getElementById(element);
}
/*
funciton bind(){
  var pre=$("pre");
  pre.onclick=function(){
    alert("hello");
  };

}
  */
//window.onload=bind;
//var pshow=$("pfirst");
//alert(pshow);
window.onload=function(){
  var i=0;
  var p=$("pre");
  p.onclick=function(){
    var slide=$("slide");
    var sp=slide.getElementsByTagName("div");
    sp[i].setAttribute("class","hide");
    i =(i+1)%3;
    sp[i].setAttribute("class","show");
    /*
    pfirst=$("pfirst");
    alert("class"+pfirst.getAttribute("class"));
    pfirst.setAttribute("class","hide", 1);
    alert("class"+$("psecond").getAttribute("class"));
    $("psecond").setAttribute("class","show", 1);
    */
  };
};
