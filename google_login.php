<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('Client ID');
$client->setClientSecret('Client Secret');
$client->setRedirectUri('https://google-login-dw05.onrender.com/google_callback.php');
$client->addScope('email');
$client->addScope('profile');

$auth_url = $client->createAuthUrl();
header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
exit;
?>
