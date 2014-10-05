url = $(location).attr('href').substring(0, $(location).attr('href').lastIndexOf("/")) + "/api/";
$.post(url, { type: "theme" })
    .done(function(data) {
        $("body").append("sda" + data);
        data = JSON.parse(data);
        console.log(data);
    });