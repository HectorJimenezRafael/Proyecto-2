function validar_inicio() {


    var validacion = true;

    var nombre = document.getElementById("usuario_nombre");
    nombre.style.borderColor = "white"
    valor_nombre = nombre.value;

    var error_nombre = document.getElementById("error_nombre");
    error_nombre.style.display = "none";

    if (valor_nombre == null || valor_nombre.length == 0 || /^\s+$/.test(valor_nombre)) {
        // alert('Debes de introducir el campo del email');

        error_nombre.style.display = "block";
        validacion = false;


    } else {
        error_nombre.style.display = "none";

    }



    var contra = document.getElementById("contra_usu");
    contra.style.borderColor = "white"
    valor_contra = contra.value;

    var error_contra = document.getElementById("error_contra");
    error_contra.style.display = "none";

    if (valor_contra == null || valor_contra.length == 0 || /^\s+$/.test(valor_contra)) {
        // alert('Debes de introducir el campo del email');

        error_contra.style.display = "block";
        validacion = false;



    } else {

        error_contra.style.display = "none";
    }





    if (!validacion) {
        return false;

    }
}