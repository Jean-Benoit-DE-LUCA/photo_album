const loadMore = {

    init: function() {
        loadMore.buttonClick();
    },

    buttonClick: function(number = 5) {

        const buttonLoad = document.getElementsByClassName("load_more")[0];
        const articles = document.getElementsByClassName("home_messages")[0].getElementsByTagName("article");

        for (const art of articles) {
            art.style.display = "none";
        }

        if (number >= articles.length) {
            number = articles.length;
            buttonLoad.style.display = "none";
        }

        for (let i = 0; i < number; i++) {
            articles[i].style.display = "flex";
        }

        buttonLoad.addEventListener("click", function() { loadMore.handleButtonClick(number); });
    },

    handleButtonClick: function(number) {

        number+=5;
        loadMore.buttonClick(number);
    }
}