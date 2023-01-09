var modal = document.getElementById("myModal");

function show() {
  document.getElementById('hands').style.display = "block";
  document.getElementById('myModal').style.display = "block";
  document.getElementById('btn1').style.display = "none";
  document.getElementById('btn2').style.display = "block";
  setTimeout(function(){
    document.getElementById('myModal').style.display = "none";}, 2000);
}

function gross() {
  document.getElementById('myModal2').style.display = "block";
}
function leave() {
  document.getElementById('myModal3').style.display = "block";
}