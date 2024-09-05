<?php

ini_set('date.timezone','Asia/Shanghai');
set_time_limit(300);

// 订阅链接的列表
$subUrlList = [
  'https://raw.githubusercontent.com/mfbpn/tg_mfbpn_subs/main/trial',
  'https://raw.githubusercontent.com/imyaoxp/x.sub/main/trial',
  'https://raw.githubusercontent.com/chxxyz2004/banyun/main/trial',
  'https://raw.githubusercontent.com/pathetimanity/TyporaTheme/main/trial',
  'https://raw.githubusercontent.com/hawk0344/Auto_AirPort/main/trial',
  'https://raw.githubusercontent.com/Cheemsar/cheemsar.sub/main/trial',
  'https://raw.githubusercontent.com/chxxyz2004/zy2309/main/trial',
  'https://raw.githubusercontent.com/kljjiajia/me/main/trial',
  'https://raw.githubusercontent.com/Leon406/SubCrawler/main/sub/share/all5',
  'https://sub.id9.cc/sub?target=v2ray&url=https%3A%2F%2Fraw.githubusercontent.com%2Fgyc-12%2Faggregator%2Fmain%2Faggregate%2Fdata%2Fproxies.yaml&insert=false&config=https%3A%2F%2Fraw.githubusercontent.com%2FACL4SSR%2FACL4SSR%2Fmaster%2FClash%2Fconfig%2FACL4SSR_Online.ini',
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
