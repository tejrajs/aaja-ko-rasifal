<?php

define( 'APP_WEB_URL', 'https://aaja-ko-rasifal.herokuapp.com/'); //display db errors?
define( 'APP_FB_URL', 'https://apps.facebook.com/aaja-ko-rasifal/' ); //display db errors?

require(__DIR__ . '/vendor/autoload.php');

$fb = new Facebook\Facebook([
		'app_id' => '192495190824190',
		'app_secret' => '07b067bb8867e10bc11636fa4bb6f49d',
		'default_graph_version' => 'v2.5',
		//'default_access_token' => '{access-token}', // optional
]);

$accessToken = ''; 

if(!isset($_SESSION['facebook_access_token'])){
	$helper = $fb->getCanvasHelper();
	try {
		$accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	if (!isset($accessToken)) {
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email', 'user_likes','user_posts','publish_actions']; // optional
		$loginUrl = $helper->getLoginUrl(APP_WEB_URL.'login-callback.php', $permissions);
		
		header('Location: '.$loginUrl);
	}
}else{
	$accessToken = $_SESSION['facebook_access_token'];
}