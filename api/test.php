<?php

ini_set('date.timezone','Asia/Shanghai');
set_time_limit(300);

// 订阅链接的列表
$subUrlList = [
 'https://raw.githubusercontent.com/txmiaomiaowu/openitr/main/long',
 'https://raw.githubusercontent.com/mahdibland/V2RayAggregator/master/Eternity',
 'https://raw.githubusercontent.com/obscure1990/freeVM/master/list.txt',
 'https://raw.githubusercontent.com/wudongdefeng/free/main/freevm/list.txt',
 'https://raw.githubusercontent.com/w1770946466/Auto_proxy/main/Long_term_subscription_num',
 'https://sub.5112233.xyz/auto',
 'https://sub3.jie-quick.buzz/api/v1/client/subscribe?token=4922263ac084a8daa39c93b38c3772fc',
];

try {
 $allList = [];

 foreach ($subUrlList as $url) {
  $subString = fetchContent($url);
  $subContent = base64_decode(trim($subString));

  $subContentArray = explode("\n", $subContent);
  $allList = array_merge($allList, $subContentArray);
 }

 // 删除重复条目
 $allList = array_unique($allList);

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
