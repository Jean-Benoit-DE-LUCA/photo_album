const randomPhoto = {

    init: function() {
        randomPhoto.photoDisplay();
    },

    randomButton: document.getElementsByClassName("random_butt")[0],
    imgElements: document.getElementsByClassName("carousel")[0].getElementsByTagName("img"),

    photoDisplay: function() {
        randomPhoto.imgElements[0].classList.add("active_img");
        randomPhoto.randomButton.addEventListener("click", randomPhoto.handleRandomPhoto);
    },

    handleRandomPhoto: function() {
        
        let ranNum = Math.round(0 + Math.random() * ((randomPhoto.imgElements.length-1) - 0));

        if (randomPhoto.imgElements[ranNum].classList.contains("active_img")) {
            if (ranNum !== randomPhoto.imgElements.length-1) {
                ranNum += 1;
            } else {
                ranNum -= 1;
            }            
        }

        for (let i = 0; i < randomPhoto.imgElements.length; i++) {
            randomPhoto.imgElements[i].classList.remove("active_img");
        }
        for (let i = 0; i < randomPhoto.imgElements.length-1; i++) {           
            randomPhoto.imgElements[ranNum].classList.add("active_img"); 
        }       
    }
}