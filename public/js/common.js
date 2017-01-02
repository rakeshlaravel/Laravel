$(document).on('ready', function(){

	/*
	---------------------------------------------------------
	For Employee Page
	---------------------------------------------------------
	*/
	$("input[name = 'name']").prop('disabled', true);
	$("input[name = 'emp_id']").prop('disabled', true);
	$("input[name = 'address']").prop('disabled', true);
	$("input[name = 'phone']").prop('disabled', true);
	$("a[id = 'submit']").css("display", "none");
	$("a").on('click', function(){

		var name_id = $(this).prop('id');
		if(name_id != "") {
			name_id = name_id.split("_");
			var name = name_id[0];
			var nameId = name_id[1]; 
		}
		
		
		if(name == "edit"){
			$("input[id = 'name_"+nameId+"']").prop('disabled', false);
			$("input[id = 'emp_id_"+nameId+"']").prop('disabled', false);
			$("input[id = 'address_"+nameId+"']").prop('disabled', false);
			$("input[id = 'phone_"+nameId+"']").prop('disabled', false);
			$("a[name = 'save_"+nameId+"']").css("display", "block");
			$("a[id='edit_"+nameId+"']").css("display", "none");
			$("a[id='delete_"+nameId+"']").css("display", "none");
			$("a[id='view_"+nameId+"']").css("display", "none");
		}

		if(name == "view"){
			var view_id = $("a[id = "+$(this).attr('id')+"]").attr('id').split("_");
			var view_id = view_id[1];

			$.ajax({
				url: '/employee/view',
				type: 'POST',
				data: {id: view_id},
				dataType: 'json',
				success: function(resp){
					$("#modal_name").html(resp.name);
					$("#modal_emp_id").html(resp.emp_id);
					$("#modal_address").html(resp.address);
					$("#modal_phone").html(resp.phone);
					$('#myModal').modal('show');

					if(resp.result == "Failure") {
						alert("Ooops, Something went wrong...");
					}
				},
				error: function(){
					alert("Ooops, Something went wrong...");
				}
			});
		}

		if(name == "delete"){
			var delete_id = $("a[id = "+$(this).attr('id')+"]").attr('id').split("_");
			var delete_id = delete_id[1];
			$.ajax({
				url: '/employee/delete',
				type: 'POST',
				data: {id: delete_id},
				dataType: 'json',
				success: function(resp){
					if(resp.result == "Success") {
						alert("Success! Record deleted");
					} 
					else if(resp.result == "Failure") {
						alert("Ooops, Something went wrong...");
					}
					window.location.reload();
				},
				error: function(){
					alert("Ooops, Something went wrong...");
				}
			});
		} 
	});

	$("a[id = 'submit']").on('click', function(){ 

		var saveName = $(this).attr('name').split("_");	
		var id = saveName[1];
		var name = $("input[id = 'name_"+id+"']").val();
		var emp_id = $("input[id = 'emp_id_"+id+"']").val();
		var address = $("input[id = 'address_"+id+"']").val();
		var phone = $("input[id = 'phone_"+id+"']").val();		
		
		$.ajax({
			url: '/employee/edit',
			type: 'POST',
			data: {id: id, name: name, emp_id: emp_id, address: address, phone: phone},
			dataType: 'json',
			success: function(resp){
				if(resp.result == "Success") {
					$("a[name='save_"+id+"'").css("display", "none");
					$("a[id='edit_"+id+"']").css("display", "block");
					$("a[id='delete_"+id+"']").css("display", "block");
					$("a[id='view_"+id+"']").css("display", "block");
					$("input[id = 'name_"+id+"']").prop('disabled', true);
					$("input[id = 'emp_id_"+id+"']").prop('disabled', true);
					$("input[id = 'address_"+id+"']").prop('disabled', true);
					$("input[id = 'phone_"+id+"']").prop('disabled', true);
				} 
				else if(resp.result == "Failure") {
					alert("Ooops, Something went wrong...");
				}
			},
			error: function(){
				alert("Ooops, Something went wrong...");
			}
		});
	});
	

	/*
	---------------------------------------------------------
	For Employee Page End
	---------------------------------------------------------
	*/


	/*
	---------------------------------------------------------
	For User Profile
	---------------------------------------------------------
	*/
	
	$("input[id = 'nameProfile']").prop("disabled", true);
	$("input[id = 'emailProfile']").prop("disabled", true);
	$("#profileEdit").on('click', function(){
		$(this).css('display', 'none');
		$("input[id = 'nameProfile']").prop("disabled", false);
		$("input[id = 'emailProfile']").prop("disabled", false);
		$("#profileSubmit").css('display', 'block');
	});
	

	/*
	---------------------------------------------------------
	For User Profile End
	---------------------------------------------------------
	*/

});