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

function updateStatus(event, route, status, field = 'status', parent = 'tr', target = 'td.') {
    event.preventDefault();
    swal({
        title: "Are you sure about this?",
        text: "With this, this item will change its status!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.post(route, {_method: "PATCH", _token: $('meta[name="_token"]').attr('content')})
                .done(function (response) {
                $(event.target).closest(parent).find(target + field).text(status);
                if (status == "active")
                    $(event.target).closest(parent).find(target + field).html("<span class='text-success'>" + status + "</span>");
                else if (status == 'in progress')
                    $(event.target).closest(parent).find(target + field).html("<span class='text-warning'>" + status + "</span>");
                else
                    $(event.target).closest(parent).find(target + field).html("<span class='text-danger'>" + status + "</span>");

                $.toast({
                    heading: 'Successful operation',
                    text: response.message,
                    showHideTransition: 'slide',
                    icon: 'success'
                })
                .fail(function (response) {
                    $.toast({
                        heading: 'Operation failed',
                        text: response.message,
                        showHideTransition: 'slide',
                        icon: 'error'
                    })
                })
            })
        }
    });
}
