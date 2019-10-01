const siteBody      = document.querySelector('body');
const menuToggle    = document.querySelector('.ui-menu-open');
const menuClose     = document.querySelector('.ui-menu-close');
const menuDrawer    = document.querySelector('.ui-nav-mobile');
var isActive        = false;

document.onkeyup = function(e) {
    e = e || window.event;
    var charCode = (typeof e.which == "number")?e.which:e.keyCode;
    console.log(e.keyCode);
    if (charCode == 27 && isActive) { 
        menuClose.click();
    }
}

function addClasses(first, second) {
    first.classList.add('is-active');
    second.classList.add('is-active');
}
function removeClasses(first, second) {
    first.classList.remove('is-active');
    second.classList.remove('is-active');
}

menuToggle.onclick = function toggleNav (event) {
  if (isActive === true) {
    removeClasses(menuToggle,menuDrawer);
    menuToggle.focus();
    isActive = false;
  } else {
    addClasses(menuToggle,menuDrawer);
    menuClose.focus();
    isActive = true;
  }
}
menuClose.onclick = function closeNav (event) {
    if (isActive === true) {
        removeClasses(menuToggle,menuDrawer);
        menuToggle.focus();
        isActive = false;
    } else {
        addClasses(menuToggle,menuDrawer);
        isActive = true;
    }
}