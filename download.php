<?php
/*
Created by @justudinlab
2015-07-03 KST
*/
session_start();
define('UPLOAD_DIR', 'fbphotopict/');
$id 	= $_SESSION['FBID'];
$file 	= UPLOAD_DIR . $id . '007red-white-flag.jpeg';

// force user to download the image
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: image/png');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
}
else {
    echo "$file not found";
}
?>