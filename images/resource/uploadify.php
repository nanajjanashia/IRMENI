<?php

$targetFolder = '/images/resource/';
$verifyToken = md5('unique_salt' . $_POST['timestamp']);



	$tempFile = $_FILES['Filedata']['tmp_name'];

	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;

	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];

	

	// Validate the file type

	$fileTypes = array('PNG','JPG','jpg','jpeg','gif','png'); // File extensions

	$fileParts = pathinfo($_FILES['Filedata']['name']);

	

	if (in_array($fileParts['extension'],$fileTypes)) {

		while(file_exists($targetFile)) {

			$targetFile = substr($targetFile, 0, -4);

			$targetFile = $targetFile."_2.".$fileParts["extension"];

} 
			
					

		move_uploaded_file($tempFile,$targetFile);
		$test = explode("/", $targetFile);

		$count = count($test)-1;

		echo $test[$count];


	} else {

		echo 'Invalid file type.';

	}
