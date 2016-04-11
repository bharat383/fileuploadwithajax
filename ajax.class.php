<?php

if(isset($_REQUEST['func']) && $_REQUEST['func']=="uploadfile")
{
	$Main = new Main();
	$Main->fileupload($_FILES);
}

class Main 
{
	function fileupload($file_array)
	{
		$response  = array();
		/*BEGIN FILE UPLOADING CODE */
			$uploaded_files = array();
			if(isset($file_array['demo_file']) && $file_array['demo_file']['name']!="")
			{
				$currentfile_extension = end(@explode(".",$file_array['demo_file']['name']));
				$filename = date("YmdHis").rand(1000,9999).".".$currentfile_extension;
				if(@move_uploaded_file($_FILES['demo_file']['tmp_name'], "upload/".$filename))
				{
					$response['file_name']=$filename;
					$response['message'] = "File has been updated successfully.";
					$response['response_html'] = "<p>File Name : ".$filename.". &nbsp;&nbsp;&nbsp;&nbsp;<a href='upload/".$filename."' target='_new'>View/Download File</a></p>";
				} else {
					$response['file_name']="";
					$response['message'] = "Error in file uploading.";
					$response['response_html'] = "";
				}
			}
		/*END FILE UPLOADING CODE */	
		echo json_encode($response);
	}
}
?>