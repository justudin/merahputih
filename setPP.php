<?php
/*
Created by @justudinlab
2015-07-03 KST
*/
session_start();
// added in v4.0.0
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;

// init app with app id and secret
FacebookSession::setDefaultApplication( 'APP-ID','APP-SECRET' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('URL-setPP.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}

// see if we have a session
if ( isset( $session ) ) {

  try {
    define('UPLOAD_DIR', 'fbphotopict/');
    $id   = $_SESSION['FBID'];

    $imgfile = UPLOAD_DIR.$id.'007red-white-flag.jpeg';

    // Upload to a user's profile. The photo will be in the
    // first album in the profile. You can also upload to
    // a specific album by using /ALBUM_ID as the path     
    $response = (new FacebookRequest(
      $session, 'POST', '/me/photos', array(
        'source' => new CURLFile($imgfile, 'image/jpeg'),
        'message' => ''
      )
    ))->execute()->getGraphObject();

    // If you're not using PHP 5.5 or later, change the file reference to:
    // 'source' => '@/path/to/file.name'

    echo "Posted with id: " . $response->getProperty('id');
    
    $fb_image_link = "https://www.facebook.com/photo.php?fbid=".$response->getProperty('id')."&makeprofile=1";
    
    //redirect to uploaded photo url and change profile picture
    echo "<script type='text/javascript'>top.location.href = '$fb_image_link';</script>";

  } catch(FacebookRequestException $e) {

    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();

  }   

}
else {
  $scope = array('email','public_profile','user_photos','publish_actions');
  $loginUrl = $helper->getLoginUrl($scope);
  //$loginUrl = $helper->getLoginUrl();
  header("Location: ".$loginUrl);
}
?>