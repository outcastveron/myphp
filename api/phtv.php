<?php
header("Content-Type: text/json; charset=UTF-8");
$id = isset($_GET['id'])?$_GET['id']:'fhzx';
$tv = array(
  'fhzx' => '4',  //資 訊 台
  'fhzw' => '5',  //中 文 台
  'fhhk' => '6',  //香 港 台
  );
$url = 'http://m.fengshows.com/api/v3/live?live_type=tv';
$response = get_data($url);
$channels = json_decode($response);
foreach ($channels as $channel) {
  if($channel->order==$tv[$id]){
    $channelId = $channel->_id;
    break; 
  }    
}
$info = get_url($channelId,'FHD');
if($info->status !== '0'){
  $info = get_url($channelId,'HD');
}
$liveUrl = $info->data->live_url;
header('Location:'.$liveUrl);

function get_url($cid, $qa){
  $url = "https://m.fengshows.com/api/v3/hub/live/auth-url?live_id={$cid}&live_qa={$qa}";
  $response = get_data($url);
  $data = json_decode($response);
  return $data;
}
function get_data($url){
$header=array(
  'fengshows-client: app(ios,5041001);iPhone13,4;17.1.1',
  'User-Agent: FengWatch/5.4.10 (iPhone; iOS 17.1.1; Scale/3.00)',
  'token:eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiIyNGYyY2MxMC04YzUzLTExZWUtYjlhOC04OTZhZTgzOGEwNjUiLCJuYW1lIjoiZnMzMTUzODkiLCJ2aXAiOjAsImp0aSI6IjBPN1RNdllndSIsInJlZ2lzdHJhdGlvbl9pZCI6IjE2MWEzNzk3YzkwMGU5YjQ3MmIiLCJpYXQiOjE3MDEwMDAwOTEsImV4cCI6MTcwMzU5MjA5MX0.v8vbDINjhsUYO-8nyogE-Lz3nbTOR7riQI0QmyinfkY
', 
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}
