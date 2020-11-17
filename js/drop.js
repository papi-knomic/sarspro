function report() {
  var x= document.getElementById("report");
  var y= document.getElementById("find");
    if (x.className === "dropdown") {
    x.className += " show";
  } else {
    x.className = "dropdown";
  }    
}


function find() {
  var y= document.getElementById("find");
  var x= document.getElementById("protest");
    if (y.className === "dropdown") {
    y.className += " show";
  } else {
    y.className = "dropdown";
  }    
}