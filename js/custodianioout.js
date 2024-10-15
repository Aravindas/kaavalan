$(document).ready(function () {
  $(".purpose").hide();
}); 
  
function showpurpose(val){
  if(val == 1){
    $(".purpose").show();
  } else {
    $(".purpose").hide();
  }
}

  function printform(){
	var id = $("#id").val();
	var purpose = $("#purpose").val();
	var court = $("#court").val();
	var ccno = $("#ccno").val();
	var doh = $("#doh").val();
	var autherized = $("#autherized").val();
	var authorized_io_name = $("#authorized_io_name").val();

	var form = $(document.createElement('form'));
    $(form).attr("action", "printioout.php");
    $(form).attr("method", "POST");
    $(form).attr("target", "_blank");
    $(form).css("display", "none");

    var id = $("<input>").attr("type", "text").attr("name", "id").val(id);
    $(form).append($(id));

	var purpose = $("<input>").attr("type", "text").attr("name", "purpose").val(purpose);
    $(form).append($(purpose));

	var court = $("<input>").attr("type", "text").attr("name", "court").val(court);
    $(form).append($(court));

	var ccno = $("<input>").attr("type", "text").attr("name", "ccno").val(ccno);
    $(form).append($(ccno));

	var doh = $("<input>").attr("type", "text").attr("name", "doh").val(doh);
    $(form).append($(doh));

	var autherized = $("<input>").attr("type", "text").attr("name", "autherized").val(autherized);
    $(form).append($(autherized));

  var authorized_io_name = $("<input>").attr("type", "text").attr("name", "authorized_io_name").val(authorized_io_name);
      $(form).append($(authorized_io_name));

    form.appendTo( document.body );
    $(form).submit();

  }

  function view_docModal(){
    var mid = $("#id").val();
    if(mid == ''){
      alert("Error");
    } else {
      $('#h_f_id').val(mid);
      $("#document_upload").modal("show");
    }
  }

  function view_imgModal(){
	var mid = $("#id").val();
	if(mid == ''){
	  alert("Error");
	} else {
	  $('#h_if_id').val(mid);
	  $("#image_upload").modal("show");
	}
  }
  
  function view_videoModal(){
	var mid = $("#id").val();
	if(mid == ''){
	  alert("Error");
	} else {
	  $('#h_vf_id').val(mid);
	  $("#video_upload").modal("show");
	}
  }

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

  
  $(document).ready(function (e){
    $("#printAck_form").on('submit',(function(e){
       console.log("out")
        const formData = new FormData(this);
      e.preventDefault();
      $.ajax({
        url: "action/custodianioout/update.php",
        type: "POST",
        data:  formData,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){alert(data);
          if(data.trim()=='Success') {
            $( "#image_uploadform" ).trigger( "submit" );
            $( "#document_uploadform" ).trigger( "submit" );
            $( "#video_uploadform" ).trigger( "submit" );
            printform();
            $("#message2").html("");
            alert(data);
          } else {	
          }
            // document.getElementById("applyform").reset();
        },
        error: function(){} 	        
      });
    }));

    $("#printAck_form_in").on('submit',(function(e){
      console.log("in")
        const formData = new FormData(this);
      e.preventDefault();
      $.ajax({
        url: "action/custodianioout/update.php",
        type: "POST",
        data:  formData,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){alert(data);
          if(data.trim()=='Success') {
            $( "#image_uploadform" ).trigger( "submit" );
            $( "#document_uploadform" ).trigger( "submit" );
            $( "#video_uploadform" ).trigger( "submit" );
            printform();
            $("#message2").html("");
            alert(data);
          } else {	
          }
            // document.getElementById("applyform").reset();
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
          }else {	
          }
            
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
          }else {	
          }
            
        },
        error: function(){} 	        
      });
    }));
  });

  $(document).ready(function (e){
    $("#video_uploadform").on('submit',(function(e){
        const formData = new FormData(this);
      e.preventDefault();
      $.ajax({
        url: "action/custodianioout/uploadVideo.php",
        type: "POST",
        data:  formData,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
          $data=data;
          if(data.trim()=='Success') {
            $("#message2").html("");
            $("#video_upload").modal("hide");
          }else {	
          }
            
        },
        error: function(){} 	        
      });
    }));
  });