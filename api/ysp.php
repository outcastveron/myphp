<?php
$id=isset($_GET['id'])?$_GET['id']:'cctv1';
$hostname = 'liveali-tpgq.cctv.cn';
$ip = gethostbyname($hostname);
$url = "http://{$ip}/liveali-tpgq.cctv.cn/live/" . $id .".m3u8";
header('location:'   . $url);
?>
