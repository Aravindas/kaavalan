 $(document).ready(function (e){
    displayTable();
});

function displayTable(){
    $.get("view/io_list_view.php", {}, function (data, status) {
		$("#target").html(data);
	});
}

function getData(id){
	$("#h_id").val(id);
	$.post("action/io_list/getDetails.php", {
		id: id
	},
	function (data, status) {
		var obj1 = JSON.parse(data);
		var obj = obj1[0];

		$("#u_io_nm").val(window.atob(obj.io_nm));
		$("#u_io_desig").val(window.atob(obj.io_desig));
		$("#u_io_con_num").val(window.atob(obj.io_con_num));
	});
	$("#edit_modal").modal("show");
}

 $(document).ready(function (e){
	$("#ioform").on('submit',(function(e){
    	const formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: "action/io_list/add.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			success: function(data){
				if(data.trim()=='Success') {
					$("#message2").html("");
                    $("#add_modal").modal("hide");
                    displayTable();
                    alert(data);
				}else {	
                    alert(data);
					$("#message2").html(data);
				}
        	document.getElementById("ioform").reset();
			},
			error: function(){} 	        
		});
	}));
});


$(document).ready(function (e){
	$("#ioform_update").on('submit',(function(e){
    	const formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: "action/io_list/update.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			success: function(data){
				if(data.trim()=='Success') {
					$("#message2").html("");
                    $("#edit_modal").modal("hide");
                    displayTable();
                    alert(data);
				}else {	
                    alert(data);
					$("#message2").html(data);
				}
        	document.getElementById("ioform_update").reset();
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
	$.post("action/io_list/delete.php", {
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