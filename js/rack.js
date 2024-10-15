 $(document).ready(function (e){
    displayTable();
});

function displayTable(){
    $.get("view/rack_view.php", {}, function (data, status) {
		$("#target").html(data);
	});
}

function getData(id){
	$("#h_id").val(id);
	$.post("action/rack/getDetails.php", {
		id: id
	},
	function (data, status) {
		var obj1 = JSON.parse(data);
		var obj = obj1[0];

		$("#u_rack_type").val(window.atob(obj.rack_type));
		$("#u_rack_name").val(window.atob(obj.rack_name));
		$("#u_rack_code").val(window.atob(obj.rack_code));
		$("#u_rack_description").val(window.atob(obj.rack_description));
		$("#u_rack_capacity").val(window.atob(obj.rack_capacity));
		$("#u_rack_capacity_unit").val(window.atob(obj.rack_capacity_unit));
		$("#u_shelf_name").val(window.atob(obj.shelf_name));
		$("#u_shelf_code").val(window.atob(obj.shelf_code));
		$("#u_shelf_description").val(window.atob(obj.shelf_description));
		$("#u_shelf_capacity").val(window.atob(obj.shelf_capacity));
		$("#u_shelf_capacity_unit").val(window.atob(obj.shelf_capacity_unit));
		if(obj.status == '1'){
			$("#u_active").attr('checked','checked');
		} else {
			$("#u_inactive").attr('checked','checked');
		}
	});
	$("#edit_modal").modal("show");
}

 $(document).ready(function (e){
	$("#rackform").on('submit',(function(e){
    	const formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: "action/rack/add.php",
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
        	document.getElementById("rackform").reset();
			},
			error: function(){} 	        
		});
	}));
});


$(document).ready(function (e){
	$("#rackform_update").on('submit',(function(e){
    	const formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: "action/rack/update.php",
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
        	document.getElementById("rackform_update").reset();
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
	$.post("action/rack/delete.php", {
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