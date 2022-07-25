function deleteItem(event, route, element = 'tr') {
    event.preventDefault();
    swal({
        title: "Are you sure about this?",
        text: "By doing this, this item will be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.post(route, {_method: "delete", _token: $('meta[name="_token"]').attr('content')})
            .done(function (response) {
                event.target.closest(element).remove();
                $.toast({
                    heading: 'Successful operation',
                    text: 'mission accomplished',
                    showHideTransition: 'slide',
                    icon: 'success'
                })
            })
            .fail(function (response) {
                $.toast({
                    heading: 'Operation failed',
                    text: 'mission accomplished',
                    showHideTransition: 'slide',
                    icon: 'error'
                })
            })
        }
    });
}
