 $(document).ready(function (e){
    displayTable();
});

function displayTable(){
    $.get("view/seizure_contraband_view.php", {}, function (data, status) {
		$("#target").html(data);
	});
}

function getData(id){
	$("#h_id").val(id);
	$.post("action/seizure_contraband/getDetails.php", {
		id: id
	},
	function (data, status) {
		var obj1 = JSON.parse(data);
		var obj = obj1[0];

		$("#u_contraband_code").val(window.atob(obj.contraband_code));
		$("#u_contraband_type_name").val(window.atob(obj.contraband_type_name));
		$("#u_contraband_quantity_type").val(window.atob(obj.contraband_quantity_type));
		$("#u_contraband_units").val(window.atob(obj.contraband_units));
		$("#u_storage_mode").val(window.atob(obj.storage_mode));
		if(obj.status == '1'){
			$("#u_active").attr('checked','checked');
		} else {
			$("#u_inactive").attr('checked','checked');
		}
	});
	$("#edit_modal").modal("show");
}

 $(document).ready(function (e){
	$("#seizure_contrabandform").on('submit',(function(e){
    	const formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: "action/seizure_contraband/add.php",
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
        	document.getElementById("seizure_contrabandform").reset();
			},
			error: function(){} 	        
		});
	}));
});


$(document).ready(function (e){
	$("#seizure_contrabandform_update").on('submit',(function(e){
    	const formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: "action/seizure_contraband/update.php",
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
        	document.getElementById("seizure_contrabandform_update").reset();
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
	$.post("action/seizure_contraband/delete.php", {
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