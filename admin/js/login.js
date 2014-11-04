$(document).ready(function() {
    $("#login").submit(function(event) {
        event.preventDefault();
        $('body').removeClass('loadwait');
        //$('#error').html('Username and/or password incorrect!');
        //$('#error').show();
    }); 
});