$(document).ready(function(){
    $("#notify").click(function() {
        stopNotify();
    });
});

var notify = function(icon, text) {
    $("#notify > .logo > i").addClass("fa fa-" + icon);
    $("#notify > .text").text(text);
    $("#notify").slideDown(400);
    setTimeout(function(){
        $("#notify").slideUp(400);
    }, 10000);
}

var stopNotify = function() {
    $("#notify").slideUp(400);
    $("#notify > .logo > i").removeClass();
}