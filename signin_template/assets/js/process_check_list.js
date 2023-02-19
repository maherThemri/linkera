var base_url = "https://app.linkera.com/platform/";
// ************* add process check *************
$(document).on("click", "#add_process_check", function (e) {
	e.preventDefault();
	var fk_process_id = $("#fk_process_id").val();
	var process_check_list_value = $("#process_check_list_value").val();
	var fk_status_id = 1;
	if (fk_process_id == "error" || process_check_list_value == "error") {
		toastr["error"](data.message);
	} else {
		$.ajax({
			url: base_url + "Process_check_list/insertProcessCheckList",
			type: "post",
			dataType: "json",
			data: {
				fk_process_id: fk_process_id,
				process_check_list_value: process_check_list_value,
				fk_status_id: fk_status_id,
			},
			success: function (data) {
				if (data.response == "success") {
					var status_color = "";
					if (data.post["status_value"] == 1) {
						status_color = 'green';
					} else {
						status_color = 'red';
					}
					var node = $('#process_check_list_table').DataTable()
						.row.add([
							data.post["process_check_list_id"],
							data.post["process_name"],
							data.post["process_check_list_value"],
							`<span class="status-pill smaller ${status_color}"></span><span>${data.post["status_name"]}</span>`,
							`<div class="btn-group mr-1 mb-1">
							<button aria-expanded="false" aria-haspopup="true" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton3" type="button">Option</button>
							<div aria-labelledby="dropdownMenuButton3" class="dropdown-menu">
							  <a class="dropdown-item edit_process_check_list"value="${data.post['process_check_list_id']}" href="#">Modifier</a>
							  <button type="button" class="dropdown-item update-status" data-id="${data.post['process_check_list_id']}" data-status="${data.post['fk_status_id']}">
							  ${(data.post['fk_status_id'] == 1) ? 'Désactiver' : 'Activer'}  
							</div>
						  </div>`
						])
						.draw().node();
					$('#add_form')[0].reset();
					toastr["success"](data.message);
					$('#fk_process_id_error').html('');
					$('#process_check_list_value_error').html('');
				} else {
					toastr["error"](data.message);
					if (data.fk_process_id_error != '') {
						$('#fk_process_id_error').html(data.fk_process_id_error);
					}
					else {
						$('#fk_process_id_error').html('');
					}
					if (data.process_check_list_value_error != '') {
						$('#process_check_list_value_error').html(data.process_check_list_value_error);
					}
					else {
						$('#process_check_list_value_error').html('');
					}
				}
			},
		});
		$("#add_form")[0].reset();
	}
});
// ***************** edit process check-list**************
$(document).on("click", ".edit_process_check_list", function (e) {
	e.preventDefault();
	var edit_id = $(this).attr("value");
	if (edit_id == "") {
		alert("Modifier l'identifiant requis");
	} else {
		$.ajax({
			url: base_url + "Process_check_list/editProcessCheckList",
			type: "post",
			dataType: "json",
			data: {
				edit_id: edit_id
			},
			success: function (data) {
				if (data.response == "success") {
					$("#editModal").modal("show");
					$("#edit_modal_id").val(data.post.process_check_list_id);
					$("#edit_fk_process_id").val(data.post.fk_process_id);
					$("#edit_process_check_list_value").val(data.post.process_check_list_value);
					// $("#edit_fk_status_id").val(data.post.fk_status_id).trigger("change");
				} else {
					toastr["error"](data.message);
				}
			}
		});
	}
});
// ***************************End! edit process check-list****************************
// ***************************Update process check-list****************************
$(document).on("click", "#update_process_check_list", function (e) {
	e.preventDefault();
	var edit_id = $("#edit_modal_id").val();
	var edit_fk_process_id = $("#edit_fk_process_id").val();
	var edit_process_check_list_value = $("#edit_process_check_list_value").val();
	// var edit_fk_status_id = $("#edit_fk_status_id").val();
	if (edit_fk_process_id == "error" || edit_process_check_list_value == "error") {
		toastr["error"](data.message);
	} else {
		$.ajax({
			url: base_url + "Process_check_list/updateProcessCheckList",
			type: "post",
			dataType: "json",
			data: {
				edit_id: edit_id,
				edit_fk_process_id: edit_fk_process_id,
				edit_process_check_list_value: edit_process_check_list_value
				// edit_fk_status_id: edit_fk_status_id
			},
			success: function (data) {
				if (data.response == "success") {
					var status_color = "";
					if (data.post["status_value"] == 1) {
						status_color = 'green';
					} else {
						status_color = 'red';
					}
					var elem = $("a[value=" + data.post.process_check_list_id + "]")[0];
					var parent = elem.closest('tr');
					var first_elem = parent.querySelectorAll('td')[1];
					var sec_elem = parent.querySelectorAll('td')[2];
					var thr_elem = parent.querySelectorAll('td')[3];
					$(first_elem).html(data.post.process_name);
					$(sec_elem).html(data.post.process_check_list_value);
					$(thr_elem).html(`<span class="status-pill smaller ${status_color}"></span><span>${data.post["status_name"]}</span>`);
					$('#editModal').modal('hide');
					toastr["success"](data.message);

				} else {
					toastr["error"](data.message);
				}
			}
		});
	}
});
// *******************************End! Update process check-list************************
// *******************************Update status************************
$(document).on('click', '.update-status', function () {
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
			var fk_status_id = (status == 1) ? 2 : 1;
			$.ajax({
				url: base_url + "Process_check_list/updateStatus",
				type: 'post',
				dataType: 'json',
				data: {
					process_check_list_id: id,
					fk_status_id: fk_status_id
				},
				success: function (data) {
					if (data.response == 'success') {
						Swal.fire({
							title: 'Succès!',
							text: 'Opération réussie',
							icon: 'success'
						}).then(function () {
							if (status == '1') {
								btn = '<button type="button" class="dropdown-item update-status" data-id="' + id + '" data-status="2">Activer</button>'
							} else {
								btn = '<button type="button" class="dropdown-item update-status" data-id="' + id + '" data-status="1">Désactiver</button>'
							}
							current_element.replaceWith(btn);
							var status_color = "";
							if (data.post["status_value"] == 1) {
								status_color = 'green';
							} else {
								status_color = 'red';
							}
							var elem = $("a[value=" + data.post.process_check_list_id + "]")[0];
							var parent = elem.closest('tr');
							var first_elem = parent.querySelectorAll('td')[1];
							var sec_elem = parent.querySelectorAll('td')[2];
							var thr_elem = parent.querySelectorAll('td')[3];
							$(first_elem).html(data.post.process_name);
							$(sec_elem).html(data.post.process_check_list_value);
							$(thr_elem).html(`<span class="status-pill smaller ${status_color}"></span><span>${data.post["status_name"]}</span>`);
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

// *******************************End! Update status************************
$(document).ready(function () {
	let table = $('#process_check_list_table').DataTable({
		"language": { "url": base_url + "template/assets/datatables.json" },
		"order": [[0, "asc"]]
	});
});