$(document).ready(function () {

  $('.sidenav').sidenav();
  $('.tooltipped').tooltip();
  // $('.tooltipped').tooltip({ delay: 350 });

  var current_page = window.location.href;

  var position = current_page.search("old_guy");
  if (position != -1) {
    var text = '<span>NOTICE: Center Already Exists!</span>';
    M.toast({ html: text });
  }

  var position = current_page.search("center_open");
  if (position != -1) {
    var text = '<span>GOOD: Center Created!</span>';
    M.toast({ html: text });
  }

  var position = current_page.search("nonFound");
  if (position != -1) {
    var text = '<span>BAD: No such center found!</span>';
    M.toast({ html: text });
  }

  var position = current_page.search("emptyFields");
  if (position != -1) {
    var text = '<span>BAD: You have bad internet connection!</span>';
    M.toast({ html: text });
  }

 

});











//Pin Location
function getLocation() {
  document.getElementById('loader-wrapper2').style.display = 'block';
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else {
    var text = '<span>ERROR: Check Internet Connection!</span>';
    M.toast({ html: text });
  }//end else
}//end getLocation()

function showPosition(position) {
  document.getElementById("latitude").disabled = false;
  document.getElementById("longitude").disabled = false;
  document.getElementById("latitude").value = position.coords.latitude;
  document.getElementById("longitude").value = position.coords.longitude;
  var text = '<span>SUCCESS: Location Pinned Successfully!</span>';
  M.toast({ html: text });
  $(".loader-wrapper2").fadeOut("slow");
}//end showPosition()

function showError(error) {
  switch (error.code) {
    case error.PERMISSION_DENIED:
      var text = '<span>ERROR: User denied the request for Geolocation!</span>';
      M.toast({ html: text });
      break;
    case error.POSITION_UNAVAILABLE:
      var text = '<span>ERROR: Location information is unavailable<br>Check Internet Connection!</span>';
      M.toast({ html: text });
      break;
    case error.TIMEOUT:
      var text = '<span>ERROR: The request to get user location timed out!</span>';
      M.toast({ html: text });
      break;
    case error.UNKNOWN_ERROR:
      var text = '<span>ERROR: An unknown error occurred!</span>';
      M.toast({ html: text });
      break;
  }
  $(".loader-wrapper2").fadeOut("slow");
}//end showError()
