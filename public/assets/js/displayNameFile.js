const displayNameFile = {

    init: function() {
        displayNameFile.onChangeFileName();
    },

    onChangeFileName: function() {

        const fileInput = document.getElementsByClassName("input_file")[0];
        fileInput.addEventListener("change", displayNameFile.handleOnChangeFileName);
    },

    handleOnChangeFileName: function(e) {

        const pFileName = document.getElementsByClassName("file_name_input")[0];
        pFileName.textContent = e.target.value.substring(e.target.value.lastIndexOf("\\") + 1);
    }
};