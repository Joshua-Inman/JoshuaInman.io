window.onload = function() {
  var headings = document.getElementsByTagName("h2");
  for (var i = 0; i < headings.length; i++) {
    document.getElementsByTagName("h1")[0].setAttribute("style", "-webkit-transform: rotateX(360deg)");
    document.getElementsByTagName("h2")[i].setAttribute("style", "-webkit-transform: rotateX(360deg)");
  }
};