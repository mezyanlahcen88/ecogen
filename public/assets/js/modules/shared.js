let messageEditor = null;
/**
 * Changer au format table with view
 */
function changeToTableWithView(value = false) {
    if(value) {
        $("#table_layout").toggleClass('col-xxl-12 col-xxl-9');
        $("#view_layout").removeClass('d-none');
    } else {
        $("#table_layout").toggleClass('col-xxl-9 col-xxl-12');
        $("#view_layout").addClass('d-none');
    }
}

/**
 * Close the table view
 */
$(document).on('click', '.close_table_view', function () {
    changeToTableWithView(false);
})


/**
 * Init Ckeditor
 */
function initCkeditor() {
    ClassicEditor
    .create(document.querySelector('.ckeditor'))
    .then( newEditor => {
        this.messageEditor = newEditor;
    } )
    .catch(error => {
        console.error(error);
    });
}

/**
 * SET DATA TO THE MESSAGE EDITOR
 * @param {*} content 
 */
function setContentCK(content) {
    this.messageEditor.setData(content)
}