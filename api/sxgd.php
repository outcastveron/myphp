<?php
$n = array('zh' => 1, 'sh' => 2);
$id = isset($_GET['id']) ? $_GET['id'] : 'zh';
if (array_key_exists($id, $n)) {
    $url = 'http://www.3xgd.com/live/' . $n[$id] . '.html';
    $context = stream_context_create([
        'http' => [
            'header' => 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
        ]
    ]);
    $html = @file_get_contents($url, false, $context);
    if ($html !== false) {
        preg_match('/source:\'(.*?)\'/', $html, $matches);

        if (isset($matches[1])) {
            $source = $matches[1];
            header('Content-Type: application/vnd.apple.mpegurl');
            header("Content-Disposition: attachment; filename=angtv.m3u8");
            echo "#EXTM3U\n";
            echo "#EXT-X-VERSION:3\n";
            echo "#EXT-X-STREAM-INF:BANDWIDTH=800000,RESOLUTION=640x360\n";
            echo $source;
        }
    }
}
?>
