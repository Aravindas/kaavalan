$(document).ready(function () {
	  $('#print_ack').prop('disabled', true);
	  $('#qr_cd').prop('disabled', true);
});

function showhidetxt(val,opt){
  if(val=='others'){
      $("#"+opt+"_cont").show();
  }
}

$(function () {
  $("#btnAdd").bind("click", function () {
      var div = $("<tr />");
      div.html(GetDynamicTextBox(""));
      $("#TextBoxContainer").append(div);
  });
  $("body").on("click", ".remove", function () {
      $(this).closest("tr").remove();
  });
});
function GetDynamicTextBox(value) {
  var cont = $("#cont").val();
  return '<td><input type="hidden" name="cid[]" /><select name = "contraband_type[]" type="text" class="txt_box form-control" placeholder=" Contraband Type"  id="contraband_type" /><option value="">- Select Here -</option><option value="1">Narcotic</option><option value="2">Psychotropic</option><option value="3">Others</option></select></td>' + '<td> <select name = "contraband_name[]" type="text" class="txt_box form-control" placeholder=" Contraband Name"  id="contraband_name" /><option value="">- Select Here -</option>'+cont+'</select></td>' + '<td><input type="text" name = "totqty[]" class="txt_box form-control" placeholder=" Total Quantity" id="totqty" /></td>' + '<td><input type="text" class="txt_box form-control" placeholder="Number of Packets" name = "nopack[]" id="nopack" /></td>'+ '<td> <input type="text" class="txt_box form-control" placeholder=" Quantity per Packet" name = "qtyperpack[]" id="qtyperpack" /></td>' + '<td><button type="button" class="btn btn-danger remove"><i class="fa fa-times"></i></button></td>'
}  

function printAck(){
  var mid = $("#mid").val();
  var form = $(document.createElement('form'));
    $(form).attr("action", "printack.php");
    $(form).attr("method", "POST");
    $(form).attr("target", "_blank");
    $(form).css("display", "none");

    var mid = $("<input>").attr("type", "text").attr("name", "mid").val(mid);
    $(form).append($(mid));

    form.appendTo( document.body );
    $(form).submit();

    clearForm();
}

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

  function view_docModal(){
        $("#document_upload").modal("show");
  }

  function view_imgModal(){
      $("#image_upload").modal("show");
  }

  $(document).ready(function (e){
	$("#applyform").on('submit',(function(e){
    	const formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: "action/custodianioout/edit.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			success: function(data){
            if(data.trim()=='Success') {
                $( "#image_uploadform" ).trigger( "submit" );
                $( "#document_uploadform" ).trigger( "submit" );
                $("#message2").html("");
                $('#qr_cd').prop('disabled', false);
                alert(data);
            } else {	
            // alert(data);
                $("#message2").html(data);
            }
        	// document.getElementById("applyform").reset();
			},
			error: function(){} 	        
		});
	}));
});

$(document).ready(function (e){
	$("#document_uploadform").on('submit',(function(e){
    	const formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: "action/custodianioout/uploadDoc.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			success: function(data){
				$data=data;
				if(data.trim()=='Success') {
					$("#message2").html("");
          $("#document_upload").modal("hide");
            // alert(data);
				}else {	
          // alert(data);
					$("#message2").html(data);
				}
        	
			},
			error: function(){} 	        
		});
	}));
});

$(document).ready(function (e){
	$("#image_uploadform").on('submit',(function(e){
    	const formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: "action/custodianioout/uploadImage.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			success: function(data){
				$data=data;
				if(data.trim()=='Success') {
					$("#message2").html("");
          $("#image_upload").modal("hide");
          // alert(data);
				} else {	
          // alert(data);
        // $("#message2").html(data);
				}
        	
			},
			error: function(){} 	        
		});
	}));
});

const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file
$(document).on('change','#attachment', function(e){
	for(var i = 0; i < this.files.length; i++){
		let fileBloc = $('<span/>', {class: 'file-block'}),
			 fileName = $('<span/>', {class: 'name', text: this.files.item(i).name});
		fileBloc.append('<span class="file-delete"><span>+</span></span>')
			.append(fileName);
		$("#filesList > #files-names").append(fileBloc);
	};
	// Ajout des fichiers dans l'objet DataTransfer
	for (let file of this.files) {
		dt.items.add(file);
	}
	// Mise à jour des fichiers de l'input file après ajout
	this.files = dt.files;

	// EventListener pour le bouton de suppression créé
	$('span.file-delete').click(function(){
		let name = $(this).next('span.name').text();
		// Supprimer l'affichage du nom de fichier
		$(this).parent().remove();
		for(let i = 0; i < dt.items.length; i++){
			// Correspondance du fichier et du nom
			if(name === dt.items[i].getAsFile().name){
				// Suppression du fichier dans l'objet DataTransfer
				dt.items.remove(i);
				continue;
			}
		}
		// Mise à jour des fichiers de l'input file après suppression
		document.getElementById('attachment').files = dt.files;
	});
});


jQuery(document).ready(function () {
    ImgUpload();
  });

  function ImgUpload() {
    var imgWrap = "";
    var imgArray = [];

    $('.upload__inputfile').each(function () {
      $(this).on('change', function (e) {
        imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
        var maxLength = $(this).attr('data-max_length');

        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        var iterator = 0;
        filesArr.forEach(function (f, index) {

          if (!f.type.match('image.*')) {
            return;
          }

          if (imgArray.length > maxLength) {
            return false
          } else {
            var len = 0;
            for (var i = 0; i < imgArray.length; i++) {
              if (imgArray[i] !== undefined) {
                len++;
              }
            }
            if (len > maxLength) {
              return false;
            } else {
              imgArray.push(f);

              var reader = new FileReader();
              reader.onload = function (e) {
                var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                imgWrap.append(html);
                iterator++;
              }
              reader.readAsDataURL(f);
            }
          }
        });
      });
    });

    $('body').on('click', ".upload__img-close", function (e) {
      var file = $(this).parent().data("file");
      for (var i = 0; i < imgArray.length; i++) {
        if (imgArray[i].name === file) {
          imgArray.splice(i, 1);
          break;
        }
      }
      $(this).parent().parent().remove();
    });
  }