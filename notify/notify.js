$(document).ready(function(){
    $("#hide").click(function(){
        stopNotify();
    });
    $("#show").click(function(){
        notify("code", "I am a notification! Ommygaws I'm so awsome!");
    });

    $("#notify").click(function() {
        stopNotify();
    });
});

var notify = function(icon, text) {
    $("#notify > .logo > i").addClass("fa fa-" + icon);
    $("#notify > .text").text(text);
    $("#notify").slideDown(400);
}

var stopNotify = function() {
    $("#notify").slideUp(400);
    $("#notify > .logo > i").removeClass();
}