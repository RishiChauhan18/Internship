function passwordCheck() {
  if (this.value == "") {
    this.innerHTML = "";
    return;
  }
  else {
    if (window.XMLHttpRequest) {
      // for Chrome, IE7+,etc
      xmlhttp = new XMLHttpRequest();
    }
    else {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        this.innerHTML = xmlhttp.responseText;
      }
    };
    xmlhttp.open("POST", "database.php", true);
    xmlhttp.send(this.value)
  }
}
