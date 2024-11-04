<?php

ini_set('date.timezone','Asia/Shanghai');
set_time_limit(300);

// 订阅链接的列表
$subUrlList = [
  'https://sub.ztyawc.us.kg/zzzjp',
  'https://rvps.duckking.shop:26720/s/default/764ed3a1a918ee05994ba37a1340ca29',
  'https://id9.cc/sub?target=v2ray&url=https%3A%2F%2Fraw.githubusercontent.com%2Fanaer%2FSub%2Fmain%2Fclash.yaml&insert=false&emoji=true&list=false&tfo=false&scv=false&fdn=false&sort=false',
  'https://app.jisovpn.site/api/v1/client/subscribe?token=fae9ac4bac4624f9e2eca15293b953f6',
  'http://106.75.178.88:82/api/v1/client/subscribe?token=3054da66436dba0c9f66cfbcb79c7199',
  'https://selinux.link/api/v1/client/subscribe?token=de9706e1-7b34-4420-908d-de94c5fac34f',
  'https://v2b.hinetlove.site/api/v1/client/subscribe?token=0f51ebe437aad648d7ca71b3a6ff35a7',
  'https://fly.thenightrain.top/api/v1/client/subscribe?token=195cf12e4877f5c814a7a62c4a0079b7',
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
