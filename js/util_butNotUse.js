//hover in js

onmouseout="normal(this)" 
onmouseover="hover(this)"

function hover(x) {
var c = x.children;
console.log(x.children);
c[0].style.backgroundColor = "#fff";
c[0].style.color = "#795548";
c[1].style.backgroundColor = "#795548";
c[1].style.color = "#fff";
}

function normal(x) {
var c = x.children;
console.log(x.children);
c[1].style.backgroundColor = "#fff";
c[1].style.color = "#795548";
}

//


var boolC = true;


function chevron(id) {
    document.getElementById(id).innerHTML = (boolC == false) ? '<i class="fas fa-chevron-down"></i>' : '<i class="fas fa-chevron-up"></i>';
    boolC = !boolC;
  }