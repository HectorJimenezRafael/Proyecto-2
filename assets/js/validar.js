function validar() {


    var error = false;
    // nombre
    var Nombre = document.getElementById("Nombre").value;
    var error_nombre = document.getElementById("error_nombre");
    error_nombre = document.getElementById("error_nombre").style.display = "none";


    // apellido

    var Apellido = document.getElementById("Apellido").value;
    var error_apellido = document.getElementById("error_apellido");
    error_apellido = document.getElementById("error_apellido").style.display = "none";



    // correo

    var Correo = document.getElementById("Correo").value;
    var error_correo = document.getElementById("error_correo");
    error_correo = document.getElementById("error_correo").style.display = "none";

    // telefono

    var Phone = document.getElementById("Phone").value;
    var error_phone = document.getElementById("error_phone");
    error_phone = document.getElementById("error_phone").style.display = "none";


    // telefono

    var fecha = document.getElementById("fecha").value;
    var error_fecha = document.getElementById("error_fecha");
    error_fecha = document.getElementById("error_fecha").style.display = "none";


    // --------------------------------------------------------------------------------

    if (Nombre == null || Nombre.length == 0 || /^\s+$/.test(Nombre)) {
        error_nombre = document.getElementById("error_nombre").style.display = "block";
        error = true;


    }

    if (Apellido == null || Apellido.length == 0 || /^\s+$/.test(Apellido)) {
        error_apellido = document.getElementById("error_apellido").style.display = "block";
        error = true;
    }

    if (Correo == null || Correo.length == 0 || /^\s+$/.test(Correo)) {
        error_correo = document.getElementById("error_correo").style.display = "block";
        error = true;
    }




    if (Phone == null || Phone.length == 0 || /^\s+$/.test(Phone)) {
        error_phone = document.getElementById("error_phone").style.display = "block";
        error = true;
    }

    if (!(/^\d{9}$/.test(Phone))) {
        error_phone = document.getElementById("error_phone").style.display = "block";
        error = true;
    }

    if (fecha == null || fecha.length == 0) {
        error_fecha = document.getElementById("error_fecha").style.display = "block";
        error = true;
    }


    if (error == false) {
        return true;
    } else {
        return false;
    }
}