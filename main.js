function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return "";
}

function checkUserCookie() {
    var userCookie = getCookie("user");
    var rowEl = document.querySelector(".row");
    var greetEl = document.querySelector("#greeting");
    if (userCookie !== "") {
        rowEl.style.display = "none";
        greetEl.innerHTML= "Привет, " + userCookie + ". Чтобы выйти нажмите <a href= 'exit.php'>здесь</a>"
        greetEl.style.display = "block";
    } else {
        rowEl.style.display = "block";
        greetEl.style.display = "none";
    }
}

document.addEventListener("DOMContentLoaded", checkUserCookie);