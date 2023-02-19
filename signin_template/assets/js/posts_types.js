var base_url="https://app.linkera.com/platform/";
// Save new Post type
$(document).on("click", "#add_post_type", function (e) {
	e.preventDefault();
	var post_type_name = $("#post_type_name").val();
	var fk_status_post_type_id = $("#fk_status_post_type_id").val();
	if (post_type_name == "error"|| fk_status_post_type_id == "error") {
		toastr["error"](data.message);
	} else {
		$.ajax({
			url: base_url+"Posts_types/insertPostType",
			type: "post",
			dataType: "json",
			data: {
				post_type_name: post_type_name,
				fk_status_post_type_id: fk_status_post_type_id,
			},
			success: function (data) {
				if (data.response == "success") {
						var status_color = "";
						if (data.post["status_value"] == 1) {
							status_color = 'green';
						} else {
							status_color = 'red';
						}
						var node = $('#posts_types_table').DataTable()
							.row.add([
								data.post["post_type_id"],
								data.post["post_type_name"],
								`<span class="status-pill smaller ${status_color}"></span><span>${data.post["status_name"]}</span>`,
								`<a href="#" class="edit_category"value="${data.post["post_type_id"]}"><i class="os-icon os-icon-ui-49"></i></a>`
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
		$("#add_post_type_form")[0].reset();
	}
});
//Fetch Posts Types
// function fetch_posts_types() {
// 	$.ajax({
// 		url: "http://localhost/linkera/Posts_types/fetchPostsTypes",
// 		type: "post",
// 		dataType: "json",
// 		async: false,
// 		success: function (data) {
// 			var tbody = "";
// 			var i = "1";
// 			for (var key in data) {
// 				tbody += "<tr>";
// 				tbody += "<td>" + i++ + "</td>";
// 				tbody += "<td>" + data[key]["post_type_name"] + "</td>";
// 				tbody += `<td class="row-actions">
// 							<a href="#" id="edit_type"value="${data[key]["post_type_id"]}">
// 							<i class="os-icon os-icon-ui-49"></i>
// 							</a>
// 							<a class="danger" href="#" id="deletePostType"value="${data[key]["post_type_id"]}">
// 							<i class="os-icon os-icon-ui-15"></i>
// 							</a>
// 						  </td>`;
// 				tbody += "</tr>";
// 			}
// 			$("#tbody_types").html(tbody);
// 		}
// 	});
// }
// fetch_posts_types();
// Delete post type
// $(document).on("click", "#deletePostType", function (e) {
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
// 					url: "http://localhost/linkera/Posts_types/deletePostType",
// 					type: "post",
// 					dataType: "json",
// 					data: {
// 						del_id: del_id
// 					},
// 					success: function (data) {
// 						fetch_posts_types();
// 						if (data.responce == "success") {
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
$(document).on("click", ".edit_post_type", function (e) {
	e.preventDefault();
	var edit_id = $(this).attr("value");
	if (edit_id == "") {
		alert("Modifier l'identifiant requis");
	} else {
		$.ajax({
			url: base_url+"Posts_types/editPostType",
			type: "post",
			dataType: "json",
			data: {
				edit_id: edit_id
			},
			success: function (data) {
				if (data.response == "success") {
					$("#editModal").modal("show");
					$("#edit_modal_id").val(data.post.post_type_id);
					$("#edit_post_type_name").val(data.post.post_type_name);
					$("#edit_fk_status_post_type_id").val(data.post.fk_status_post_type_id).trigger("change");
				} else {
					toastr["error"](data.message);
				}
			}
		});
	}
});
// update Post type
$(document).on("click", "#update_post_type", function (e) {
	e.preventDefault();
	var edit_id = $("#edit_modal_id").val();
	var edit_post_type_name = $("#edit_post_type_name").val();
	var edit_fk_status_post_type_id = $("#edit_fk_status_post_type_id").val();
	if (edit_post_type_name == "error"||edit_fk_status_post_type_id=="error") {
		toastr["error"](data.message);
	} else {
		$.ajax({
			url: base_url+"Posts_types/updatePostType",
			type: "post",
			dataType: "json",
			data: {
				edit_id: edit_id,
				edit_post_type_name: edit_post_type_name,
				edit_fk_status_post_type_id: edit_fk_status_post_type_id
			},
			success: function (data) {
				if (data.response == "success") {
					var status_color = "";
					if (data.post["status_value"] == 1) {
						status_color = 'green';
					} else {
						status_color = 'red';
					}
					var elem = $("a[value=" + data.post.post_type_id + "]")[0];
					var parent = elem.closest('tr');
					var first_elem = parent.querySelectorAll('td')[1];
					var sec_elem = parent.querySelectorAll('td')[2];
					$(first_elem).html(data.post.post_type_name);
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
	$('#posts_types_table').DataTable({
		"language": { "url": base_url+"template/assets/datatables.json" },
		"order": [[ 3, "desc" ]]
	});
});


