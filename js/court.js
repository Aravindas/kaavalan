 $(document).ready(function (e){
    displayTable();
});

function displayTable(){
    $.get("view/court_view.php", {}, function (data, status) {
		$("#target").html(data);
	});
}

function getData(id){
	$("#h_id").val(id);
	$.post("action/court/getDetails.php", {
		id: id
	},
	function (data, status) {
		var obj1 = JSON.parse(data);
		var obj = obj1[0];

		$("#u_court").val(window.atob(obj.court));
	});
	$("#edit_modal").modal("show");
}

 $(document).ready(function (e){
	$("#courtform").on('submit',(function(e){
    	const formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: "action/court/add.php",
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
        	document.getElementById("courtform").reset();
			},
			error: function(){} 	        
		});
	}));
});


$(document).ready(function (e){
	$("#courtform_update").on('submit',(function(e){
    	const formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: "action/court/update.php",
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
        	document.getElementById("courtform_update").reset();
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
	$.post("action/court/delete.php", {
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