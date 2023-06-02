const quoteApi = {
    init: function() {
        quoteApi.getQuote();
    },

    getQuote: async function() {
        const response = await fetch("https://type.fit/api/quotes");
        const data = await response.json();
        
        let randomNum = Math.round(0 + Math.random() * ((data.length-1) - 0));
        
        let authorName = document.getElementsByClassName("author_box")[0].getElementsByTagName("dd")[0];
        let quoteContent = document.getElementsByClassName("quote_content")[0];

        authorName.textContent = data[randomNum]["author"];
        quoteContent.textContent = data[randomNum]["text"];

        if (quoteContent.textContent.length < 30) {
            document.documentElement.style.setProperty("--trans_moving_text", "450%");
        }

        if (quoteContent.textContent.length > 65 && quoteContent.textContent.length < 90) {
            document.documentElement.style.setProperty("--trans_moving_text", "150%");
            document.documentElement.style.setProperty("--moving_anim_duration", "16s");
        }

        if (quoteContent.textContent.length >= 90) {
            document.documentElement.style.setProperty("--trans_moving_text", "100%");
            document.documentElement.style.setProperty("--moving_anim_duration", "20s");
        }
    }
}