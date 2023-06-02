const bigPicturePhotoSee = {
    init: function() {
        bigPicturePhotoSee.bigFunc();
    },

    mainBoxImgs: document.getElementsByClassName("photos_see")[0],
    imgElements: document.getElementsByClassName("photo_grid_item"),

    bigFunc: function() {
        for (const elem of bigPicturePhotoSee.imgElements) {
            elem.addEventListener("click", bigPicturePhotoSee.handleBigFunc);            
        }
    },

    handleBigFunc: function(e) {

        for (const img of bigPicturePhotoSee.imgElements) {
            img.classList.remove("active_pic_left");
            img.classList.remove("active_pic_right");
        }

        let imgProperties = e.currentTarget.getBoundingClientRect();
        /*console.log(window.matchMedia("(max-width: 700px)").matches);*/

        if (window.getComputedStyle(e.currentTarget).transform == "matrix(1, 0, 0, 1, 0, 0)" && imgProperties.x < 150 && window.matchMedia("(max-width: 700px)").matches) {
            e.currentTarget.classList.add("active_pic_left");

        } else if (window.getComputedStyle(e.currentTarget).transform == "matrix(1, 0, 0, 1, 0, 0)" && imgProperties.x < 300 && window.matchMedia("(min-width: 700px)").matches) {
            e.currentTarget.classList.add("active_pic_left");
            
        } else if (window.getComputedStyle(e.currentTarget).transform == "matrix(1, 0, 0, 1, 0, 0)" && imgProperties.x < 600 && window.matchMedia("(min-width: 1255px)").matches) {
            e.currentTarget.classList.add("active_pic_left");

        } else {
            e.currentTarget.classList.remove("active_pic_left");
        }

        if (window.getComputedStyle(e.currentTarget).transform == "matrix(1, 0, 0, 1, 0, 0)" && imgProperties.x > 90) {
            e.currentTarget.classList.add("active_pic_right");
        } else {
            e.currentTarget.classList.remove("active_pic_right");
        }

    }
}