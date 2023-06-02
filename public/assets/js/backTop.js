const backTop = {

    init: function() {
        backTop.backTopButt();
    },

    backTopButt: function() {

        window.addEventListener("scroll", backTop.handleScrollBackTopButt);
    },

    handleScrollBackTopButt: function() {

        const backTopButton = document.getElementsByClassName("back_top")[0];
        let viewportOffsetBackTop = backTopButton.getBoundingClientRect()

        if (viewportOffsetBackTop.y + 5 < window.innerHeight) {
            backTopButton.classList.add("active_back_top");
        } else {
            backTopButton.classList.remove("active_back_top");
        }

        backTopButton.addEventListener("click", backTop.handleBackTopButt);
    },

    handleBackTopButt: function() {

        scrollTo({top: 0, behavior: "smooth"});
    },
}