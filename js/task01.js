function checkContactForm() {
  var option = prompt(
    "Reason of Contact 1.Job or 2.Project,Just Write the option number"
  );
  if (Number(option) === 1) {
    alert("Call Me on my given number");
  } else if (Number(option) === 2) {
    alert("Email Me on my given mail address");
  }
}
checkContactForm();
