<?php
error_reporting(0);

$url = "http://www.archlinux.org";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$data = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

if ($data === false) {
    // return silently
    return;
}

$contentLength = intval($info['download_content_length']);
$status = intval($info['http_code']);

if ($status >= 400) {
    // return silently
    return;
}

echo $data;

?>