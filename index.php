<?php

require(__DIR__ . '/config.php');

$response = $fb->get('/me', $accessToken);
$user = $response->getGraphUser();

print_r($user);