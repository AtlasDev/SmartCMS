$(document).ready(function() {
	setTimeout(function(){
		$('body').addClass('loaded');
	}, 100);
});

function toggleLoad(text) {
    if($('body').hasClass('loadwait')) {
        $("#loader-txt").html(text);
        $('body').removeClass('loadwait');
    } else {
        $('body').addClass('loadwait');
    }
}

function loadStart(text) {
    $("#loader-txt").html(text);
    $('body').removeClass('loadwait');
}

function loadEnd() {
    $('body').addClass('loadwait');
}