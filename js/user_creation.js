 $(document).ready(function (e){
    displayTable();
});

function displayTable(){
    $.get("view/user_creation_view.php", {}, function (data, status) {
		$("#target").html(data);
	});
}

function getData(id){
	$("#h_id").val(id);
	$.post("action/user_cration/getDetails.php", {
		id: id
	},
	function (data, status) {
		var obj1 = JSON.parse(data);
		var obj = obj1[0];

		$("#u_username").val(obj.username);
		$("#u_display_name").val(obj.display_name);
		$("#u_password").val(window.atob(obj.password));
		$("#u_cps_no").val(obj.cps_no);
		$("#u_email_id").val(obj.email_id);
		$("#u_contact_no").val(obj.contact_no);
		$("#u_designation").val(obj.designation);
		$("#u_role").val(obj.role);
		$("#u_district_code").val(obj.district_code);
		$("#u_station_code").val(obj.station_code);
		if(obj.status == '1'){
			$("#u_active").attr('checked','checked');
		} else {
			$("#u_inactive").attr('checked','checked');
		}
	});
	$("#edit_modal").modal("show");
}

 $(document).ready(function (e){
	$("#userform").on('submit',(function(e){
    	const formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: "action/user_cration/add.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			success: function(data){
				$data=data;
				if(data.trim()=='Success') {
					$("#message2").html("");
                    $("#add_modal").modal("hide");
                    displayTable();
                    alert(data);
				}else {	
                    alert(data);
					$("#message2").html(data);
				}
        	document.getElementById("userform").reset();
			},
			error: function(){} 	        
		});
	}));
});


$(document).ready(function (e){
	$("#userform_update").on('submit',(function(e){
    	const formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: "action/user_cration/update.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			success: function(data){
				$data=data;
				if(data.trim()=='Success') {
					$("#message2").html("");
                    $("#edit_modal").modal("hide");
                    displayTable();
                    alert(data);
				}else {	
                    alert(data);
					$("#message2").html(data);
				}
        	document.getElementById("userform_update").reset();
			},
			error: function(){} 	        
		});
	}));
});

function DeleteDetails1(id) {
	$("#h_id2").val(id);
	$("#delete_modal").modal("show");
}

function DeleteDetails() { 
	var id=$("#h_id2").val();
	$.post("action/user_cration/delete.php", {
        id: id
    },
	function (data, status) {
		if (data=="Error"){
			alert("unauthorized");
		}
		$("#delete_modal").modal("hide");
		displayTable();
	});
}