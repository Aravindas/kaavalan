$(document).ready(function () {
    $("#iotable").hide();
});

function showHide(){
    displayTable();
    $("#iotable").show();
}


function ioout(id){
	var form = $(document.createElement('form'));
    $(form).attr("action", "custodianioout.php");
    $(form).attr("method", "POST");
    $(form).css("display", "none");

    var id = $("<input>").attr("type", "text").attr("name", "id").val(id);
    $(form).append($(id));

    form.appendTo( document.body );
    $(form).submit();

  }

  function ioin(id){
	
    var form = $(document.createElement('form'));
      $(form).attr("action", "custodianioin.php");
      $(form).attr("method", "POST");
      $(form).css("display", "none");
  
      var id = $("<input>").attr("type", "text").attr("name", "id").val(id);
      $(form).append($(id));
  
      form.appendTo( document.body );
      $(form).submit();
  
  }

  function iohistory(id){
    var form = $(document.createElement('form'));
    $(form).attr("action", "custodianioinHistory.php");
    $(form).attr("method", "POST");
    $(form).css("display", "none");

    var id = $("<input>").attr("type", "text").attr("name", "id").val(id);
    $(form).append($(id));

    form.appendTo( document.body );
    $(form).submit();
  }

  function ioedit(id){
  
    var form = $(document.createElement('form'));
      $(form).attr("action", "custodianioform_edit.php");
      $(form).attr("method", "POST");
      $(form).attr("target", "blank");
      $(form).css("display", "none");
  
      var id = $("<input>").attr("type", "text").attr("name", "id").val(id);
      $(form).append($(id));
  
      form.appendTo( document.body );
      $(form).submit();
  
    } 

  function ioDelete(id){
    $.post('action/custodianioout/delete.php', {id:id}, function(data){ 
      if(data.trim() == "Success"){
        alert("Deleted Successfully");
        displayTable();
      }      
    });
  }    

function displayTable(){
  var formData = new FormData(search_form);
  $.ajax({
    url: "view/custodianinwardio_view.php",
    type: "POST",
    data:  formData,
    contentType: false,
    cache: false,
    processData:false,
    success: function(data){
      $("#target").html(data);
    }
    });
  //   $.get("view/custodianinwardio_view.php", {}, function (data, status) {
	// 	$("#target").html(data);
	// });
}


    // When scan is successful fucntion will produce data
    function onScanSuccess(qrCodeMessage) {
      document.getElementById("result").innerHTML =
        '<span class="result">' + qrCodeMessage + "</span>";
        $("#qrres").val(qrCodeMessage);
    }
    
    // When scan is unsuccessful fucntion will produce error message
    function onScanError(errorMessage) {
      // Handle Scan Error
    }
    
    // Setting up Qr Scanner properties
    var html5QrCodeScanner = new Html5QrcodeScanner("reader", {
      fps: 10,
      qrbox: 250
    });
    
    // in
    html5QrCodeScanner.render(onScanSuccess, onScanError);

    function genQrcode(mid){
      $('#print_ack').prop('disabled', false);
    
      var form = $(document.createElement('form'));
        $(form).attr("action", "genqrcode.php");
        $(form).attr("method", "POST");
        $(form).attr("target", "_blank");
        $(form).css("display", "none");
    
        var mid = $("<input>").attr("type", "text").attr("name", "mid").val(mid);
        $(form).append($(mid));
    
        form.appendTo( document.body );
        $(form).submit();
    
        clearForm();
    }