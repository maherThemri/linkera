var base_url="https://app.linkera.com/platform/";
// Save new category
$(document).on("click", "#add_category", function (e) {
	e.preventDefault();
	var categories_name = $("#categories_name").val();
	var fk_status_categories_id = $("#fk_status_categories_id").val();
	if (categories_name == "error" || fk_status_categories_id == "error") {
		toastr["error"](data.message);
	} else {
		$.ajax({
			url: base_url+"Categories/insertCategory",
			type: "post",
			dataType: "json",
			data: {
				categories_name: categories_name,
				fk_status_categories_id: fk_status_categories_id,
			},
			success: function (data) {
				if (data.response == "success") {
					var status_color = "";
					if (data.post["status_value"] == 1) {
						status_color = 'green';
					} else {
						status_color = 'red';
					}
					var node = $('#categories_table').DataTable()
						.row.add([
							data.post["categories_id"],
							data.post["categories_name"],
							`<span class="status-pill smaller ${status_color}"></span><span>${data.post["status_name"]}</span>`,
							`<a href="#" class="edit_category"value="${data.post["categories_id"]}"><i class="os-icon os-icon-ui-49"></i></a>`
							// <a class="danger delete" href="#" id=""value="${data.post["categories_id"]}"><i class="os-icon os-icon-ui-15"></i></a>
						])
						.draw().node();
					$(node).find('td').eq(3).addClass('row-actions text-left');
					$("#addModal").modal("hide");
					toastr["success"](data.message);
				} else {
					toastr["error"](data.message);
				}
			},
		});
		$("#add_form")[0].reset();
	}
});

// Delete category
// $(document).on("click", ".delete", function (e) {
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
// 					url: "http://localhost/linkera/Categories/deleteCategory",
// 					type: "post",
// 					dataType: "json",
// 					data: {
// 						del_id: del_id
// 					},
// 					success: function (data) {

// 						if (data.responce == "success") {
// 							const parent = e.target.closest('tr');
// 							parent.remove();
// 							swalWithBootstrapButtons.fire(
// 								'Supprimé!',
// 								'Votre fichier a été supprimé.',
// 								'succès'
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
// 					'Erreur'
// 				)
// 			}
// 		})
// 	}
// });
// edit type
$(document).on("click", ".edit_category", function (e) {
	e.preventDefault();
	var edit_id = $(this).attr("value");
	if (edit_id == "") {
		alert("Modifier l'identifiant requis");
	} else {
		$.ajax({
			url: base_url+"Categories/editCategory",
			type: "post",
			dataType: "json",
			data: {
				edit_id: edit_id
			},
			success: function (data) {
				if (data.response == "success") {
					$("#editModal").modal("show");
					$("#edit_modal_id").val(data.post.categories_id);
					$("#edit_categories_name").val(data.post.categories_name);
					$("#edit_fk_status_categories_id").val(data.post.fk_status_categories_id).trigger("change");
				} else {
					toastr["error"](data.message);
				}
			}
		});
	}
});
// update categories
$(document).on("click", "#update_category", function (e) {
	e.preventDefault();
	var edit_id = $("#edit_modal_id").val();
	var edit_categories_name = $("#edit_categories_name").val();
	var edit_fk_status_categories_id = $("#edit_fk_status_categories_id").val();
	if (edit_categories_name == "error" || edit_fk_status_categories_id == "error") {
		toastr["error"](data.message);
	} else {
		$.ajax({
			url: base_url+"Categories/updateCategory",
			type: "post",
			dataType: "json",
			data: {
				edit_id: edit_id,
				edit_categories_name: edit_categories_name,
				edit_fk_status_categories_id: edit_fk_status_categories_id
			},
			success: function (data) {
				if (data.response == "success") {
					var status_color = "";
					if (data.post["status_value"] == 1) {
						status_color = 'green';
					} else {
						status_color = 'red';
					}
					var elem = $("a[value=" + data.post.categories_id + "]")[0];
					var parent = elem.closest('tr');
					var first_elem = parent.querySelectorAll('td')[1];
					var sec_elem = parent.querySelectorAll('td')[2];
					$(first_elem).html(data.post.categories_name);
					$(sec_elem).html(`<span class="status-pill smaller ${status_color}"></span><span>${data.post["status_name"]}</span>`);
					$('#editModal').modal('hide');
					toastr["success"](data.message);

				} else {
					toastr["error"](data.message);
				}
			}
		});
	}
});
$(document).ready(function () {
	let table = $('#categories_table').DataTable({
		"language": { "url": base_url+"template/assets/datatables.json" },
		"order": [[ 3, "desc" ]]
	});
});


