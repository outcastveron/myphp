<?php
$id = $_GET['id'] ? $_GET['id'] : '8k';
$ids = array(
    "8k" => ["24",""],//纪实科教8K
    "ws" => ["3","573ib1kp5nk92irinpumbo9krlb","bjws"],//北京卫视
    "kj" => ["5","53bn9rlalq08lmb8nf8iadoph0b","btvkj"],//北京纪实科教
    "ys" => ["6","50mqo8t4n4e8gtarqr3orj9l93v","btvys"],//北京影视
    "cj" => ["7","50e335k9dq488lb7jo44olp71f5","btvcj"],//北京财经
    "se" => ["12","55skfjq618b9kcq9tfjr5qllb7r","kaku"],//卡酷少儿
    "wy" => ["13","54db6gi5vfj8r8q1e6r89imd64s","btvwy"],//北京文艺
    "sh" => ["14","50j015rjrei9vmp3h8upblr41jf","btvsh"],//北京生活
    "xw" => ["15","53gpt1ephlp86eor6ahtkg5b2hf","btvxw"],//北京新闻
    "ty" => ["","54hv0f3pq079d4oiil2k12dkvsc","bjjs"],//北京体育休闲
    "wyfm" => ["17",""],//北京文艺广播
    "tyfm" => ["18",""],//北京体育广播
    "yyfm" => ["19",""],//北京音乐广播
    "jtfm" => ["20",""],//北京交通广播
    "xwfm" => ["26",""],//北京新闻广播
    "csfm" => ["28",""],//北京城市广播
    "jjyzs" => ["31",""],//京津冀之声
);
$site = [
    'https://btv8kappvms.interway.com.cn/tvradio/tv/tvlist?index=1',
    'https://btv8kappvms.interway.com.cn/tvradio/tv/index?index=1',
];
if(!empty($ids[$id][0])){
    $mid = $ids[$id][0];
}
if($mid) {
    foreach ($site as $url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        $data = curl_exec($ch);
        curl_close($ch);
        $list = json_decode($data)->data->list;
        foreach ($list as $tion) {
            if($tion->tv_id == $mid && strpos($tion->m3u8, 'brtvcloud') !== false){
                $bsurl = str_replace('https', 'http', $tion->m3u8);
                break;
            }
        }
        if($bsurl) {    
            break;
        }
    }
}
if($bsurl){
    $ipFile = 'brtv_ip.json';
    if (file_exists($ipFile)) {
        $ipCollection = json_decode(file_get_contents($ipFile), true);
    }else{
        $ipCollection = [
        'back' => [],
        'pk' => 0,
        'tech' => [],
        ];
    }
// 此处进行IP添加,PHP自动更新。
    $newIpCollection = [
    "61.170.74.13", "61.170.88.22", "61.170.88.15", "61.170.88.57", "61.170.88.45", "61.170.88.187", "43.152.2.211", "43.152.3.186", "43.152.14.144", "43.152.23.47", "43.152.23.110", "43.152.23.183", "43.152.23.119", "43.152.25.106", "43.152.25.170", "43.152.25.196", "43.152.25.220", "43.152.42.168", "43.152.42.170", "122.188.37.60", "122.188.37.82", "122.188.37.79", "122.188.37.75", "122.188.37.65", "122.188.37.89", "122.188.37.71", "122.188.37.123", "122.188.37.74", "122.188.37.107", "122.188.37.55", "122.188.37.198", "122.188.37.215", "122.188.37.217", "122.188.37.226", "122.188.37.224", "122.188.37.237", "122.188.37.246", "122.188.37.254", "122.188.38.27", "122.188.38.66", "122.188.38.87", "122.188.38.129", "122.188.38.130", "122.188.38.134", "122.188.38.151", "122.188.38.237", "122.188.38.238", "58.216.17.187", "58.216.17.145", "58.216.17.24", "58.216.17.49", "58.216.17.155", "58.216.17.28", "58.216.17.180", "58.216.17.129", "58.216.17.184", "58.216.22.123", "58.216.22.150", "58.216.22.102", "60.221.17.60", "60.221.17.64", "60.221.17.115", "60.221.17.120", "60.221.17.122", "60.221.17.114", "60.221.17.139", "60.221.17.191", "60.221.17.198", "60.221.17.199", "60.221.17.204", "60.221.17.215", "60.221.17.229", "182.247.250.254", "182.247.251.166", "182.247.251.83", "182.247.251.180", "182.247.251.164", "182.247.251.163", "122.228.82.131", "122.228.82.138", "122.228.82.130", "36.159.70.149", "36.159.70.176", "36.159.70.177", "36.159.70.235", "36.159.70.165", "183.204.1.208", "183.204.12.41", "183.204.12.143", "183.204.12.144", "183.204.12.17", "183.204.12.11", "183.204.12.36", "183.204.12.145", "183.204.12.159", "183.204.12.147", "183.204.12.49", "183.204.12.149", "183.204.12.79", "183.204.12.24", "183.204.12.22", "183.204.12.26", "183.204.12.163", "183.204.12.31", "183.204.12.42", "183.204.12.160", "183.204.12.216", "183.204.13.13", "183.204.13.16", "183.204.13.84", "183.204.13.97", "183.204.13.150", "183.204.13.170", "183.204.13.185", "183.204.13.131", "183.204.13.237", "1.180.234.132", "1.180.234.164", "1.180.234.172", "1.180.234.197", "1.180.234.228", "1.180.234.225", "1.180.234.235", "1.180.234.227", "1.180.234.154", "1.180.234.202", "1.180.234.161", "1.180.234.163", "1.180.234.229", "1.180.234.173", "1.180.234.182", "1.180.234.211", "1.180.234.134", "1.180.234.140", "1.180.234.143", "1.180.234.152", "1.180.234.232", "1.180.234.238", "113.219.183.178", "113.219.183.108", "113.219.183.198", "113.219.183.175", "223.111.191.44", "223.111.191.107", "223.111.191.91", "223.111.191.34", "223.111.191.36", "223.111.191.96", "223.111.191.27", "223.111.191.28", "223.111.191.73", "223.111.191.127", "101.33.21.154", "101.33.21.146", "42.236.89.81", "42.236.89.17", "42.236.89.99", "42.236.89.82", "42.236.89.87", "42.236.89.21", "42.236.89.29", "42.236.89.23", "42.236.89.100", "42.236.89.31", "42.236.89.6", "42.236.89.16", "42.236.89.95", "42.236.89.158", "42.236.89.148", "43.141.9.75", "43.141.50.20", "43.141.51.77", "43.141.52.157", "43.141.130.51", "43.141.130.33", "111.31.106.140", "111.31.107.79", "111.31.107.123", "111.31.107.157", "111.31.107.178", "111.31.123.245",
    ];
    $ipdiff = array_diff($newIpCollection, $ipCollection['back']);
    if (count($ipdiff) > 0) {
        $ipCollection['back'] = array_unique(array_merge($ipCollection['back'], $newIpCollection), SORT_REGULAR);
        $ipCollection['tech'] = array_merge($ipCollection['tech'], $ipdiff);
        $change = 1;   
    }
    if (!empty($ipCollection['tech'])) {
        $tech = $ipCollection['tech'];
        shuffle($tech);
        foreach ($tech as $ip){
            $host = parse_url($bsurl)["host"];
            $m3u8 = str_replace($host, $ip.'/'.$host, $bsurl);
            if (isIpValid($m3u8)) {
                $playurl = $m3u8;
                break;
            } else {
                $num++;
                unset($ipCollection['tech'][array_search($ip, $ipCollection['tech'])]);
                $ipCollection['tech'] = array_values($ipCollection['tech']);
                $change = 1;
                if($num >= 3) {
                    $change = 0;
                    break;
                }   
            }
        }    
        if($change == 1) {
            file_put_contents($ipFile, json_encode($ipCollection));
        }
        if($playurl){
            header('Location: ' . $playurl);
            exit;
        }                
    }
}
if(!empty($ids[$id][1]) && (!$bsurl || !$playurl)){
    $type = date('m') % 2;
    $time = time();
    $gid = $ids[$id][1];
    switch ($type) {
        case 0:
            $apiurl = 'https://app.api.btime.com/video/play?';
            $push_id = md5($time.$ids[$id][2]);
            $path = 'browse_mode=1&channel=btimeapp&gid='.$gid.'&id='.$gid.'&net=WIFI&os=LMY49I&os_type=Android&os_ver=22&protocol=2&push_id='.$push_id.'&timestamp='.$time.'&token='.$push_id.'&ver=80000';
            $sign = md5(urldecode($path).'shi!@#$%^&*[xian!@#]*');
            $appurl = $apiurl.$path.'&sign='.substr($sign,3,7);
            $json = get_data($appurl);
            $playurl = str_replace('https', 'http', $json->data->video_stream[0]->stream_url);
        break;
        default:
            $type_id = "151";
            $salt = 'TtJSg@2g*$K4PjUH';
            $sign = substr(md5("{$gid}{$type_id}{$time}{$salt}"),0,8);
            $pcurl = "https://pc.api.btime.com/video/play?from=pc&id={$gid}&type_id={$type_id}&timestamp={$time}&sign={$sign}";
            $json = get_data($pcurl, true);
            $playurl = base64_decode(base64_decode(strrev($json->data->video_stream[0]->stream_url)));
        break;
    }
    header("location:". $playurl);
    exit;
} 
function isIpValid($url) {
    $header = array(
        'User-Agent:Mozilla/5.0 (Windows NT 10.0; Win64) AppleWebKit/536.26 (KHTML, like Gecko)  Chrome/86.0.3282.186 Safari/537.36', 
        );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $data = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return ($httpCode >= 200 && $httpCode <= 302);
}
function get_data($newurl, $opt=null) {
    $header = array(
        'referer: https://www.btime.com/',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36',  
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $newurl);                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    if(!empty($opt)){
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    } else {
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: okhttp/3.9.1'));
    }
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
    $data = curl_exec($ch);
    curl_close($ch);
    $json = json_decode($data);
    return $json;
}
