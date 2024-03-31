<?php

ini_set('date.timezone','Asia/Shanghai');
set_time_limit(300);

// 订阅链接的列表
$subUrlList = [
  'http://sub.avotc.eu.org/?token=auto',
  'https://sub.kaiche.tk/?token=auto',
  'http://allsub.king361.cf/',
  'https://vless.fxxk.dedyn.io/auto',
  'https://subsub.crpcg.tk/sub',
  'https://dy.twittei.link/auto',
  'https://cm8.rr.nu/lucky',  
];

try {
  $allList = [];

  foreach ($subUrlList as $url) {
    $subString = fetchContent($url);
    $subContent = base64_decode(trim($subString));

    array_push($allList, $subContent);
  }

  $result = implode("\n", $allList);
  $result = base64_encode($result);

  echo $result;
} catch (Exception $e) {
  var_dump($e->getMessage());
}

function fetchContent($url) {
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 0);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

  $rs = curl_exec($ch);

  curl_close($ch);

  return $rs;
}
