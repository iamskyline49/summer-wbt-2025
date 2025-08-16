function validateForm() {
  const form = document.forms["contactForm"];

  const firstName = form["firstname"].value.trim();
  const lastName = form["lastname"].value.trim();
  const email = form["email"].value.trim();
  const phone = form["phone"].value.trim();
  const reasons = form["Reason"];

  clearErrors();

  let isValid = true;
  let reasonSelected = false;

  if (firstName === "") {
    showError(form["firstname"], "Please enter your first name.");
    isValid = false;
  }

  if (lastName === "") {
    showError(form["lastname"], "Please enter your last name.");
    isValid = false;
  }

  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailPattern.test(email)) {
    showError(form["email"], "Please enter a valid email address.");
    isValid = false;
  }

  const phonePattern = /^\d{10,15}$/;
  if (!phonePattern.test(phone)) {
    showError(form["phone"], "Phone number must be 10 to 15 digits.");
    isValid = false;
  }

  for (let i = 0; i < reasons.length; i++) {
    if (reasons[i].checked) {
      reasonSelected = true;
      break;
    }
  }

  if (!reasonSelected) {
    showError(reasons[0].parentElement, "Please select a reason.");
    isValid = false;
  }

  if (isValid) {
    alert("Form submitted successfully!");
    form.submit();
  }
}

function showError(inputElement, message) {
  const error = document.createElement("span");
  error.className = "error-message";
  error.textContent = message;
  inputElement.insertAdjacentElement("afterend", error);
}

function clearErrors() {
  const errors = document.querySelectorAll(".error-message");
  errors.forEach((error) => error.remove());
}

function resetForm() {
  const form = document.forms["contactForm"];
  form.reset();
  clearErrors();
}
