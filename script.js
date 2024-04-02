//CLOSE BURGER
document.addEventListener("click", function (event) {
  var navbar = document.querySelector(".navbar-collapse");
  if (
    navbar.classList.contains("show") &&
    !event.target.closest(".navbar-collapse")
  ) {
    navbar.classList.remove("show");
  }
});

//COOKIES
function acceptCookies() {
  document.getElementById("cookieModal").style.display = "none";
}

function rejectCookies() {
  document.getElementById("cookieModal").style.display = "none";
}

window.onload = function () {
  document.getElementById("darcekModal").style.display = "block";
};
//DARCEK
function acceptDarcek() {
  document.getElementById("darcekModal").style.display = "none";
}

function rejectDarcek() {
  document.getElementById("darcekModal").style.display = "none";
}

window.onload = function () {
  document.getElementById("darcekModal").style.display = "block";
};
