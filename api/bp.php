<?php

ini_set('date.timezone','Asia/Shanghai');
set_time_limit(300);

// 订阅链接的列表
$subUrlList = [
  'https://zero.76898102.xyz/link/rWdgl3mSG2hklCsG?sub=3',
  'https://xn--rssy0da8807a.cc/api/v1/client/subscribe?token=e454ad5e18859d2a093b78d94c3f9b37',
  'https://sub12316.tnetvpn.site/api/v1/client/subscribe?token=e6f86acae267cf3ce87fba50d639509f',
  'https://sub46299.yljc.online/api/v1/client/subscribe?token=5320b3bb55386c9a003de157df3839a5',
  'https://abqmygfu.mdssconfig.com/api/v1/client/subscribe?token=c777e8afa05a6b29f4ce282aed2b653d',
  'https://qkt83qnp2yuj.subconnect.org/api/v1/client/subscribe?token=1e8bfdffbaa020209a08673f3d404a10',
  'https://starlinkcloud.org/api/v1/client/subscribe?token=eb16845bc52e346bc644038eafab206b',
  'https://ktmurl.club/api/v1/client/subscribe?token=bbd8e41a04045586a81069ad2268670e',
  'https://sub76555.tnetvpn.site/api/v1/client/subscribe?token=8e7d5812a445a58d0d3f8cd9a8d97b73',
  'https://dy1.mmydy.xyz/api/v1/client/subscribe?token=2820582ae13738e72d411600191a438d',
  'https://neko2.hnekocloud.top/api/v1/client/subscribe?token=1faf300b7d063eba1093de7e5e248a5b',
  'https://free.kcjs.me/api/v1/client/subscribe?token=c14578a24f18cb7454812098122ee429',
  'https://xm1oo.no-mad-world.club/link/PLx7Q9zVt4hQ2iWC?clash=3&extend=1',
  'https://sub2.yljc.online/api/v1/client/subscribe?token=3090a63bb6473917baa0591373b68bfc',
  'http://api.scyu.xyz/sub?token=4v1eR3A9c8Z4dVQ0PE9Yjimrbfg&tag=clash',
  'https://urls.freedonscf.cfd/HappyHour',
  'https://www.wmcdn.top/api/v1/client/subscribe?token=0ed8d0ee1b84efb2bc5a555c3b2de95e',
  'https://zero.76898102.xyz/link/7nQkA0pxUGVT41VX?sub=3',
  'https://rvps.duckking.shop:26720/s/default/764ed3a1a918ee05994ba37a1340ca29',
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
