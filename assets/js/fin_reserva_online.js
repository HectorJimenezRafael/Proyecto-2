window.onload = function() {
    function fin_reserva_online() {

        console.log("dentro2");
        var ajax = new XMLHttpRequest();
        ajax.open('POST', '../online/fin_reserva_online.php');
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

    fin_reserva_online('');

    setInterval(function() {
        fin_reserva_online()

    }, 1000);

}