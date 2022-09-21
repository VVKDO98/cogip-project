const burgerMenu = document.getElementById('burgerMenu');
const desktopMenu = document.getElementById('desktopMenu');

burgerMenu.addEventListener("click", e =>{
    desktopMenu.style.display = "flex";
})