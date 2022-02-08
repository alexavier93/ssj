getGaleria()
getPlantas();
getStatus();


/*
 *
 * GALERIA
 *
 */

// Buscando as Imagens do imóvel
function getGaleria() {
    var imovel_id = $('#imovel_id').val()
    var url = $('#getGaleria').val()

    $.ajax({
        url: url,
        method: 'POST',
        data: {
            imovel_id: imovel_id
        },
        dataType: 'json',
        success: function(data) {
            $('#galeria').html(data)
        }
    })

    return false
}

// Upload Galeria
$(document).on('click', '#uploadGaleria', function() {
    if ($('#images').val() != '') {
        let formData = new FormData()

        let url = $('#urlUploadGaleria').val()

        let imovel_id = $('#imovel_id').val()
        let TotalFiles = $('#images')[0].files.length //Total files
        let files = $('#images')[0]

        for (let i = 0; i < TotalFiles; i++) {
            formData.append('images' + i, files.files[i])
        }

        formData.append('TotalFiles', TotalFiles)
        formData.append('imovel_id', imovel_id)

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function() {
                $('#galeria').html(
                    '<h5 class="text-center my-4 w-100">Carregando...</h5>'
                )
            },
            success: function(response) {
                getGaleria()

                setTimeout(function() {
                    $('.alert').html(response.success)
                    $('.alert')
                        .addClass('alert-success')
                        .fadeIn('slow')
                }, 200)

                setTimeout(function() {
                    $('.alert').hide(400)
                    $('.alert').removeClass('alert-success')
                }, 2000)
            },
            error: function(response) {
                setTimeout(function() {
                    $('.alert').html(response.erro)
                    $('.alert')
                        .addClass('alert-danger')
                        .fadeOut('slow')
                }, 200)

                setTimeout(function() {
                    $('.alert').hide(400)
                    $('.alert').removeClass('alert-danger')
                }, 2000)
            }
        })
    } else {
        $('.alert').html('Por favor, selecione uma imagem!')
        $('.alert')
            .addClass('alert-warning')
            .fadeIn('slow')

        setTimeout(function() {
            $('.alert').hide(400)
            $('.alert').removeClass('alert-warning')
        }, 2000)
    }
})

// Excluindo Imagens
$(document).on('click', '.delete_image', function() {
    var id = $(this).data('id')
    var url = $(this).data('url')

    $('.delete').attr('data-id', id)
    $('.delete').attr('data-url', url)

    $('.delete').addClass('deleteImage')
    $('.deleteImage').removeClass('delete')
})

$(document).on('click', '.deleteImage', function() {
    var id = $(this).data('id')
    var url = $(this).data('url')

    $.ajax({
        url: url,
        method: 'POST',
        data: {
            id: id
        },
        dataType: 'json',
        cache: false,
        success: function(response) {
            $('#modalDelete').modal('toggle')

            $('.deleteImage').addClass('delete')
            $('.deleteImage').removeData('id')
            $('.delete').removeClass('deleteImage')

            getGaleria()

            setTimeout(function() {
                $('.alert').html(response.success)
                $('.alert')
                    .addClass('alert-success')
                    .fadeIn('slow')
            }, 200)

            setTimeout(function() {
                $('.alert').hide(400)
                $('.alert').removeClass('alert-success')
            }, 2000)
        },
        error: function(response) {
            setTimeout(function() {
                $('.alert').html(response.erro)
                $('.alert')
                    .addClass('alert-danger')
                    .fadeOut('slow')
            }, 200)

            setTimeout(function() {
                $('.alert').hide(400)
                $('.alert').removeClass('alert-danger')
            }, 2000)
        }
    })
})




/*
 *
 * PLANTAS
 *
 */


// Buscando as Imagens do imóvel
function getPlantas() {
    var imovel_id = $('#imovel_id').val()
    var url = $('#getPlantas').val()

    $.ajax({
        url: url,
        method: 'POST',
        data: {
            imovel_id: imovel_id
        },
        dataType: 'json',
        success: function(data) {
            $('#galeriaPlantas').html(data)
        }
    })

    return false
}

// Upload Planta
$(document).on('click', '#uploadPlanta', function() {
    if ($('#imagesPlanta').val() != '') {
        let formData = new FormData()

        let url = $('#urlUploadPlanta').val()

        let imovel_id = $('#imovel_id').val()
        let TotalFiles = $('#plantas')[0].files.length //Total files
        let files = $('#plantas')[0]

        for (let i = 0; i < TotalFiles; i++) {
            formData.append('images' + i, files.files[i])
        }

        formData.append('TotalFiles', TotalFiles)
        formData.append('imovel_id', imovel_id)

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function() {
                $('#galeria').html(
                    '<h5 class="text-center my-4 w-100">Carregando...</h5>'
                )
            },
            success: function(response) {
                getPlantas()

                setTimeout(function() {
                    $('.alert').html(response.success)
                    $('.alert')
                        .addClass('alert-success')
                        .fadeIn('slow')
                }, 200)

                setTimeout(function() {
                    $('.alert').hide(400)
                    $('.alert').removeClass('alert-success')
                }, 2000)
            },
            error: function(response) {
                setTimeout(function() {
                    $('.alert').html(response.erro)
                    $('.alert')
                        .addClass('alert-danger')
                        .fadeOut('slow')
                }, 200)

                setTimeout(function() {
                    $('.alert').hide(400)
                    $('.alert').removeClass('alert-danger')
                }, 2000)
            }
        })
    } else {
        $('.alert').html('Por favor, selecione uma imagem!')
        $('.alert')
            .addClass('alert-warning')
            .fadeIn('slow')

        setTimeout(function() {
            $('.alert').hide(400)
            $('.alert').removeClass('alert-warning')
        }, 2000)
    }
})

// Excluindo Imagens
$(document).on('click', '.delete_planta', function() {
    var id = $(this).data('id')
    var url = $(this).data('url')

    $('.delete').attr('data-id', id)
    $('.delete').attr('data-url', url)

    $('.delete').addClass('deletePlanta')
    $('.deletePlanta').removeClass('delete')
})

$(document).on('click', '.deletePlanta', function() {
    var id = $(this).data('id')
    var url = $(this).data('url')

    $.ajax({
        url: url,
        method: 'POST',
        data: {
            id: id
        },
        dataType: 'json',
        cache: false,
        success: function(response) {
            $('#modalDelete').modal('toggle')

            $('.deletePlanta').addClass('delete')
            $('.deletePlanta').removeData('id')
            $('.delete').removeClass('deletePlanta')

            getPlantas()

            setTimeout(function() {
                $('.alert').html(response.success)
                $('.alert')
                    .addClass('alert-success')
                    .fadeIn('slow')
            }, 200)

            setTimeout(function() {
                $('.alert').hide(400)
                $('.alert').removeClass('alert-success')
            }, 2000)
        },
        error: function(response) {
            setTimeout(function() {
                $('.alert').html(response.erro)
                $('.alert')
                    .addClass('alert-danger')
                    .fadeOut('slow')
            }, 200)

            setTimeout(function() {
                $('.alert').hide(400)
                $('.alert').removeClass('alert-danger')
            }, 2000)
        }
    })
})



/*
 **
 ** STATUS
 **
 */

// Buscando as Status do imóvel
function getStatus() {

    let imovel_id = $("#imovel_id").val();
    let url = $('#getStatus').val();

    $.ajax({
        url: url,
        method: "POST",
        data: {
            imovel_id: imovel_id
        },
        dataType: "json",
        success: function(data) {
            $('#statusImovel').html(data);
        }
    });

    return false;
};

// Insert Status
$(document).on('click', '#createStatus', function() {

    let imovel_id = $("#imovel_id").val();
    let status_id = $("#status_id").val();
    let porcentagem = $("#porcentagem").val();
    let url = $('#urlCreateStatus').val()

    $.ajax({
        method: 'POST',
        url: url,
        data: {
            imovel_id: imovel_id,
            status_id: status_id,
            porcentagem: porcentagem,
        },
        dataType: 'json',
        success: function(response) {

            getStatus();

            setTimeout(function() {
                $('.alert').html(response.success);
                $('.alert').addClass('alert-success').fadeIn("slow");
            }, 200);

            setTimeout(function() {
                $('.alert').hide(400);
            }, 2000);

        },
        error: function(response) {
            setTimeout(function() {
                $('.alert').html(response.erro);
                $('.alert').addClass('alert-danger').fadeOut("slow");
            }, 200);

            setTimeout(function() {
                $('.alert').hide(400);
            }, 2000);
        }
    });

});

// Excluindo Status
$(document).on('click', '.delete_status', function() {

    let id = $(this).data('id')
    let url = $(this).data('url')

    $('.delete').attr('data-id', id)
    $('.delete').attr('data-url', url)

    $('.delete').addClass('deleteStatus')
    $('.deleteStatus').removeClass('delete')
});

$(document).on('click', '.deleteStatus', function() {

    let id = $(this).data('id');
    let url = $(this).data('url')

    $.ajax({
        url: url,
        method: "POST",
        data: {
            id: id
        },
        dataType: "json",
        cache: false,
        success: function(response) {
            $('#modalDelete').modal('toggle');
            $('.deleteStatus').addClass('delete');
            $('.deleteStatus').removeData('id');
            $('.delete').removeClass('deleteStatus');

            getStatus();

            setTimeout(function() {
                $('.alert').html(response.success);
                $('.alert').addClass('alert-success').fadeIn("slow");
            }, 200);

            setTimeout(function() {
                $('.alert').hide(400);
            }, 2000);

        },
        error: function(response) {

            setTimeout(function() {
                $('.alert').html(response.erro);
                $('.alert').addClass('alert-danger').fadeOut("slow");
            }, 200);

            setTimeout(function() {
                $('.alert').hide(400);
            }, 2000);

        }
    });

});

// Requerendo dados do Status
$('#modalEditStatus').on('show.bs.modal', function(e) {

    let id = e.relatedTarget.id;
    let url = $('#getStatusEdit').val()

    $.ajax({
        cache: false,
        type: 'POST',
        url: url,
        data: 'id=' + id,
        dataType: 'json',
        success: function($data) {
            $('#porcentagem_edit').val($data.porcentagem)
            $('#id_edit').val($data.id);;
        }

    });

});

//Função para Editar Status
$('#formEditStauts').submit(function() {

    var dados = $(this).serialize();
    let url = $('#urlUpdateStatus').val()

    $.ajax({
        type: "POST",
        url: url,
        data: dados,
        dataType: 'json',
        success: function(response) {
            getStatus();
            $('#modalEditStatus').modal('hide');

            setTimeout(function() {
                $('.alert').html(response.success);
                $('.alert').addClass('alert-success').fadeIn("slow");
            }, 200);
            setTimeout(function() {
                $('.alert').hide(400);
            }, 2000);
        },
        error: function(response) {
            setTimeout(function() {
                $('.alert').html(response.erro);
                $('.alert').addClass('alert-danger').fadeOut("slow");
            }, 200);
            setTimeout(function() {
                $('.alert').hide(400);
            }, 2000);
        }
    });

    return false;

});