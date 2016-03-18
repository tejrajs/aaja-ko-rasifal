<?php
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