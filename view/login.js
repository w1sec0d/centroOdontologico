window.onload = function (){                            //Cuando el documento carga se ejecuta el código
    var loginForm = document.getElementById("login-form");
    var loginIcon = document.getElementById("login-icon");
    var position = loginForm.getBoundingClientRect();
    console.log(position);
    console.log(typeof(position.x));

    loginIcon.style.top = (position.height-140) + "px";

    loginIcon.style.display = "block";

}
