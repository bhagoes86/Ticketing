    $(document).ready(function(){
	    	$('input[type=file]').bootstrapFileInput();
			$('.file-inputs').bootstrapFileInput();

	    });
	
		$(function() {
		    $( "#datepicker" ).datepicker();
		});

	    function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        reader.onload = function (e) {
		            $('#gambar').attr('src', e.target.result);
		        }

		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#posterFile").change(function(){
		    readURL(this);
		});