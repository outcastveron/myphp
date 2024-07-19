<?php

ini_set('date.timezone','Asia/Shanghai');
set_time_limit(300);

// 订阅链接的列表
$subUrlList = [
  'http://panda.切底锚栓.com/api/v1/client/subscribe?token=3a3a14f2d494670a29b9bc61bff9d58d',
  'https://sub2.591haoka.com/api/v1/client/subscribe/token=9e48312624d64c219f8e7u9af55b4k238d56',
  'hhttps://sub1.tg-mfjd666.cloudns.be/api/v1/client/subscribe/token=598adee7147c414593f29c74cfade831f4d95313f786bb749ca643ea23bb0fd3',
  'https://sub2.591haoka.com/api/v1/client/subscribe/token=9e48312624d64c219f8e7u9af55b4k238d56',
  'https://wwe.trx1.cyou/api/v1/client/subscribe?token=a2e3729beea68d94f36ef196b0c9c062',
  'https://rvps.duckking.shop:26720/s/default/764ed3a1a918ee05994ba37a1340ca29',
  'https://id9.cc/sub?target=v2ray&url=https%3A%2F%2Frss202407.mugua-sub.com%2Flink%2FKJcTUT9qI39U4bMr%3Fclash%3D1&insert=false&emoji=true&list=false&tfo=false&scv=false&fdn=false&sort=false',
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
