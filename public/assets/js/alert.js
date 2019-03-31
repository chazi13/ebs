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
            if (r.redirect == 'reload') {
                window.location.reload();
            } else {
                window.location = r.redirect;
            }
        }
    });
};

let ajax = function (url) {
    $.ajax({
        url: url,
        method: 'GET',
        success: function (result) {
            console.log(result);
            alertResponse(result);
        }
    });
};

let alertConfirm = function(url, condition) {
    swal({
        title: 'Konfirmasi',
        text: 'Yakin ' + condition + ' Item?',
        icon: 'info',
        buttons: {
            confirm: {
                text: 'Ya, ' + condition + ' Item',
                className: 'text-center btn btn-primary'
            }, 
            cancel: {
                visible: true,
                text: 'Tidak',
                className: 'btn btn-danger'
            }
        },
    }).then((Delete) => {
        if (Delete) {
            ajax(url);
        } else {
            swal.close();
        }
    });
};
