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

ajax_get('./team-members.json', function (data) {
    let html = "";
    for (let i = 0; i < data["team-members"].length; i++) {
        html += '<div class="col-lg-4 col-sm-6 col-xs-12">';
        html += '<img class="rounded-circle" src="./assets/images/' + data["team-members"][i]["image"] + '" alt="' + data["team-members"][i]["name"] + '" width="96" height="96">';
        html += '<h3 class="mb-0 mt-2">' + data["team-members"][i]["name"] + '</h3>';
        html += '<h4><small class="text-muted text-uppercase">' + data["team-members"][i]["job"] + '</small></h4>'
        html += '</div>';
    }
    document.getElementById("team-members").innerHTML = html;
});
