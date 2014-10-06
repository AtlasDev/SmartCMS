url = $(location).attr('href').substring(0, $(location).attr('href').lastIndexOf("/")) + "/api/";
$.post(url, { type: "theme", dataType: 'json' })
    .done(function(data) {
        console.log(data[0].destination);
    });