const filterMessages = {
    init: function() {
        filterMessages.filtMessFunc();
    },

    filtMessFunc: function() {

        const filterTitle = document.getElementsByClassName("filter_title_box")[0];
        filterTitle.addEventListener("click", filterMessages.handlefiltMessFunc);
    },

    handlefiltMessFunc: function() {

        const filterBox = document.getElementsByClassName("filter_box")[0];
        const arrowFilter = filterBox.getElementsByClassName("arrow")[0];
        const form = filterBox.getElementsByTagName("form")[0];

        filterBox.classList.toggle("active_filter");
        arrowFilter.classList.toggle("active_arrow");
        
        if (filterBox.classList.contains("active_filter")) {
            setTimeout(() => {
                form.classList.toggle("active_filter");
            }, 175);
        }
        if (!filterBox.classList.contains("active_filter")) {
            form.classList.toggle("active_filter");
        }
        

    }
}