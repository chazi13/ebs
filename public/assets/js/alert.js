let alertResponse = function(data) {
    let r = $.parseJSON(data);
    if (r.type == 'error') {
        r.button = 'danger'
    } else {
        r.button = r.type
    }

    swal(r.title, r.msg, {
        icon: r.type,
        buttons: {
            confirm: {
                className: 'text-center btn btn-' + r.button
            }
        },
    }).then(function () {
        if (r.redirect) {
            window.location = r.redirect;
        }
    });
}