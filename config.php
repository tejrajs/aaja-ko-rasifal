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
