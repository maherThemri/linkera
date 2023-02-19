var base_url = "https://app.linkera.com/platform/";
//  ***********************Create Post**********
$(document).ready(function () {
  Dropzone.autodiscover = true;
  $('#mydropzone').dropzone({
    autoProcessQueue: false,
    method: "post",
    maxFiles: 1,
    maxFilesize: 2,
    addRemoveLinks: true,
    acceptedFiles: "image/*",
    success: function (file, response) {
      var res = JSON.parse(response);
      if (res.status == 'success') {
        toastr.success('Image téléchargé avec succès');
        Dropzone.forElement('#mydropzone').removeAllFiles(true);
      } else {
        toastr.error("Annonce réussite Mais Échec du téléchargement de l'image");
      }
    },
    error: function (file, response) {
      toastr.error("Échec du téléchargement de l'image");
    }
  });

  // Handle main form submission
  $("#add_post_form").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: base_url + "posts/addPost",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        var res = JSON.parse(response);
        console.log(res);
        if (res.status == 'success') {
          toastr.success('Opération réussie');
          // Process the files in the dropzone queue
          var dz = Dropzone.forElement("#mydropzone");
          dz.options.url = base_url + 'posts/FileUpload?post_id=' + res.post_id;
          dz.processQueue();
          $('#add_post_form')[0].reset();
          $('#post_name_error').html('');
          $('#post_type_error').html('');
          $('#fk_status_id_error').html('');
          $('#post_description_error').html('');
          $('#fk_categorie_id_error').html('');
          $('#fk_sector_id_error').html('');
          $('#fk_attribute_value_id_error').html('');
          $('#post_price_error').html('');
          $('#fk_monetisation_id_error').html('');
        } else {
          toastr.error('Opération a échoué');
          if (res.post_name_error != '') {
            $('#post_name_error').html(res.post_name_error);
          }
          else {
            $('#post_name_error').html('');
          }
          if (res.post_type_error != '') {
            $('#post_type_error').html(res.post_type_error);
          }
          else {
            $('#post_type_error').html('');
          }
          if (res.fk_status_id_error != '') {
            $('#fk_status_id_error').html(res.fk_status_id_error);
          }
          else {
            $('#fk_status_id_error').html('');
          }
          if (res.post_description_error != '') {
            $('#post_description_error').html(res.post_description_error);
          }
          else {
            $('#post_description_error').html('');
          }
          if (res.fk_categorie_id_error != '') {
            $('#fk_categorie_id_error').html(res.fk_categorie_id_error);
          }
          else {
            $('#fk_categorie_id_error').html('');
          }
          if (res.fk_sector_id_error != '') {
            $('#fk_sector_id_error').html(res.fk_sector_id_error);
          }
          else {
            $('#fk_sector_id_error').html('');
          }
          if (res.fk_attribute_value_id_error != '') {
            $('#fk_attribute_value_id_error').html(res.fk_attribute_value_id_error);
          }
          else {
            $('#fk_attribute_value_id_error').html('');
          }
          if (res.post_price_error != '') {
            $('#post_price_error').html(res.post_price_error);
          }
          else {
            $('#post_price_error').html('');
          }
          if (res.fk_monetisation_id_error != '') {
            $('#fk_monetisation_id_error').html(res.fk_monetisation_id_error);
          }
          else {
            $('#fk_monetisation_id_error').html('');
          }

        }
      },
      error: function (response) {
        toastr.error('Opération échoué');
      }
    });
  });
});
// **************** Edit Post***************
$(document).ready(function () {

  $('#edit_post_form').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
      url: base_url + "posts/updatePost",
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
          if (data.post_name_error != '') {
            $('#post_name_error').html(data.post_name_error);
          }
          else {
            $('#post_name_error').html('');
          }

          if (data.post_type_error != '') {
            $('#post_type_error').html(data.post_type_error);
          }
          else {
            $('#post_type_error').html('');
          }

          if (data.fk_status_id_error != '') {
            $('#fk_status_id_error').html(data.fk_status_id_error);
          }
          else {
            $('#fk_status_id_error').html('');
          }

          if (data.post_description_error != '') {
            $('#post_description_error').html(data.post_description_error);
          }
          else {
            $('#post_description_error').html('');
          }
          if (data.fk_categorie_id_error != '') {
            $('#fk_categorie_id_error').html(data.fk_categorie_id_error);
          }
          else {
            $('#fk_categorie_id_error').html('');
          }
          if (data.fk_sector_id_error != '') {
            $('#fk_sector_id_error').html(data.fk_sector_id_error);
          }
          else {
            $('#fk_sector_id_error').html('');
          }
          if (data.fk_attribute_value_id_error != '') {
            $('#fk_attribute_value_id_error').html(data.fk_attribute_value_id_error);
          }
          else {
            $('#fk_attribute_value_id_error').html('');
          }
          if (data.post_price_error != '') {
            $('#post_price_error').html(data.post_price_error);
          }
          else {
            $('#post_price_error').html('');
          }
          if (data.fk_monetisation_id_error != '') {
            $('#fk_monetisation_id_error').html(data.fk_monetisation_id_error);
          }
          else {
            $('#fk_monetisation_id_error').html('');
          }
          $('#error_message').removeClass("hide");
        }
        if (data.success) {
          //Dropzone.forElement("#mydropzone1").processQueue();
          $('#success_message').html(data.success);
          $('#post_name_error').html('');
          $('#post_type_error').html('');
          $('#fk_status_id_error').html('');
          $('#post_description_error').html('');
          $('#fk_categorie_id_error').html('');
          $('#fk_sector_id_error').html('');
          $('#fk_attribute_value_id_error').html('');
          $('#post_price_error').html('');
          $('#fk_monetisation_id_error').html('');
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
// **************** Edit image***************
$(document).ready(function () {
  Dropzone.autodiscover = true;
  $('#mydropzone1').dropzone({
    autoProcessQueue: true,
    method: "post",
    maxFiles: 1,
    maxFilesize: 2,
    addRemoveLinks: true,
    acceptedFiles: "image/*,.avif",
    success: function (file, response) {
      var res = JSON.parse(response);
      console.log(res);
      if (res.status == 'success') {
        toastr.success('Image téléchargé avec succès');
        $("#new_image").attr("src", base_url + "uploads/posts_assets/" + res.file_name);
        Dropzone.forElement('#mydropzone1').removeAllFiles(true)

      } else {
        toastr.error("Échec du téléchargement de l'image");
      }
    },
    error: function (file, response) {
      toastr.error("Échec du téléchargement de l'image");
    }
  });
});
//Delete Post
$(document).on("click", ".delete_post", function (e) {
  e.preventDefault();
  var del_id = $(this).attr("value");
  if (del_id == "") {
    alert("Supprimer l'id requis");
  } else {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger mr-2'
      },
      buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
      title: 'Êtes-vous sûr?',
      text: "Vous ne pourrez pas revenir en arrière !",
      icon: 'info',
      showCancelButton: true,
      confirmButtonText: 'Oui!',
      cancelButtonText: 'Non, Annuler !',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: base_url + "posts/deletePost",
          type: "post",
          dataType: "json",
          data: {
            del_id: del_id
          },
          success: function (data) {
            if (data.response == "success") {
              const parent = e.target.closest('tr');
              parent.remove();
              swalWithBootstrapButtons.fire(
                'Supprimé!',
                'Votre fichier a été supprimé.',
                'success'
              )
            }
          }
        });
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Annulé',
          'Votre fichier est en sécurité :)',
          'error'
        )
      }
    })
  }
});
// ****************update status*******
$('#posts_table tbody').on('click', 'button.btn-update-status', function () {
  let id = $(this).data('id');
  let status = $(this).data('status');
  var current_element = $(this);
  var btn = '';
  Swal.fire({
    title: 'Êtes-vous sûr?',
    text: "Merci pour votre confirmation !",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#228a06',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Oui!',
    cancelButtonText: 'Non, Annuler!',

  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: base_url + "posts/update_status",
        type: 'post',
        data: {
          post_id: id,
          fk_status_id: (status == 1) ? 2 : 1
        },
        success: function (response) {
          if (response == 'success') {
            Swal.fire({
              title: 'Succès!',
              text: 'Opération réussie',
              icon: 'success'
            }).then(function () {
              if (status == '1') {
                btn = `<button type='button' class='badge badge-danger-inverted btn-update-status' data-id='${id}' data-status='2'>
                Désactivé</button>`;

              } else {
                btn = `<button type='button' class='badge badge-success-inverted btn-update-status' data-id='${id}' data-status='1'>
                Activé</button>`;
              }
              current_element.replaceWith(btn);
            });
          } else {
            Swal.fire({
              title: 'Erreur!',
              text: "Opération a échoué",
              icon: 'error'
            });
          }
        }
      });
    }
  });
});

// ****************** data table server side**********
$(document).ready(function () {
  $('#posts_table').DataTable({
    //language french
    "language": { "url": base_url + "template/assets/datatables.json" },
    // Processing indicator
    "processing": true,
    // DataTables server-side processing mode
    "serverSide": true,
    // Initial no order.
    "order": [],
    // Load data from an Ajax source
    "ajax": {
      "url": base_url + "posts/getLists",
      "type": "POST",
      "data": function (d) {
        d.post_type_id = $('#filter_select').val()
      }
    },
    //Set column definition initialisation properties
    "columnDefs": [{
      "targets": 9,
      "className": "row-actions text-left",
      "orderable": false
    }]
  });

  $('#filter_select').on('change', function (e) {
    // console.log($(this).val());
    $('#posts_table').DataTable().ajax.reload()

  });
});

