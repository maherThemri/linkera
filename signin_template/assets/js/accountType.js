var base_url="https://app.linkera.com/platform/";
// Save accountType
$(document).on("click", "#add", function (e) {
	e.preventDefault();
	var type_user = $("#type_user").val();
	var fk_status_id = $("#fk_status_id").val();
	if (type_user =="error"||fk_status_id=="error") {
		toastr["error"](data.message);
	} else {
		$.ajax({
			url: base_url+"Account_type/insertType",
			type: "post",
			dataType: "json",
			data: {
				type_user: type_user,
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
					var node = $('#accounts_type_table').DataTable()
						.row.add([
							data.post["type_id"],
							data.post["type_user"],
							`<span class="status-pill smaller ${status_color}"></span><span>${data.post["status_name"]}</span>`,
							`<a href="#" class="edit_category"value="${data.post["type_id"]}"><i class="os-icon os-icon-ui-49"></i></a>`
						])
						.draw().node();
					$(node).find('td').eq(3).addClass('row-actions text-left');
					$("#addAccountType").modal("hide");
					toastr["success"](data.message);
				} else {
					toastr["error"](data.message);
				}
			},
		});
		$("#add_form")[0].reset();
	}
});

// Delete type
// $(document).on("click", "#del", function (e) {
// 	e.preventDefault();
// 	var del_id = $(this).attr("value");
// 	if (del_id == "") {
// 		alert("Supprimer l'id requis");
// 	} else {
// 		const swalWithBootstrapButtons = Swal.mixin({
// 			customClass: {
// 				confirmButton: 'btn btn-success',
// 				cancelButton: 'btn btn-danger mr-2'
// 			},
// 			buttonsStyling: false
// 		})

// 		swalWithBootstrapButtons.fire({
// 			title: 'Êtes-vous sûr?',
// 			text: "Vous ne pourrez pas revenir en arrière !",
// 			icon: 'Avertissement',
// 			showCancelButton: true,
// 			confirmButtonText: 'Oui, Supprimez-le!',
// 			cancelButtonText: 'Non, Annulez !',
// 			reverseButtons: true
// 		}).then((result) => {
// 			if (result.value) {
// 				$.ajax({
// 					url: "http://localhost/linkera/Account_type/deleteType",
// 					type: "post",
// 					dataType: "json",
// 					data: {
// 						del_id: del_id
// 					},
// 					success: function (data) {
// 						fetch();
// 						if (data.response == "success") {
// 							swalWithBootstrapButtons.fire(
// 								'Supprimé!',
// 								'Votre fichier a été supprimé.',
// 								'success'
// 							)
// 						}
// 					}
// 				});



// 			} else if (
// 				/* Read more about handling dismissals below */
// 				result.dismiss === Swal.DismissReason.cancel
// 			) {
// 				swalWithBootstrapButtons.fire(
// 					'Annulé',
// 					'Votre fichier imaginaire est en sécurité :)',
// 					'error'
// 				)
// 			}
// 		})
// 	}
// });
// edit type
$(document).on("click", ".edit_type", function (e) {
	e.preventDefault();
	var edit_id = $(this).attr("value");
	if (edit_id == "") {
		alert("Modifier l'identifiant requis");
	} else {
		$.ajax({
			url: base_url+"Account_type/editType",
			type: "post",
			dataType: "json",
			data: {
				edit_id: edit_id
			},
			success: function (data) {
				if (data.response == "success") {
					$("#editModal").modal("show");
					$("#edit_modal_id").val(data.post.type_id);
					$("#edit_type_user").val(data.post.type_user);
					$("#edit_fk_status_id").val(data.post.fk_status_id).trigger("change");
				} else {
					toastr["error"](data.message);
				}
			}
		});
	}
});
$(document).on("click", "#update", function (e) {
	e.preventDefault();
	var edit_id = $("#edit_modal_id").val();
	var edit_type_user = $("#edit_type_user").val();
	var edit_fk_status_id = $("#edit_fk_status_id").val();
	if(edit_type_user=="error"||edit_fk_status_id=="error"){
		toastr["error"](data.message);
	}else{
		$.ajax({
			url:base_url+"Account_type/updateType",
			type: "post",
			dataType: "json",
			data:{
				edit_id:edit_id,
				edit_type_user:edit_type_user,
				edit_fk_status_id: edit_fk_status_id
			},
			success: function(data){
				if(data.response=="success"){
					var status_color = "";
					if (data.post["status_value"] == 1) {
						status_color = 'green';
					} else {
						status_color = 'red';
					}
					var elem = $("a[value=" + data.post.type_id + "]")[0];
					var parent = elem.closest('tr');
					var first_elem = parent.querySelectorAll('td')[1];
					var sec_elem = parent.querySelectorAll('td')[2];
					$(first_elem).html(data.post.type_user);
					$(sec_elem).html(`<span class="status-pill smaller ${status_color}"></span><span>${data.post["status_name"]}</span>`);

					$('#editModal').modal('hide');
					toastr["success"](data.message);
				}else{
					toastr["error"](data.message);
				}
			}
		});
	}
});

$(document).ready(function () {
	$('#accounts_type_table').DataTable({
		"language":{"url":base_url+"template/assets/datatables.json"},
		"order": [[0, "asc" ]]
});
});
