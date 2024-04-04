document.addEventListener('DOMContentLoaded', () => {
  const menuButton = document.querySelector('.ham-nav');
  const body = document.body;
  const fixedHeader = document.querySelector("header");

  menuButton.addEventListener('click', () => {
    body.classList.toggle('menu-open');
    fixedHeader.classList.toggle('menu-open')
  });
});

window.addEventListener('scroll', function () {
    const header = document.querySelector("header");

    header.classList.toggle("sticky", window.scrollY > 120);
})


//Hamburger Nav
function toggleMenu() {
    const menu = document.querySelector('.nav-links');
    const icon = document.querySelector('.ham-nav');
    
    menu.classList.toggle('open');
    icon.classList.toggle('open');
}
