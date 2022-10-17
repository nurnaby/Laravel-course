$(document).on("click", ".open_model", function(e) {
    e.preventDefault();
    let divId = $(this).attr('selector');
    let model_title = $(this).attr('model_title');
    let model_type = $(this).attr('model_type');
    let modelUrl = $(this).attr('href');
    console.log(modelUrl);
    $.ajax({
        url: modelUrl,
        type: "GEt",
        datatype: "html",
        success: function(response) {
            bootbox.dialog({
                title: model_title,
                message: `<div id="${divId}">hello</div>`,
                size: 'large',
                buttons: {
                    close: {
                        label: "close",
                        className: 'btn-defult',
                        callback: function() {

                        }
                    },

                    success: {
                        label: model_type,
                        className: 'btn-success',
                        callback: function() {
                            $('#' + divId + ' form').submit();
                            return false;

                        }
                    }
                }
            });
            $('#' + divId).html(response);
        }
    });


});


$(document).on("click", ".blogDelete", function(e) {
    e.preventDefault();
    var delete_id = $(this).closest('tr').find('.blogDelete_val_id').val();
    

    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            $.ajax({
                type:"DELETE",

            });
            if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                });
            }
        });
});