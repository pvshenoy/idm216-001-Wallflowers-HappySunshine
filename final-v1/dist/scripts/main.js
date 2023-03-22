var minus = document.getElementById("minus-button");
var centerNum = document.getElementById("num");

function increaseValue(button, limit) {
  const numberInput = button.parentElement.querySelector('.number');
  var value = parseInt(numberInput.innerHTML, 10);
  if(isNaN(value)) value = 0;
  if(value >= 1) {
    minus.style.transform = "translate(0px)";
    minus.style.transition = ".3s";
    minus.style.zIndex = "1";
    centerNum.style.borderRadius = "0";
    centerNum.style.transition = ".3s";
  }
  if(limit && value >= limit) return;
  numberInput.innerHTML = value+1;
}


function decreaseValue(button) {
  const numberInput = button.parentElement.querySelector('.number');
  var value = parseInt(numberInput.innerHTML, 10);
  if(isNaN(value)) value = 0;  
    if(value <= 2) {
      minus.style.transform = "translate(20px)";
      minus.style.transition = ".4s";
      minus.style.zIndex = "-1";
      centerNum.style.borderRadius = "11px 0 0 11px";
      centerNum.style.transition = ".4s";
      value = 2;
  }
  numberInput.innerHTML = value-1;
}