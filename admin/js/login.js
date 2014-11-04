$(document).ready(function() {
    $("#login").submit(function(event) {
        event.preventDefault();
        $('body').removeClass('loadwait');
        $('#error').html('gnsfhs');
    }); 
});