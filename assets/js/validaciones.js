
const validarNumero=(valor)=> {
    !isNaN(valor)  ? OK = true : OK = false;
    return OK;
}

const validarTexto = (val) => {
    const usernameRegex = /^[A-Za-z\s]*$/;
    return !usernameRegex.test(val);
}

var isDate = function(date) {
    return (new Date(date) !== "Invalid Date") && !isNaN(new Date(date));
}