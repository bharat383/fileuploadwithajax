<!DOCTYPE html>
<html>
	<head>
		<title>File Upload with AJAX : </title>
		<script src="js/jquery.min.js"></script>
	</head>
<body>

<form method="post" enctype="multipart/form-data" id="myform">
	<h3>Select File to upload</h3>
	<input type="file" name="demo_file" class="file-upload-ajax">
	<hr>
	<div class="uploaded-files"></div>
</form>
<script type="text/javascript">
	$(document).ready(function(){
	  	/*BEGIN FILE UPLOADING WITH CODE*/
		 	$('.file-upload-ajax').on('change',function(){
		 	 	if(confirm("Are You Sure to Upload This File ?")) {
		 	 		$(this).after('<span class="temp-message">File Uploading.....</span>');
		            var formdata = new FormData($("#myform")[0]);
		            $.ajax({
		                type: "POST",
		                url: "ajax.class.php?func=uploadfile",
		                enctype: 'multipart/form-data',
		                data: formdata,
		                async: false,
				        contentType: false,
				        processData: false,
				        cache: false,
		               	success: function(msg)
		                {
		                	$response = $.parseJSON(msg);
		               	 	$('.temp-message').text($response.message);
		               	 	$('.file-upload-ajax').val('');
		               	 	$('.uploaded-files').append($response.response_html);
		                }
						//success ends
		            });

		 	 	} else {
		 	 		$('.file-upload-ajax').val('');
		 	 	}
		 	});
	  	/*END FILE UPLOADING WITH CODE*/
	});
</script>
</body>
</html>