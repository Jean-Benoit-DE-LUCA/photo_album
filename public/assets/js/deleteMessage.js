const deleteMessage = {

    init: function() {
        deleteMessage.deleteFunc();
    },

    buttonDelete: document.getElementsByClassName("button_delete_mess"),

    deleteFunc: function() {

        for (const button of deleteMessage.buttonDelete) {
            if (button !== undefined) {
                button.addEventListener("click", deleteMessage.handleDeleteFunc);
            }
        }
    },

    handleDeleteFunc: function(e) {
        e.preventDefault();
        
        let spansElem = e.currentTarget.parentElement.parentElement.getElementsByTagName("span");
        
        spansElem[0].classList.toggle("active");

        setTimeout(() => {
            spansElem[1].classList.toggle("active");
        }, 125);

        spansElem[0].addEventListener("click", deleteMessage.handleTickClick);
        spansElem[1].addEventListener("click", deleteMessage.handleCrossClick);
        
    },

    handleTickClick: async function (e) {
        
        if (e.currentTarget.classList.contains("active")) {

            e.currentTarget.parentElement.parentElement.classList.add("removed");
            
            let idMess = window.atob(e.currentTarget.parentElement.parentElement.getElementsByClassName("id_mess")[0].value);

            const response = await fetch(`/www/php/photo_album/public/messages/delete/${idMess}`, {
                method: "DELETE",
                headers: {
                    "Content-type": "application/json"
                },
                body: JSON.stringify({
                    id: idMess
                })
            });

            setTimeout(() => {
                let removedArticle = document.getElementsByClassName("removed")[0];
                removedArticle.remove();
            }, 500);

        }
    },

    handleCrossClick: function(e) {

        const removeActive = (event) => {

            event.target.previousSibling.previousSibling.classList.remove("active");

            setTimeout(() => {
                event.target.classList.remove("active");
            }, 125);
        }

        removeActive(e);
        
    }
};
