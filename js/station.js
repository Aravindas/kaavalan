 $(document).ready(function (e){
    displayTable();
});

function displayTable(){
    $.get("view/station_view.php", {}, function (data, status) {
		$("#target").html(data);
	});
}

function getData(id){
	$("#h_id").val(id);
	$.post("action/station/getDetails.php", {
		id: id
	},
	function (data, status) {
		var obj1 = JSON.parse(data);
		var obj = obj1[0];

		$("#u_commissionerate").val(window.atob(obj.commissionerate));
		$("#u_district").val(window.atob(obj.district));
		$("#u_district_code").val(window.atob(obj.district_code));
		$("#u_station").val(window.atob(obj.station));
		$("#u_station_code").val(window.atob(obj.station_code));
		if(obj.status == '1'){
			$("#u_active").attr('checked','checked');
		} else {
			$("#u_inactive").attr('checked','checked');
		}
	});
	$("#edit_modal").modal("show");
}

 $(document).ready(function (e){
	$("#stationform").on('submit',(function(e){
    	const formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: "action/station/add.php",
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
        	document.getElementById("stationform").reset();
			},
			error: function(){} 	        
		});
	}));
});


$(document).ready(function (e){
	$("#stationform_update").on('submit',(function(e){
    	const formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: "action/station/update.php",
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
        	document.getElementById("stationform_update").reset();
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
	$.post("action/station/delete.php", {
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