<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('1030569826848-1ltqho0j6ftthk0aj3f6eu5237s8jc2b.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('https://google-login-dw05.onrender.com/google_callback.php');

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if (!isset($token['error'])) {
        $client->setAccessToken($token);

        $oauth2 = new Google_Service_Oauth2($client);
        $userinfo = $oauth2->userinfo->get();
        $email = $userinfo->email;

        // 成功後轉回學校網站
        header('Location: http://140.134.53.57/~D1285270/front_web/login_success.php?email=' . urlencode($email));
        exit;
    } else {
        echo "錯誤：" . htmlspecialchars($token['error_description']);
    }
} else {
    echo "沒有收到認證碼。";
}
?>
