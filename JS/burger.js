var x = document.getElementById("links1");
var y = document.getElementById("links2");
const burger = document.querySelector('.burger');


function display1() {
  if (x.style.display === "block") {
  	x.style.display = "none";
   y.style.display = "none";
   burger.classList.remove('opened');
  } else {
    x.style.display = "block";
    y.style.display = "none";
    burger.classList.add('opened');
  }
}


function display2() {
  if (y.style.display === "block") {
  	y.style.display = "none";
   x.style.display = "none";
  } else {
   y.style.display = "block";
   x.style.display = "none";
  }
}