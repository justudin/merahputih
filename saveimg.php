<?php
/*
Created by @justudinlab
2015-07-03 KST
*/
	session_start(); 
	// requires php5
	define('UPLOAD_DIR', 'fbphotopict/');
	//$img 	= $_POST['data'];
	$id 	= $_SESSION['FBID'];
	//$imgName = $id.'007red-white-flag.png';
	//$img 	= str_replace('data:image/png;base64,', '', $img);
	//$img 	= str_replace(' ', '+', $img);
	//$data 	= base64_decode($img);
	$file 	= UPLOAD_DIR . $id . '007red-white-flag.jpeg';
	//$success = file_put_contents($file, $data);
	//print $success ? $file : 'Unable to save the file.';

	$data = substr($_POST['imageData'], strpos($_POST['imageData'], ",") + 1);
	$decodedData = base64_decode($data);
	$fp = fopen($file, 'wb');
	fwrite($fp, $decodedData);
	fclose();
?>