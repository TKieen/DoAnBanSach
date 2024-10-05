document.addEventListener("DOMContentLoaded", (event) => {
  // banner
  w3.slideshow(".nature", 1000);
});

// show and hide dropdown list item on button click
function show_hide() {
  var click = document.getElementById("dropDownList");
  if (click.style.display === "none") {
  click.style.display = "block";
  } else {
  click.style.display = "none";
  }
}

// check filter form
function checkFilterForm(){
console.log("hello");
minPrice = document.getElementById("minPrice").value;
maxPrice = document.getElementById("maxPrice").value;


if(minPrice == ""){
  alert("vui lòng nhập giá tối thiểu.");
  return false;
}

if(maxPrice == ""){
  alert("vui lòng nhập giá tối đa.");
  return false;
}

if(isNaN(minPrice) || isNaN(maxPrice)){
  alert("vui lòng nhập số.");
  return false;
}

if(minPrice=="" || maxPrice=="" || minPrice<=0 || maxPrice<=0 ||(minPrice>maxPrice)){
  alert("Vui lòng nhập số tiền hợp lệ");
  return false;
}

return true;
}
