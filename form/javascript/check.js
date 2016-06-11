function activeButton(id) {
 document.getElementById(id).setAttribute("class", "active");
 // document.getElementById("homeButton").innerHTML = "hello";
}

function pagination() {
  
}

function confirmPass() {
  if ((document.getElementById("confirm_pass").value != document.getElementById("pass").value) && (document.getElementById("confirm_pass").value != "") && (document.getElementById("pass").value != "")) {
    document.getElementById("signupButton").disabled = true;
    document.getElementById("passE").innerHTML = "*Passwords do not match";
  }
  else {
      document.getElementById("signupButton").disabled = false;
      document.getElementById("passE").innerHTML = "";
  }
}

function checkPass() {
  if((document.getElementById("pass").value.length < 8) && (document.getElementById("pass").value != ""))
  {
    document.getElementById("passE").innerHTML = "*Password must be of atleast 8 characters";
    document.getElementById("signupButton").disabled = true;
  }
  else {
    document.getElementById("passE").innerHTML = "";
  }
}

function checkUsername() {
  if (window.XMLHttpRequest) {
    // for Chrome, Firefox, etc
    xmlhttp = new XMLHttpRequest();
  }
  else {
    // for Internet Explorer 5 and 6
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("usernameE").innerHTML = xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET","check_exist.php?q="+document.getElementById("username").value, true);
  xmlhttp.send();
}

function checkEmail() {
  if (!validateEmail()) {

    if (window.XMLHttpRequest) {
      //for Chrome, etc
      xmlhttp = new XMLHttpRequest();
    }
    else {
      //for IE 5 & 6
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("emailE").innerHTML = xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET","check_exist.php?q="+document.getElementById("email").value, true);
    xmlhttp.send();
  }
}

function validateEmail() {
    var x = document.getElementById("email").value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        document.getElementById("emailE").innerHTML = "*Invalid email";
        document.getElementById("signupButton").disabled = true;
        return false;
    }
}
