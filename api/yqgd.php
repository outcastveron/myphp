<?php
$head_httpdvb = 'http://httpdvb.slave.yqdtv.com:13164/playurl';
$head_httpstream = 'http://stream.slave.yqdtv.com:13164/playurl';

header("Content-Type: application/json; charset=utf-8");
error_reporting(0);
$id=isset($_GET['id'])?$_GET['id']:'133';
$bstrURL = 'http://slave.yqdtv.com:13160/account/get_access_token';
$postdata = '{"deviceType":"yuj","deviceno":"C048A58AE8DF52B63F6B81EA94AA4BC18","role":"guest"}';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $bstrURL);	 	 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch, CURLOPT_HTTPHEADER,array('application/vnd.apple.mpegurl'));
	curl_setopt($ch, CURLOPT_USERAGENT, "okhttp/3.9.1" );
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
	$data = curl_exec($ch);
	curl_close($ch);
	preg_match('/"accessToken":"(.*?)"/i',$data,$accessToken); 
    preg_match('/"refreshToken":"(.*?)"/i',$data,$playtoken);

$url = 'http://slave.yqdtv.com:13160/media/channel/get_info?chnlid=4200000'.$id.'&accesstoken='.$accessToken[1];
$result = file_get_contents($url);
$json = json_decode($result);

$start='';
$end='';
$isplayback=false;
if(isset($_GET['start'])&isset($_GET['end'])){
    $start=$_GET['start'];
    $end=$_GET['end'];
    $pf_id=$json->pf_info[0]->id;
    $isplayback=true;
}

if($isplayback){
    $playurl=$head_httpstream.'?playtype=lookback&protocol=hls&starttime='.$start.'&endtime='.$end.'&accesstoken='.$accessToken[1].'&programid='.$pf_id.'&playtoken='.$playtoken[1].'.m3u8';
}else{
    $playurl=$head_httpdvb.'?playtype=live&protocol=hls&accesstoken='.$accessToken[1].'&programid=4200000'.$id.'&playtoken='.$playtoken[1].'.m3u8';
}

header("location: ".$playurl);
?>
