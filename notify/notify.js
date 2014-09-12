$(document).ready(function(){
    $("#hide").click(function(){
        $("#notify").slideUp(400);
    });
    $("#show").click(function(){
        notify("", "");
    });

    $("#notify").click(function() {
        $("#notify").slideUp(400);
    });
});

var notify = function(icon, text) {
    $("#notify > .text").replaceWith("tedt");
    $("#notify").slideDown(400);
}