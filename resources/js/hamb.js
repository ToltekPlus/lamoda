a = 0
function hamburger() {
    if(a == 0){
        document.getElementById('foo').classList.add("hamburger_active");
        document.getElementById('hamb').classList.add("hamburger__menu_opened");
        a = 1
    } else {
        document.getElementById('foo').classList.remove("hamburger_active");
        document.getElementById('hamb').classList.remove("hamburger__menu_opened");
        a = 0
     }
}