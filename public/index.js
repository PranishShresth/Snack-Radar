$(function () {
  $('[data-toggle="popover"]').popover({
    container: "body",
    title: "Update your profile",
    html: true,
    placement: "bottom",
    sanitize: false,
    content: function () {
      return $("#PopoverContent").html();
    },
  });
});

$(document).ready(function () {
  var form = document.getElementById("sign-up");
  form.addEventListener("submit", (ev) => {
    var password = document.getElementById("signup-pass").value;
    if (password.length > 0 && password.length < 6) {
      window.alert("The password is less than 6 characters");
      ev.preventDefault();
    }
  });
});
