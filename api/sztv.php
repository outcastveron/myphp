<?php
error_reporting(0);
$ts = $_GET['ts'];
if(!$ts){
$id = isset($_GET['id'])?$_GET['id']:'szws';
$n = [
  'szws' => 'AxeFRth',  //深圳卫视
  'szyl' => '1q4iPng',  //深圳娱乐
  'szse' => '1SIQj6s',  //深圳少儿
  'szgg' => '2q76Sw2',  //深圳公共
  'szcjsh' => '3vlcoxP',  //深圳财*生活
  'szdsj' => '4azbkoY',  //深圳电视剧
  'szds' => 'ZwxzUXr',  //深圳都市
  'szgj' => 'sztvgjpd',  //深圳国际
  'szyd' => 'wDF6KJ3',  //深圳移动
  'szdvsh' => 'xO1xQFv',  //深圳DV生活
  'yhgw' => 'BJ5u5k2',  //宜和购物
  'sztyjk' => 'sztvtyjk',  //深圳体育健康
  ];

$t = time();
$token=md5($t.$n[$id].'cutvLiveStream|Dream2017');
$p = file_get_contents("http://cls2.cutv.com/getCutvHlsLiveKey?t=".$t."&token=".$token."&id=".$n[$id]);
$sign = md5('bf9b2cab35a9c38857b82aabf99874aa96b9ffbb/'.$n[$id].'/500/'.$p.'.m3u8'.dechex($t));
$m3u8 = 'https://sztv-live.cutv.com/'.$n[$id].'/500/'.$p.'.m3u8?sign='.$sign.'&t='.dechex($t);
$burl = "https://sztv-live.cutv.com/{$n[$id]}/500/";
header('Content-Type: application/vnd.apple.mpegurl');
print_r(preg_replace("/(.*?.ts)/i","http://".$_SERVER[HTTP_HOST].$_SERVER[PHP_SELF]."?ts=$burl$1",m3u8($m3u8)));
} else {
  $d = ts($ts);
  header('Content-Type: video/MP2T');
  echo $d;
  }

function m3u8($url){
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
   curl_setopt($ch, CURLOPT_HTTPHEADER,["referer: https://www.sztv.com.cn/"]);
   $data = curl_exec($ch);
   curl_close($ch);
   return $data;
   }
function ts($url){
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
   curl_setopt($ch, CURLOPT_HTTPHEADER,["referer: https://www.sztv.com.cn/"]);
   $data = curl_exec($ch);
   curl_close($ch);
   }
?>
