$(function () {
    $('#modal-search').on('click', function(event) {
        event.preventDefault();
        $('#search').addClass('open');
        $('#search > form > input[type="search"]').focus();
    });
    
    /*$('form').submit(function(event) {
        event.preventDefault();
        return false;
    })*/
});