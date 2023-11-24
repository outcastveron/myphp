<?php
$id = $_GET['id']??'bjws';
$n = [
    'bjws' => '573ib1kp5nk92irinpumbo9krlb',  //北京卫视
    'bjwy' => '54db6gi5vfj8r8q1e6r89imd64s',  //BRTV文艺
    'bjjs' => '53bn9rlalq08lmb8nf8iadoph0b',  //BRTV纪实科教
    'bjys' => '50mqo8t4n4e8gtarqr3orj9l93v',  //BRTV影视
    'bjcj' => '50e335k9dq488lb7jo44olp71f5',  //BRTV财*
    'bjty' => '54hv0f3pq079d4oiil2k12dkvsc',  //BRTV体育休闲
    'bjsh' => '50j015rjrei9vmp3h8upblr41jf',  //BRTV生活
    'bjxw' => '53gpt1ephlp86eor6ahtkg5b2hf',  //BRTV新闻
    'bjkk' => '55skfjq618b9kcq9tfjr5qllb7r',  //卡酷少儿
];
$t=time();
$s=substr(md5($n[$id]."151".$t.'TtJSg@2g*$K4PjUH'),0,8);
$res = file_get_contents("https://pc.api.btime.com/video/play?from=pc&callback=&id=".$n[$id]."&type_id=151&timestamp=".$t."&sign=".$s);
$stream_url = json_decode($res)->data->video_stream[0]->stream_url;
$playurl = base64_decode(base64_decode(strrev($stream_url)));
//print_r($playurl);
header('location:'.$playurl);
?>
