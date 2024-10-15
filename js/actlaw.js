 $(document).ready(function (e){
    displayTable();
});

function displayTable(){
    $.get("view/actlaw_view.php", {}, function (data, status) {
		$("#target").html(data);
	});
}

function getData(id){
	$("#h_id").val(id);
	$.post("action/actlaw/getDetails.php", {
		id: id
	},
	function (data, status) {
		var obj1 = JSON.parse(data);
		var obj = obj1[0];

		$("#u_section_act").val(window.atob(obj.section_act));
		$("#u_section_act_code").val(window.atob(obj.section_act_code));
		$("#u_section_act_description").val(window.atob(obj.section_act_description));
		$("#u_section_law").val(window.atob(obj.section_law));
		$("#u_section_law_code").val(window.atob(obj.section_law_code));
		$("#u_section_law_description").val(window.atob(obj.section_law_description));
		if(obj.status == '1'){
			$("#u_active").attr('checked','checked');
		} else {
			$("#u_inactive").attr('checked','checked');
		}
	});
	$("#edit_modal").modal("show");
}

 $(document).ready(function (e){
	$("#actlawform").on('submit',(function(e){
    	const formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: "action/actlaw/add.php",
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
        	document.getElementById("actlawform").reset();
			},
			error: function(){} 	        
		});
	}));
});


$(document).ready(function (e){
	$("#actlawform_update").on('submit',(function(e){
    	const formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: "action/actlaw/update.php",
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
        	document.getElementById("actlawform_update").reset();
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
	$.post("action/actlaw/delete.php", {
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