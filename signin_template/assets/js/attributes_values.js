var base_url="https://app.linkera.com/platform/";
// ********Save attributes values********
$("#add_attribute_value").click(function(e) {
    e.preventDefault();
    var fileInput = $("#file").get(0);
    if (!fileInput.files[0]) {
      Swal.fire({
        title: 'Êtes-vous sûr?',
        text: "Vous n'avez pas sélectionné de fichier, êtes-vous sûr de vouloir continuer?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Oui, soumettre',
        cancelButtonText: 'Annuler',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        lang: 'fr'
      }).then((result) => {
        if (result.value) {
          submitForm();
        }
      });
    } else {
      submitForm();
    }
    lang: 'fr'
  });
  function submitForm() {
    var formData = new FormData($("#attribute_value_form")[0]);
        $.ajax({
            url: base_url+"Attributes_values/addAttributeValue",
            method: "POST",
            data:formData,
            contentType: false,
            cache: false,
            processData:false,
            dataType:'json',
            beforeSend: function () {
                $('#add_attribute_value').attr('disabled', 'disabled');
                $('#success_message').addClass("hide");
                $('#warning_message').addClass("hide");
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

                    if (data.attribute_value_name_error != '') {
                        $('#attribute_value_name_error').html(data.attribute_value_name_error);
                    }
                    else {
                        $('#attribute_value_name_error').html('');
                    }
                    if (data.fk_attribute_id_error != '') {
                        $('#fk_attribute_id_error').html(data.fk_attribute_id_error);
                    }
                    else {
                        $('#fk_attribute_id_error').html('');
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
                    // Swal.fire({
                    //     icon: 'success',
                    //     title: 'Form submitted successfully!',
                    //     text: data
                    //   });
                    $('#success_message').html(data.success);
                    $('#warning_message').html(data.warning);
                    $('#attribute_value_name_error').html('');
                    $('#fk_attribute_id_error').html('');
                    $('#fk_status_id_error').html('');
                    $('#attribute_value_form')[0].reset();
                    $('#success_message').removeClass("hide");

                }

            },
            complete: function (data) {
                $('#progress').addClass("hide");
                $('#add_attribute_value').attr('disabled', false);
            }
        })
    

}
// ***********Edit Attribute value*********
$(document).ready(function () {
    $('#edit_attribute_value_form').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: base_url+"attributes_values/updateAttributeValue",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            dataType: "json",
            beforeSend: function () {
                $('#editContact').attr('disabled', 'disabled');
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

                    if (data.attribute_value_name_error != '') {
                        $('#attribute_value_name_error').html(data.attribute_value_name_error);
                    }
                    else {
                        $('#attribute_value_name_error').html('');
                    }
                    if (data.attribute_value_asset_error != '') {
                        $('#attribute_value_asset_error').html(data.attribute_value_asset_error);
                    }
                    else {
                        $('#attribute_value_asset_error').html('');
                    }
                    if (data.fk_attribute_id_error != '') {
                        $('#fk_attribute_id_error').html(data.fk_attribute_id_error);
                    }
                    else {
                        $('#fk_attribute_id_error').html('');
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
                    if(data.file_name!=""){
                        $("#new_image").attr("src", base_url+"uploads/attributes_values_assets/" + data.file_name);
                    }

                    $('#success_message').html(data.success);
                    $('#attribute_value_name_error').html('');
                    $('#attribute_value_asset_error').html('');
                    $('#fk_attribute_id_error').html('');
                    $('#fk_status_id_error').html('');
                    $('#success_message').removeClass("hide");
                }

            },
            complete: function (data) {
                $('#progress').addClass("hide");
                $('#editContact').attr('disabled', false);
            }
        })
    });
});
// ********** data table attribute value*************
$(document).ready(function () {
	$('#attribute_value_table').DataTable({
		"language":{"url":base_url+"template/assets/datatables.json"},
        "order":[3,"asc"]
});
});
