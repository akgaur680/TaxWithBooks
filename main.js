function seterror(id, error) {
  element = document.getElementById(id);
  element.getElementsByClassName("formerror")[0].innerHTML = error;
}
function clearError() {
  errors = document.getElementsByClassName("formerror");
  for (let item of errors) {
    item.innerHTML = "";
  }
}
function validate() {
  clearError();
  var returnval = true;
  var name = document.forms["login"]["name"].value;
  var email = document.forms["login"]["email"].value;
  var contact = document.forms["login"]["contact"].value;
  var password = document.forms["login"]["password"].value;
  console.log(name);
  // Validating email for @ and .  symbol  and a gap between these symbols
  var atpos = email.indexof("@");
  var dotpos = email.lastIndexof(".");
  if (atpos < 1 || dotpos - atpos < 2) {
    seterror("email", "* Invalid email");
    returnval = false;
  }
  return returnval;
}
function shareArticle() {
  // Storing the URL of the current webpage
  const URL = window.location.href;
  //Set The URL in Modal Body
  document.getElementById("urlDisplay").textContent = URL;
  // Set the URL in the textarea
  document.getElementById("urlTextArea").value = URL;
  // Set the URL in the "View URL" link
  document.getElementById("viewUrlLink").href = URL;
  // Displaying in the console
  console.log(URL);
}
function copy() {
  // Get the text from the textarea
  var copyText = document.getElementById("urlTextArea");
  // Select the text inside the textarea
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices
  // Copy the selected text to the clipboard
  document.execCommand("copy");
  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
  // Alert the user
  alert("URL copied to clipboard: " + copyText.value);
}

function printPageArea() {
  var printContent = document.getElementById("printableArea").innerHTML;
  var originalContent = document.body.innerHTML;
  document.body.innerHTML = printContent;
  window.print();
  document.body.innerHTML = originalContent;
}
