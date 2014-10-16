$(document).ready(function() {
    $("#login").submit(function(event) {
        event.preventDefault();
        $('.bs-login').modal('hide')
        loadStart("Logging in...");
    }); 
});

$(document).ready(function() {
    $(".btn-logout").on("click", function(event) {
        event.preventDefault();
        loadStart("Logging in...");
    }); 
});

$(document).ready(function() {
    $("#register").submit(function(event) {
        event.preventDefault();
        $('.bs-login').modal('hide')
        loadStart("Registering...");
    }); 
});