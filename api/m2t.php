<?php
	$response = str_replace("#\n#","\n#",$response);//去除行尾#
	$response = preg_replace('/([^\n])#EXTINF/',"$1\n#EXTINF",$response);//#EXTINF自动换行
	#m3u处理部分
	#以下实现格式化m3u中的链接
	if (preg_match_all('/.+#.+/',$response,$match_urls)){//捕获所有需要格式化的项目
		foreach($match_urls[0] as $match_url){//对于匹配到的每一项，统计#的个数
			preg_match_all('/#/',$match_url,$match_count);
			$counts[] = count($match_count[0]);
		}
		$max_count = max($counts);//取含#个数的最大值
		for ($i=0;$i<$max_count;$i++){
			$response = preg_replace('/(#EXTINF.+)\n([^#\n]+)#(.+)/',"$1\n$2\n$1\n$3",$response);//格式化m3u
		}
	}
	#以下实现url去重及转换
	if (strpos($response,'group-title')==false){//无分组
		preg_match_all('/#EXTINF.+,(.+)\n([^\n#]+)/',$response,$matches);
		$result = '';
		for ($i=0;$i<count($matches[1]);$i++){
			if (strpos($result,$matches[2][$i])){//url已存在则去重
				continue;
			} else {
				$result .= $matches[1][$i].','.$matches[2][$i].PHP_EOL;
			}
		}
	} else {//有分组
		preg_match_all('/#EXTINF.+group-title="(.+)",(.+)\n([^\n#]+)/',$response,$matches);
		$result = $matches[1][0].',#genre#'.PHP_EOL.$matches[2][0].','.$matches[3][0].PHP_EOL;
		for ($i=1;$i<count($matches[1]);$i++){
			if (strpos($result,$matches[3][$i])){//url已存在则去重
				continue;
			} else {
				$group = ($matches[1][$i] == $matches[1][$i-1])?'':$matches[1][$i].',#genre#'.PHP_EOL;//分组处理
				$result .= $group.$matches[2][$i].','.$matches[3][$i].PHP_EOL;
			}
		}
		$result = txt_classification_oneness($result);//分类去重
	}
	echo $result;
?>
