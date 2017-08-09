var p11 = document.getElementById("p11");
var p12 = document.getElementById("p12");
var p21 = document.getElementById("p21");
var p22 = document.getElementById("p22");

var p11h = p11.offsetHeight;
var p12h = p12.offsetHeight;
var p21h = p21.offsetHeight;
var p22h = p22.offsetHeight;

var t = parseInt(p12h) + parseInt(p22h) + parseInt(p21h);
p11.style.height = (t-105)+"px";
