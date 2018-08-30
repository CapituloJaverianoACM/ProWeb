function validateForm() {
  let username = document.forms["signupForm"]["username"].value;
  let password = document.forms["signupForm"]["password"].value;
  let repassword = document.forms["signupForm"]["repassword"].value;
  if(password != repassword) {
    alert("Las contraseñas no coinciden");
    return false;
  }
}
