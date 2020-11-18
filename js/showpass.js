function showPassword() {
  var x = document.getElementById("password"); //akses pass
  /* Mengecek jika checkbox ditekan */
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}