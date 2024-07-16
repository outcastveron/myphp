<?php

ini_set('date.timezone','Asia/Shanghai');
set_time_limit(300);

// 订阅链接的列表
$subUrlList = [
  'https://zero.76898102.xyz/link/rWdgl3mSG2hklCsG?sub=3',
  'http://panda.切底锚栓.com/api/v1/client/subscribe?token=3a3a14f2d494670a29b9bc61bff9d58d',
  'https://chaozhijc.xyz/api/v1/client/subscribe?token=3c2d11bd3aa96353289b6c873040f32d',
  'https://dash.djjc.cfd/api/v1/client/subscribe?token=be34b72308d6befd5867061788ed0f21',
  'https://rvps.duckking.shop:26720/s/default/764ed3a1a918ee05994ba37a1340ca29',
  'https://id9.cc/sub?target=v2ray&url=https%3A%2F%2Fcdn.jsdelivr.net%2Fgh%2Fmjjjd%2Flinuxdo%40main%2Fdata%2F2024_07_10%2FdswnxV.yaml&insert=false&emoji=true&list=false&tfo=false&scv=false&fdn=false&sort=false',
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
