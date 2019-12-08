// JavaScript
function ajax_get(url, callback) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            try {
                var data = JSON.parse(xmlhttp.responseText);
            } catch (err) {
                console.log(err.message + " in " + xmlhttp.responseText);
                return;
            }
            callback(data);
        }
    };

    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}



var options = {

    url: "./js/country.json",

    getValue: "name",

    list: {
        match: {
            enabled: true
        }
    },

    theme: "square"
};

$("#events").easyAutocomplete(options);


