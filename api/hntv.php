<?php
    // 大象新闻
    $id = isset($_GET['id'])?$_GET['id']:'gxpd';
    $n = [
         'hnws' => 145,//河南卫视
         'hnds' => 141,//河南都市
         'hnms' => 146,//河南民生
         'hmfz' => 147,//河南法治
         'hndsj' => 148,//河南电视剧
         'hnxw' => 149,//河南新闻
         'htgw' => 150,//欢腾购物
         'hngg' => 151,//河南公共
         'hnxc' => 152,//河南乡村
         'hngj' => 153,//河南国际
         'hnly' => 154,//河南梨园
         'wwbk' => 155,//文物宝库
         'wspd' => 156,//武术世界
         'jczy' => 157,//睛彩中原
         'ydxj' => 163,//移动戏曲
         'xsj' => 183,//象视界
         'gxpd' => 194,//国学频道
         ];
    $url = "https://pubmod.hntv.tv/program/getAuth/util/getPublicKeyAndRandom";
    $ts = time();
    $sign = hash('sha256', '6ca114a836ac7d73'.$ts);
    $h = ['timestamp: ' .$ts,'sign: '.$sign];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
    $data = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($data);
    $rnd = $json->random;
    $pubkey = "-----BEGIN PUBLIC KEY-----\n".wordwrap($json->publicKey,64,"\n",true)."\n-----END PUBLIC KEY-----";
    $uri = "https://pubmod.hntv.tv/program/getAuth/clientlive/getClientLiveByClassId";
    $data = "classId=11";
    openssl_public_encrypt($data,$enc_data,$pubkey);
    $data = ["version" => "version.0.0.1","random" => $rnd,"data" => base64_encode($enc_data)];
    $post = json_encode($data);
    $h[] = 'Content-Type: application/json';

    $ch = curl_init($uri);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
    curl_setopt($ch, CURLOPT_POST,TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
    $data = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($data);
    foreach($json as $lst){
        if($lst -> cid == $n[$id]) $playurl = $lst -> video_streams[0];
        }
    header("location:".$playurl);
    //echo $playurl;
?>
