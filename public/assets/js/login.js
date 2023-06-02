const login = {
    init: function() {
        login.displayBurger();
    },
    burgerElem: document.getElementsByClassName("burger")[0],
    displayBurger: function() {
        if (window.location.href.substring(44) == "login") {
            login.burgerElem.style.display = "none";
        }
    }
}