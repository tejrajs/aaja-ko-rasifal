<?php
ob_start();
session_start();

define( 'APP_WEB_URL', 'https://aaja-ko-rasifal.herokuapp.com/'); //display db errors?
define( 'APP_FB_URL', 'https://apps.facebook.com/aaja-ko-rasifal/' ); //display db errors?

require(__DIR__ . '/vendor/autoload.php');

$fb = new Facebook\Facebook([
		'app_id' => '966540880088963',
		'app_secret' => 'd797fd116b4f87f05c6b6d26798083b3',
		'default_graph_version' => 'v2.5',
		//'default_access_token' => '{access-token}', // optional
]);
