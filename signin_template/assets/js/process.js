var base_url="https://app.linkera.com/platform/";
// ********Save process********
$(document).ready(function () {

    $('#process_form').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: base_url+"process/addProcess",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () {
                $('#contact').attr('disabled', 'disabled');
                $('#success_message').addClass("hide");
                $('#error_message').addClass("hide");
                $('#progress').removeClass("hide");
            },
            success: function (data) {

                if (data.error) {
                    if (data.error_message != '') {
                        $('#error_message').html(data.error_message);
                    }
                    else {
                        $('#error_message').html('');
                    }

                    if (data.process_name_error != '') {
                        $('#process_name_error').html(data.process_name_error);
                    }
                    else {
                        $('#process_name_error').html('');
                    }
                    if (data.fk_status_id_error != '') {
                        $('#fk_status_id_error').html(data.fk_status_id_error);
                    }
                    else {
                        $('#fk_status_id_error').html('');
                    }
                    $('#error_message').removeClass("hide");
                }
                if (data.success) {
                    $('#success_message').html(data.success);
                    $('#process_name_error').html('');
                    $('#fk_status_id_error').html('');
                    $('#process_form')[0].reset();
                    $('#success_message').removeClass("hide");

                }

            },
            complete: function (data) {
                $('#progress').addClass("hide");
                $('#contact').attr('disabled', false);
            }
        })
    });

});
// ***********Edit Process*********
$(document).ready(function () {

    $('#edit_process_form').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: base_url+"process/updateProcess",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () {
                $('#contact').attr('disabled', 'disabled');
                $('#success_message').addClass("hide");
                $('#error_message').addClass("hide");
                $('#progress').removeClass("hide");
            },
            success: function (data) {

                if (data.error) {
                    if (data.error_message != '') {
                        $('#error_message').html(data.error_message);
                    }
                    else {
                        $('#error_message').html('');
                    }
                    if (data.process_name_error != '') {
                        $('#process_name_error').html(data.process_name_error);
                    }
                    else {
                        $('#process_name_error').html('');
                    }
                    if (data.fk_status_id_error != '') {
                        $('#fk_status_id_error').html(data.fk_status_id_error);
                    }
                    else {
                        $('#fk_status_id_error').html('');
                    }
                    $('#error_message').removeClass("hide");
                }
                if (data.success) {
                    $('#success_message').html(data.success);
                    $('#process_name_error').html('');
                    $('#fk_status_id_error').html('');
                    $('#success_message').removeClass("hide");
                }

            },
            complete: function (data) {
                $('#progress').addClass("hide");
                $('#contact').attr('disabled', false);
            }
        })
    });
});
// ********Delete Process********
// $(document).on("click", "#delete_process", function (e) {
//     e.preventDefault();
//     var del_id = $(this).attr("value");
//     console.log('here', del_id);
//     if (del_id == "") {
//         alert("Supprimer l'id requis");
//     } else {
//         const swalWithBootstrapButtons = Swal.mixin({
//             customClass: {
//                 confirmButton: 'btn btn-success',
//                 cancelButton: 'btn btn-danger mr-2'
//             },
//             buttonsStyling: false
//         })
//         swalWithBootstrapButtons.fire({
//             title: 'Êtes-vous sûr?',
//             text: "Vous ne pourrez pas revenir en arrière !",
//             icon: 'Avertissement',
//             showCancelButton: true,
//             confirmButtonText: 'Oui, Supprimez-le!',
//             cancelButtonText: 'Non, Annulez !',
//             reverseButtons: true
//         }).then((result) => {
//             if (result.value) {
//                 $.ajax({
//                     url: "http://localhost/linkera/Process/deleteProcess",
//                     type: "post",
//                     dataType: "json",
//                     data: {
//                         del_id: del_id
//                     },
//                     success: function (data) {
//                         location.reload();
//                         if (data.responce == "success") {
//                             swalWithBootstrapButtons.fire(
//                                 'Supprimé!',
//                                 'Votre fichier a été supprimé.',
//                                 'succès'
//                             )
//                         }
//                     }
//                 });
//             } else if (
//                 /* Read more about handling dismissals below */
//                 result.dismiss === Swal.DismissReason.cancel
//             ) {
//                 swalWithBootstrapButtons.fire(
//                     'Annulé',
//                     'Votre fichier imaginaire est en sécurité :)',
//                     'Erreur'
//                 )
//             }
//         })
//     }
// });
$(document).ready(function () {
	let table = $('#process_table').DataTable({
		"language": { "url": base_url+"template/assets/datatables.json" },
        "order": [[ 3, "desc" ]]
	});
});