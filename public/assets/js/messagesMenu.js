const messagesMenu = {
    init: function() {
        messagesMenu.clickMessageLink();
    },

    messageLink: document.getElementsByClassName("message_menu")[0],
    addLink: document.getElementsByClassName("add_li")[0],
    spanArrow: document.getElementsByClassName("arrow")[0],

    subMenuPictures: document.getElementsByClassName("submenu_pictures")[0],
    subMenuPicturesArrow: document.getElementsByClassName("arrow_two")[0],

    clickMessageLink: function() {
        messagesMenu.messageLink.addEventListener("click", messagesMenu.handleClickMessageLink);
    },
    handleClickMessageLink: function(e) {
        e.preventDefault();

        if (!messagesMenu.addLink.classList.contains("active_mess")) {
            messagesMenu.addLink.classList.add("active_mess");
            messagesMenu.spanArrow.classList.add("active_arrow");

            if (messagesMenu.subMenuPictures.classList.contains("active_sub")) {
                messagesMenu.subMenuPictures.classList.remove("active_sub");
                messagesMenu.subMenuPicturesArrow.classList.remove("active_arrow");
            }

        } else {
            messagesMenu.addLink.classList.remove("active_mess");
            messagesMenu.spanArrow.classList.remove("active_arrow");
        }
    }
}