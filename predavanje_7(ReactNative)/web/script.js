setInterval(function () {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var obj = JSON.parse(this.responseText);
            if (obj.change == 1) {
                document.getElementById("message").innerHTML = obj.message;
                document.getElementById("footer").innerHTML = obj.footer;
            }
        }
    };
    xhttp.open("GET", "getMessage.php", true);
    xhttp.send()
}, 15000);