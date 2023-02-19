var base_url="https://app.linkera.com/platform/";
// Save new attribute
$(document).on("click", "#add_attribute", function (e) {
	e.preventDefault();

	var attribute_name = $("#attribute_name").val();
	var fk_status_id = $("#fk_status_id").val();

	if (attribute_name=="error"||fk_status_id=="error") {
		toastr["error"](data.message);
	} else {
		$.ajax({
			url: base_url+"Attributes/insertAttribute",
			type: "post",
			dataType: "json",
			data: {
				attribute_name: attribute_name,
                fk_status_id:fk_status_id,
			},
			success: function (data) {
				if (data.response == "success") {
					var status_color = "";
					if (data.post["status_value"] == 1) {
						status_color = 'green';
					} else {
						status_color = 'red';
					}
					var node = $('#attributes_table').DataTable()
						.row.add([
							data.post["attribute_id"],
							data.post["attribute_name"],
							`<span class="status-pill smaller ${status_color}"></span><span>${data.post["status_name"]}</span>`,
							`<a href="#" class="edit_attribute"value="${data.post["attribute_id"]}"><i class="os-icon os-icon-ui-49"></i></a>`
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
		$("#add_attribute_form")[0].reset();
	}
});
// Delete Attribute
 $(document).on("click", "#delete_attribute", function (e) {
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
 			confirmButtonText: 'Oui, Supprimez-le!',
 			cancelButtonText: 'Non, Annulez !',
 			reverseButtons: true
 		}).then((result) => {
 			if (result.value) {
 				$.ajax({
 					url: base_url+"Attributes/deleteAttribute",
 					type: "post",
 					dataType: "json",
 					data: {
 						del_id: del_id
 					},
 					success: function (data) {
						fetch_attributes();
 						if (data.response == "success") {
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
 					'Votre fichier imaginaire est en sécurité :)',
 					'error'
 				)
 			}
 		})
 	}
 });
// edit Attribute
$(document).on("click", ".edit_attribute", function (e) {
	e.preventDefault();
	var edit_id = $(this).attr("value");
	if (edit_id == "") {
		alert("Modifier l'identifiant requis");
	} else {
		$.ajax({
			url: base_url+"Attributes/editAttribute",
			type: "post",
			dataType: "json",
			data: {
				edit_id: edit_id
			},
			success: function (data) {
				if (data.response == "success") {
					console.log(data.post.fk_status_id);
					$("#editModal").modal("show");
					$("#edit_modal_id").val(data.post.attribute_id);
					$("#edit_attribute_name").val(data.post.attribute_name);
					$("#edit_fk_status_id").val(data.post.fk_status_id).trigger("change");
				} else {
					toastr["error"](data.message);
				}
			}
		});
	}
});
// update attribute
$(document).on("click", "#update_attribute", function (e) {
	e.preventDefault();
	var edit_id = $("#edit_modal_id").val();
	var edit_attribute_name = $("#edit_attribute_name").val();
	var edit_fk_status_id = $("#edit_fk_status_id").val();
	if(edit_attribute_name=="error"||edit_fk_status_id=="error"){
		toastr["error"](data.message);
	}else{
		$.ajax({
			url:base_url+"Attributes/updateAttribute",
			type: "post",
			dataType: "json",
			data:{
				edit_id:edit_id,
				edit_attribute_name:edit_attribute_name,
				edit_fk_status_id:edit_fk_status_id
			},
			success: function(data){
				if(data.response=="success"){
					var status_color = "";
					if (data.post["status_value"] == 1) {
						status_color = 'green';
					} else {
						status_color = 'red';
					}
					var elem = $("a[value=" + data.post.attribute_id + "]")[0];
					var parent = elem.closest('tr');
					var first_elem = parent.querySelectorAll('td')[1];
					var sec_elem = parent.querySelectorAll('td')[2];
					$(first_elem).html(data.post.attribute_name);
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
	$('#attributes_table').DataTable({
		"language":{"url":base_url+"template/assets/datatables.json"},
		"order": [[0, "asc" ]]
});
});


