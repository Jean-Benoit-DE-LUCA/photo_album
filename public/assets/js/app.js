const app = {
    init: function() {
        if (window.location.pathname == "/www/php/photo_album/public/") {
            variables.init();
            meteoApi.init();
            quoteApi.init();
            scrollTransitionHome.init();
            filterMessages.init();
            loadMore.init();
            darkMode.init();
            backTop.init();
            deleteMessage.init();
        }

        if (window.location.pathname !== "/www/php/photo_album/public/") {
            darkModeOthers.init();
        }
        
        if (window.location.pathname == "/www/php/photo_album/public/photos/random") {
            randomPhoto.init();
        }

        if (window.location.pathname == "/www/php/photo_album/public/photos") {
            scrollTransitionPhotoSee.init();
            bigPicturePhotoSee.init();
            filterMessages.init();
            backTop.init();
            loadMorePhoto.init();
        }

        if (window.location.pathname == "/www/php/photo_album/public/photos/add") {
            displayNameFile.init();
        }

        burger.init();
        login.init();
        picturesMenu.init();
        messagesMenu.init();
    }
}

document.addEventListener("DOMContentLoaded", app.init);