url = $(location).attr('href').substring(0, $(location).attr('href').lastIndexOf("/")) + "/api/";
$.post(url, { type: "theme" })
    .done(function(data) {
        console.log(data[0].destination);
    });