const picturesMenu = {
    init: function() {
        picturesMenu.subMenu();
    },

    menuLinks: document.getElementsByClassName("pictures_menu")[0],
    subMenuBlock: document.getElementsByClassName("submenu_pictures")[0],
    spanArrowLi: document.getElementsByClassName("pictures_li")[0].getElementsByTagName("span")[0],

    addLi: document.getElementsByClassName("add_li")[0],
    addLiArrow: document.getElementsByClassName("arrow_one")[0],

    subMenu: function() {
        picturesMenu.menuLinks.addEventListener("click", picturesMenu.handleSubMenu);
    },
    handleSubMenu: function(e) {

        e.preventDefault();

        picturesMenu.subMenuBlock.classList.toggle("active_sub");
        if (picturesMenu.subMenuBlock.classList.contains("active_sub")) {

            picturesMenu.spanArrowLi.classList.add("active_arrow");

            if (picturesMenu.addLi.classList.contains("active_mess")) {
                picturesMenu.addLi.classList.remove("active_mess");
                picturesMenu.addLiArrow.classList.remove("active_arrow");
            }

        } else {
            picturesMenu.spanArrowLi.classList.remove("active_arrow");
        }
    }
}