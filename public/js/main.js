const navMenu = document.querySelector(".nav__menu");
const navBurger = document.querySelector("#nav__burger");
const navCross = document.querySelector('#nav__cross');

navBurger.onclick = openNav;
navCross.onclick = closeNav;

function openNav() {
    navMenu.style.display = "flex";
    navCross.style.display = "flex"
    navBurger.style.display = "none";
}

function closeNav() {
    navMenu.style.display = "none";
    navCross.style.display = "none"
    navBurger.style.display = "flex";
}
