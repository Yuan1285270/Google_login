<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('1030569826848-1ltqho0j6ftthk0aj3f6eu5237s8jc2b.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('https://google-login-dw05.onrender.com/google_callback.php');
$client->addScope('email');
$client->addScope('profile');

$auth_url = $client->createAuthUrl();
header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
exit;
?>
