$(document).ready(function() {
    $(".btn-login").on("click", function(event) {
        event.preventDefault();
        $('.bs-login').modal('hide')
        loadStart("Logging in...");
    }); 
});