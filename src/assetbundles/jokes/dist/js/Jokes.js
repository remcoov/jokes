/**
 * Jokes plugin for Craft CMS 3.x
 *
 * Who doesn't love a good joke?!
 *
 * @link      https://github.com/remcoov
 * @copyright Copyright (c) 2020 remcoov
 */

let audio = new Audio('https://bigsoundbank.com/UPLOAD/ogg/0475.ogg');
document.getElementById('jokes__icon').addEventListener('click', function (e) {
    audio.play();
    this.classList.add('lulz');
});

audio.addEventListener("ended", function () {
    audio.currentTime = 0;
    document.getElementById('jokes__icon').classList.remove('lulz');
});

document.getElementById('jokes__anotherjoke').addEventListener('click', function (e) {

    var data = {};
    data[csrfTokenName] = csrfTokenValue;

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'actions/jokes/widget/get-another-joke');
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onload = function () {
        if (xhr.status === 200) {
            let joke = JSON.parse(xhr.responseText);

            if (joke['type'] != 'http-error') {
                if (joke['type'] == 'twopart') {
                    document.getElementById("jokes__js").innerHTML = "<b>" + joke['setup'] + "</b><br><br>" + joke['delivery'];
                } else {
                    document.getElementById("jokes__js").innerHTML = joke['joke'];
                }
            } else {
                document.getElementById("jokes__js").innerHTML = "Here's a joke: this widget is not working due to a HTTP error.";
            }
        }
    };
    xhr.send(JSON.stringify(data));

});