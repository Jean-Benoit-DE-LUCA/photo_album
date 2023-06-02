const darkModeOthers = {
    init: function() {
        darkModeOthers.initDarkMode();
        darkModeOthers.getStorageMode();
        darkModeOthers.clickMoonSunBox();
    },

    body: document.getElementsByTagName("body")[0],
    moonSunBox: document.getElementsByClassName("moon_sun_box")[0],
    container: document.getElementsByClassName("container")[0],
    imgHeader: document.getElementsByClassName("header_img")[0].getElementsByTagName("img")[0],
    mainMessages: document.getElementsByClassName("messages")[0],
    navMenu: document.getElementsByTagName("nav")[0].getElementsByTagName("ul")[0],
    arrow: document.getElementsByClassName("arrow"),
    
    clickMoonSunBox: function() {
        darkModeOthers.moonSunBox.addEventListener("click", darkModeOthers.handleClickMoonSunBox);
    },

    handleClickMoonSunBox: function() {

        if (sessionStorage.getItem("isDark") == "yes") {
            darkModeOthers.sessionStorageDarkNo();

        } else if (sessionStorage.getItem("isDark") == "no") {
            darkModeOthers.sessionStorageDarkYes();
        }

    },

    sessionStorageDarkNo: function() {

            sessionStorage.setItem("isDark", "no");
            
            darkModeOthers.container.style.backgroundColor = "#d0d5db";

            let selectFilterSee = document.getElementById("filter_id");
            if (document.body.contains(selectFilterSee)) {
                selectFilterSee.style.backgroundColor = "#d0d5db";
            }

            document.documentElement.style.setProperty("--color_t", "black");
            document.documentElement.style.setProperty("--color_b", "#0000006e");

            const srcReversed = darkModeOthers.imgHeader.src.split("").reverse().join("");
            darkModeOthers.imgHeader.src = srcReversed.slice(29).split("").reverse().join("") + "/assets/images/logo-black-trans.png";
            
            darkModeOthers.moonSunBox.getElementsByTagName("span")[0].innerHTML = "&#9789;";
            darkModeOthers.moonSunBox.getElementsByTagName("span")[0].style.position = "";

    },
    
    sessionStorageDarkYes: function() {

        sessionStorage.setItem("isDark", "yes");

        darkModeOthers.container.style.backgroundColor = "black";

        let selectFilterSee = document.getElementById("filter_id");
            if (document.body.contains(selectFilterSee)) {
                selectFilterSee.style.backgroundColor = "black";
            }

        document.documentElement.style.setProperty("--color_t", "white");
        document.documentElement.style.setProperty("--color_b", "white");
        
        const srcReversed = darkModeOthers.imgHeader.src.split("").reverse().join("");
        darkModeOthers.imgHeader.src = srcReversed.slice(35).split("").reverse().join("") + "/assets/images/logo-black.png";
        
        darkModeOthers.moonSunBox.getElementsByTagName("span")[0].innerHTML = "&#9788;";
        darkModeOthers.moonSunBox.getElementsByTagName("span")[0].style.position = "relative";
        darkModeOthers.moonSunBox.getElementsByTagName("span")[0].style.right = "4px";
        darkModeOthers.moonSunBox.getElementsByTagName("span")[0].style.top = "3px";
    },

    getStorageMode: function() {
        
        if (sessionStorage.getItem("isDark") == "yes") {

            darkModeOthers.container.style.backgroundColor = "black";

            let selectFilterSee = document.getElementById("filter_id");
            if (document.body.contains(selectFilterSee)) {
                selectFilterSee.style.backgroundColor = "black";
            }

            document.documentElement.style.setProperty("--color_t", "white");
            document.documentElement.style.setProperty("--color_b", "white");

            const srcReversed = darkModeOthers.imgHeader.src.split("").reverse().join("");
            darkModeOthers.imgHeader.src = srcReversed.slice(35).split("").reverse().join("") + "/assets/images/logo-black.png";

            darkModeOthers.moonSunBox.getElementsByTagName("span")[0].innerHTML = "&#9788;";
            darkModeOthers.moonSunBox.getElementsByTagName("span")[0].style.position = "relative";
            darkModeOthers.moonSunBox.getElementsByTagName("span")[0].style.right = "4px";
            darkModeOthers.moonSunBox.getElementsByTagName("span")[0].style.top = "3px";

        } else if (sessionStorage.getItem("isDark") == "no") {

            darkModeOthers.container.style.backgroundColor = "#d0d5db";

            let selectFilterSee = document.getElementById("filter_id");
            if (document.body.contains(selectFilterSee)) {
                selectFilterSee.style.backgroundColor = "#d0d5db";
            }

            document.documentElement.style.setProperty("--color_t", "black");
            document.documentElement.style.setProperty("--color_b", "#0000006e");


            const srcReversed = darkModeOthers.imgHeader.src.split("").reverse().join("");
            darkModeOthers.imgHeader.src = srcReversed.slice(35).split("").reverse().join("") + "/assets/images/logo-black-trans.png";
            
            darkModeOthers.moonSunBox.getElementsByTagName("span")[0].innerHTML = "&#9789;";
            darkModeOthers.moonSunBox.getElementsByTagName("span")[0].style.position = "";
        }
    },

    initDarkMode: function() {
        if (sessionStorage.getItem("isDark") == null) {
            
            sessionStorage.setItem("isDark", "no");
        }
    }
}