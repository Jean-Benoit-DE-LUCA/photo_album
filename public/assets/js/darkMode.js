const darkMode = {
    init: function() {
        darkMode.initDarkMode();
        darkMode.getStorageMode();
        darkMode.clickMoonSunBox();
    },

    body: document.getElementsByTagName("body")[0],
    moonSunBox: document.getElementsByClassName("moon_sun_box")[0],
    container: document.getElementsByClassName("container")[0],
    imgHeader: document.getElementsByClassName("header_img")[0].getElementsByTagName("img")[0],
    mainMessages: document.getElementsByClassName("messages")[0],
    navMenu: document.getElementsByTagName("nav")[0].getElementsByTagName("ul")[0],
    arrow: document.getElementsByClassName("arrow"),
    select: document.getElementsByClassName("filter_select")[0],
    inputSearch: document.getElementById("search"),
    imgMagnifyingGlass: document.getElementById("search_bar").getElementsByTagName("img")[0],
    
    clickMoonSunBox: function() {
        darkMode.moonSunBox.addEventListener("click", darkMode.handleClickMoonSunBox);
    },

    handleClickMoonSunBox: function() {

        if (sessionStorage.getItem("isDark") == "yes") {
            darkMode.sessionStorageDarkNo();

        } else if (sessionStorage.getItem("isDark") == "no") {
            darkMode.sessionStorageDarkYes();
        }

    },

    sessionStorageDarkNo: function() {

            sessionStorage.setItem("isDark", "no");

            darkMode.container.style.backgroundColor = "#d0d5db";
            darkMode.select.style.backgroundColor = "#d0d5db";
            darkMode.inputSearch.style.color = "black";

            document.documentElement.style.setProperty("--color_t", "black");
            document.documentElement.style.setProperty("--color_b", "#0000006e");

            const srcReversed = darkMode.imgHeader.src.split("").reverse().join("");
            darkMode.imgHeader.src = srcReversed.slice(29).split("").reverse().join("") + "/assets/images/logo-black-trans.png";

            const imgPathReversed = darkMode.imgMagnifyingGlass.src.split("").reverse().join("");
            darkMode.imgMagnifyingGlass.src = imgPathReversed.slice(27).split("").reverse().join("") + "/magnifying_glass.png";
            
            darkMode.moonSunBox.getElementsByTagName("span")[0].innerHTML = "&#9789;";
            darkMode.moonSunBox.getElementsByTagName("span")[0].style.position = "";
    },
    
    sessionStorageDarkYes: function() {

        sessionStorage.setItem("isDark", "yes");

        darkMode.container.style.backgroundColor = "black";
        darkMode.select.style.backgroundColor = "black";
        darkMode.inputSearch.style.color = "white";

        document.documentElement.style.setProperty("--color_t", "white");
        document.documentElement.style.setProperty("--color_b", "white");
        
        const srcReversed = darkMode.imgHeader.src.split("").reverse().join("");
        darkMode.imgHeader.src = srcReversed.slice(35).split("").reverse().join("") + "/assets/images/logo-black.png";

        const imgPathReversed = darkMode.imgMagnifyingGlass.src.split("").reverse().join("");
        darkMode.imgMagnifyingGlass.src = imgPathReversed.slice(21).split("").reverse().join("") + "/magnifying_glass_black.png";
        
        darkMode.moonSunBox.getElementsByTagName("span")[0].innerHTML = "&#9788;";
        darkMode.moonSunBox.getElementsByTagName("span")[0].style.position = "relative";
        darkMode.moonSunBox.getElementsByTagName("span")[0].style.right = "4px";
        darkMode.moonSunBox.getElementsByTagName("span")[0].style.top = "3px";

    },

    getStorageMode: function() {
        
        if (sessionStorage.getItem("isDark") == "yes") {

            darkMode.container.style.backgroundColor = "black";
            darkMode.select.style.backgroundColor = "black";
            darkMode.inputSearch.style.color = "white";

            document.documentElement.style.setProperty("--color_t", "white");
            document.documentElement.style.setProperty("--color_b", "white");

            const srcReversed = darkMode.imgHeader.src.split("").reverse().join("");
            darkMode.imgHeader.src = srcReversed.slice(35).split("").reverse().join("") + "/assets/images/logo-black.png";

            const imgPathReversed = darkMode.imgMagnifyingGlass.src.split("").reverse().join("");
            darkMode.imgMagnifyingGlass.src = imgPathReversed.slice(21).split("").reverse().join("") + "/magnifying_glass_black.png";

            darkMode.moonSunBox.getElementsByTagName("span")[0].innerHTML = "&#9788;";
            darkMode.moonSunBox.getElementsByTagName("span")[0].style.position = "relative";
            darkMode.moonSunBox.getElementsByTagName("span")[0].style.right = "4px";
            darkMode.moonSunBox.getElementsByTagName("span")[0].style.top = "3px";

        } else if (sessionStorage.getItem("isDark") == "no") {

            darkMode.container.style.backgroundColor = "#d0d5db";
            darkMode.select.style.backgroundColor = "#d0d5db";
            darkMode.inputSearch.style.color = "black";

            document.documentElement.style.setProperty("--color_t", "black");
            document.documentElement.style.setProperty("--color_b", "#0000006e");


            const srcReversed = darkMode.imgHeader.src.split("").reverse().join("");
            darkMode.imgHeader.src = srcReversed.slice(35).split("").reverse().join("") + "/assets/images/logo-black-trans.png";

            const imgPathReversed = darkMode.imgMagnifyingGlass.src.split("").reverse().join("");
            darkMode.imgMagnifyingGlass.src = imgPathReversed.slice(21).split("").reverse().join("") + "/magnifying_glass.png";
            
            darkMode.moonSunBox.getElementsByTagName("span")[0].innerHTML = "&#9789;";
            darkMode.moonSunBox.getElementsByTagName("span")[0].style.position = "";
        }
    },

    initDarkMode: function() {
        if (sessionStorage.getItem("isDark") == null) {
            
            sessionStorage.setItem("isDark", "no");
        }
    }
}