const error = (msg) => {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        background: '#486b7c',
        color: 'white',
        text: msg,
    })
}


const confirm = (msg) => {
    Swal.fire({
        title: 'Good job!',
        text: msg,
        background: '#486b7c',
        color: 'white',
        icon: 'success'
    })

}



const confirm_incidencia = (msg) => {
    Swal.fire({
        title: 'Mesa deshabilitada!',
        text: msg,
        background: '#486b7c',
        color: 'white',
        icon: 'warning'
    })

}