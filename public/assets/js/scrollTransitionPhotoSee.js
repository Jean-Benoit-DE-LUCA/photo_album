const scrollTransitionPhotoSee = {
    init: function() {
        scrollTransitionPhotoSee.scrollFunc();
    },

    imgElements: document.getElementsByClassName("photo_grid_item"),

    scrollFunc: function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((elem) => {
                if (elem.isIntersecting) {
                    elem.target.classList.add("show_img")
                } else {
                    elem.target.classList.remove("show_img")
                }
            })
        }, {
            root: null,
            rootMargin: "100px",
            threshold: 0
        })

        for (const elem of scrollTransitionPhotoSee.imgElements) {
            observer.observe(elem);
        }
    }
}