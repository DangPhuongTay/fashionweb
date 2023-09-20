
document.onscroll = function () {
    const scroll = window.scrollY;
    closeNavBar = document.querySelector(".header-navbar-close");
    navBar = document.querySelector(".header-navbar");

  
    if (scroll < 300) {
      document.querySelector(".bottom-btn").style.display = "none";
    } else {
      document.querySelector(".bottom-btn").style.display = "block";
    }
  };
  
  let burger = document.querySelector(".burger-box");
  let body = document.querySelector("body");
  
  burger.onclick = function () {
    body.classList.toggle("active");
  };