const burger = {

    init: function() {
        burger.burgerToggle();
    },

    container: document.getElementsByClassName("container")[0],
    burgerElem: document.getElementsByClassName("burger")[0],
    nav: document.getElementsByTagName("nav")[0],
    navMenu: document.getElementsByTagName("nav")[0].getElementsByTagName("ul")[0],

    burgerToggle: function() {
        burger.burgerElem.addEventListener("click", burger.handleBurgerToggle);
    },

    handleBurgerToggle: function() {

        burger.burgerElem.classList.toggle("active");
        burger.nav.classList.toggle("active_nav");
        burger.container.classList.toggle("active_cont");

        if (burger.burgerElem.classList.contains("active")) {
            burger.navMenu.classList.add("active_menu");
        } else {
            burger.navMenu.classList.remove("active_menu");
            burger.nav.getElementsByClassName("add_li")[0].classList.remove("active_mess");
            burger.nav.getElementsByClassName("arrow")[0].classList.remove("active_arrow");
            burger.nav.getElementsByClassName("arrow")[1].classList.remove("active_arrow");
            burger.nav.getElementsByClassName("submenu_pictures")[0].classList.remove("active_sub");
        }
    }

}