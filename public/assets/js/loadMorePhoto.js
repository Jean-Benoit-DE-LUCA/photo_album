const loadMorePhoto = {

    init: function() {
        loadMorePhoto.loadMoreButt();
    },

    photoGrid: document.getElementsByClassName("photo_grid_item"),

    loadMoreButt: function(number = 12) {

        for (let i = 0; i < loadMorePhoto.photoGrid.length; i++) {
            loadMorePhoto.photoGrid[i].style.display = "none";
        }

        if (loadMorePhoto.photoGrid.length < number) {

            for (let i = 0; i < loadMorePhoto.photoGrid.length; i++) {
                loadMorePhoto.photoGrid[i].style.display = "block";
            }

        }

        else {

            for (let i = 0; i < number; i++) {
                loadMorePhoto.photoGrid[i].style.display = "block";
            }

            let container = document.getElementsByClassName("container")[0];
            let butt = document.createElement("button");
            butt.setAttribute("class", "load_more");
            butt.setAttribute("id", "butt_load_id");
            butt.textContent = "Load more";
            container.append(butt);
            
            window.addEventListener("scroll", function() { loadMorePhoto.handleScroll(number) });

        }
    },

    handleScroll: function(number) {

        let buttId = document.getElementById("butt_load_id");
        let viewportOffsetButt = buttId.getBoundingClientRect();

        if (viewportOffsetButt.y - 5 < window.innerHeight) {
            buttId.classList.add("active_load");

            buttId.addEventListener("click", function() { loadMorePhoto.handleClickLoad(number) });
            
        } else {
            buttId.classList.remove("active_load");
        }
    },

    handleClickLoad: function(number) {
        
        number+=12;

        if (number > loadMorePhoto.photoGrid.length) {

            number = loadMorePhoto.photoGrid.length;
            let buttId = document.getElementById("butt_load_id");
            buttId.style.display = "none";
        }

        for (let i = 0; i < number; i++) {
            loadMorePhoto.photoGrid[i].style.display = "block";
        }
    }
}