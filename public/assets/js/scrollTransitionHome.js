const scrollTransitionHome = {
    init: function() {
        scrollTransitionHome.scrollFunc();
    },

    messagesBox: document.getElementsByTagName("article"),

    scrollFunc: function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((elem) => {
                if (elem.isIntersecting) {
                    elem.target.classList.add("show_art");
                } else {
                    elem.target.classList.remove("show_art");
                }
            })
        }, {
            root: null,
            rootMargin: "0px",
            threshold: 0
        });

        for (const elem of scrollTransitionHome.messagesBox) {
            observer.observe(elem);
        }
    }
}