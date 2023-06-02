const meteoApi = {
    init: function() {
        meteoApi.loadData();
        meteoApi.buttonSearchAction();
    },

    buttonSearch: document.getElementsByClassName("submit_search_bar")[0],
    searchBar: document.getElementById("search"),
    meteoBox: document.getElementsByClassName("meteo")[0],

    loadData: async function() {

        setTimeout(() => {meteoApi.meteoBox.classList.add("active_news");}, 125);

        let cities = variables.listFunction()["cities"];
        let randomIndex = Math.floor(Math.random() * Object.keys(cities).length);
        meteoApi.searchBar.setAttribute("placeholder", cities[randomIndex]);

        let cityPlaceholder = meteoApi.searchBar.getAttribute("placeholder");
        
        const response = await fetch(config.API_mapquest + cityPlaceholder);
        const data = await response.json();
        
        let latitude = data["results"][0]["locations"][0]["latLng"]["lat"];
        let longitude = data["results"][0]["locations"][0]["latLng"]["lng"];

        let latString = latitude.toString();
        latitude = latString.substring(0, latString.indexOf(".") + 3);

        let longString = longitude.toString();
        longitude = longString.substring(0, latString.indexOf(".") + 3);

        const responseMeteo = await fetch (config.API_openmeteo_1 + latitude + config.API_openmeteo_2 + longitude + config.API_openmeteo_3);
        const dataMeteo = await responseMeteo.json();

        const table = document.getElementsByTagName("table")[0];
                
        const minTemp = table.getElementsByClassName("min_temp")[0];
        const maxTemp = table.getElementsByClassName("max_temp")[0];
        const sunrise = table.getElementsByClassName("sunrise")[0];
        const sunset = table.getElementsByClassName("sunset")[0];
        const rain = table.getElementsByClassName("rain")[0];
        const time = document.getElementsByClassName("table_time")[0];

        minTemp.textContent = dataMeteo["daily"]["temperature_2m_min"][0] + "°";
        maxTemp.textContent = dataMeteo["daily"]["temperature_2m_max"][0] + "°";
        sunrise.textContent = dataMeteo["daily"]["sunrise"][0].substring(dataMeteo["daily"]["sunrise"][0].indexOf("T")+1);
        sunset.textContent = dataMeteo["daily"]["sunset"][0].substring(dataMeteo["daily"]["sunrise"][0].indexOf("T")+1);
        rain.textContent = dataMeteo["daily"]["rain_sum"][0];
        time.textContent = dataMeteo["daily"]["time"][0];
    },

    buttonSearchAction: function() {

        meteoApi.buttonSearch.addEventListener("click", meteoApi.handleButtonSearchAction);
    },

    handleButtonSearchAction: async function(e) {

        e.preventDefault();
        let value = meteoApi.searchBar.value;

        const response = await fetch(config.API_mapquest + value);
        const data = await response.json();
        
        let latitude = data["results"][0]["locations"][0]["latLng"]["lat"];
        let longitude = data["results"][0]["locations"][0]["latLng"]["lng"];

        let latString = latitude.toString();
        latitude = latString.substring(0, latString.indexOf(".") + 3);

        let longString = longitude.toString();
        longitude = longString.substring(0, latString.indexOf(".") + 3);

        const responseMeteo = await fetch (config.API_openmeteo_1 + latitude + config.API_openmeteo_2 + longitude + config.API_openmeteo_3);
        const dataMeteo = await responseMeteo.json();

        const table = document.getElementsByTagName("table")[0];
                
        const minTemp = table.getElementsByClassName("min_temp")[0];
        const maxTemp = table.getElementsByClassName("max_temp")[0];
        const sunrise = table.getElementsByClassName("sunrise")[0];
        const sunset = table.getElementsByClassName("sunset")[0];
        const rain = table.getElementsByClassName("rain")[0];
        const time = document.getElementsByClassName("table_time")[0];

        minTemp.textContent = dataMeteo["daily"]["temperature_2m_min"][0] + "°";
        maxTemp.textContent = dataMeteo["daily"]["temperature_2m_max"][0] + "°";
        sunrise.textContent = dataMeteo["daily"]["sunrise"][0].substring(dataMeteo["daily"]["sunrise"][0].indexOf("T")+1);
        sunset.textContent = dataMeteo["daily"]["sunset"][0].substring(dataMeteo["daily"]["sunrise"][0].indexOf("T")+1);
        rain.textContent = dataMeteo["daily"]["rain_sum"][0];
        time.textContent = dataMeteo["daily"]["time"][0];
    }
}