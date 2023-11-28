<?php
//调用：xxx.php?id=whtv1 whtv12 whtv3 whtv4 whtv5 whtv6 whtv7 whjy
$id=$_GET[id];
$ids = array(
"whtv1" => 20,//武汉新闻综合
"whtv2" => 5,//武汉电视剧
"whtv3" => 6,//武汉科教生活
"whtv4" => 7,//武汉经济
"whtv5" => 8,//武汉文体
"whtv6" => 9,//武汉外语
"whtv7" => 2,//武汉少儿
"whjy" => 16;//武汉教育
)
$url = "http://mobile.appwuhan.com/zswh6/channel_detail.php?appkey=rFUm5PYocCj6e1h0m03t3WarVJcMV98c&device_token=d008ce814962ed900bb11429937f472c&channel_id=".$ids[$id];

$microArr = explode(" ",microtime());
$time = ($microArr[1]+round($microArr[0],2))*100;

$random = $time.substr(md5(time()),0,6);
$sign = base64_encode(hash('sha1',"c9e1074f5b3f9fc8ea15d152add07294&S1M1MXczMFhPQXNPZXc0RU1vVWdwV2NRTU9JMmhHMFI=&5.6.0&".$random));
$header = array(
"X-API-TIMESTAMP: $random",
"X-API-SIGNATURE: $sign",
"X-API-VERSION: 5.6.0",
"X-AUTH-TYPE: sha1",
"X-API-KEY: c9e1074f5b3f9fc8ea15d152add07294",
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$data = curl_exec($ch);
curl_close($ch);
$playurl = json_decode($data);
header('Location:'.$playurl[0]->m3u8);
?>
