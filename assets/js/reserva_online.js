window.onload = function() {
    console.log("hola");


    function reserva_online() {

        console.log("dentro");
        var ajax = new XMLHttpRequest();
        ajax.open('POST', '../online/reserva_online.php');
        ajax.onload = function() {
            if (ajax.status === 200) {
                // alert(ajax.responseText)
                if (ajax.responseText == "consulta") {
                    // console.log("consulta_realizada");

                }

            }
        }
        ajax.send();
    }

    reserva_online('');

    setInterval(function() {
        reserva_online()

    }, 1000);




}