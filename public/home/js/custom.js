function showConfirmMessage(title, url, text = null, icon = 'success', dangerMode = false) {
    swal({
        title: title,
        text: text,
        icon: icon,
        buttons: true,
        dangerMode: dangerMode,
    }).then((willDelete) => {
        if (willDelete) {
            window.location.href = url;
        }
    });
}
