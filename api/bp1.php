<?php

ini_set('date.timezone','Asia/Shanghai');
set_time_limit(300);

// 订阅链接的列表
$subUrlList = [
  'https://sub.tgzdyz2.xyz/sub',
  'https://sub.5112233.xyz/auto',
  'https://vps.duckking.shop/s/default/c5d5fd3fc9336ae80aebd965b02bc2d8',
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
