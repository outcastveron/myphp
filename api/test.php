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

// 已订阅的节点列表
$subscribedList = [];

try {
    $allList = [];

    foreach ($subUrlList as $url) {
        $subString = fetchContent($url);
        $subContent = base64_decode(trim($subString));

        // 将订阅节点解析成数组
        $nodes = explode("\n", $subContent);

        // 去重
        foreach ($nodes as $node) {
            // 解析节点信息
            $info = parseNode($node);

            // 判断节点是否已订阅
            $key = $info['ip'] . ':' . $info['port'];
            if (!in_array($key, $subscribedList)) {
                $subscribedList[] = $key;
                $allList[] = $node;
            }
        }
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

function parseNode($node) {
    $info = [];

    // 分割节点信息
    $parts = explode(':', $node);

    // 获取 IP 地址
    $info['ip'] = $parts[0];

    // 获取端口
    $info['port'] = $parts[1];

    // 获取其他信息 (可选)
    if (isset($parts[2])) {
        $info['other'] = $parts[2];
    }

    return $info;
}
