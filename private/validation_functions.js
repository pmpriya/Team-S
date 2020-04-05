function isEmpty(r, e) {
  if (r.value.trim() == "") {
    if (append)
      document.getElementById("alert_message").innerHTML +=
        e + " can't be empty.</br>";
    else
      document.getElementById("alert_message").innerHTML =
        e + " can't be empty";
    return true;
  }
  if (append) document.getElementById("alert_message").innerHTML += "";
  else document.getElementById("alert_message").innerHTML = "";
  return false;
}

function ValidateNHSEmail() {
  var mail = document.getElementById("email");
  if (!isEmpty(mail, "Mail")) {
    mail = mail.value;
    if (/^\w+([\.-]?\w+)*@nhs.net$/.test(mail)) {
      if (append) document.getElementById("alert_message").innerHTML += "";
      else document.getElementById("alert_message").innerHTML = "";
      return true;
    } else if (/^\w+([\.-]?\w+)*@[0-9a-zA-Z]+.nhs.uk$/.test(mail)) {
      if (append) document.getElementById("alert_message").innerHTML += "";
      else document.getElementById("alert_message").innerHTML = "";
      return true;
    }
    if (append)
      document.getElementById("alert_message").innerHTML +=
        "Invalid Email<br/>";
    else document.getElementById("alert_message").innerHTML = "Invalid Email";
    return false;
  }
  return false;
}

function isOnlyNumber(r, e) {
  if (!isEmpty(r, e)) {
    if (/[-]?[0-9]+[,.]?[0-9]*([\/][0-9]+[,.]?[0-9]*)*/.test(r.value.trim())) {
      if (append) document.getElementById("alert_message").innerHTML += "";
      else document.getElementById("alert_message").innerHTML = "";
      return true;
    }
    if (append)
      document.getElementById("alert_message").innerHTML +=
        e + " can only contain Numbers<br/>";
    else
      document.getElementById("alert_message").innerHTML =
        e + " can only contain Numbers";
    return false;
  }
  return false;
}

function isNHS(r, e) {
  if (r.value.length !== 10 && r.value.length !== 0) {
    if (append)
      document.getElementById("alert_message").innerHTML +=
        e + " must have 10 digits</br>";
    else
      document.getElementById("alert_message").innerHTML =
        e + " must have 10 digits";
    return true;
  }
}
