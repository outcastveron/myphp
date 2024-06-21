<?php
$requestUri = $_SERVER['REQUEST_URI'];//获取当前请求的 URI
$decodedUri = urldecode($requestUri);//URL解码
$req_url = strstr($decodedUri,'http');//提取初始链接
if (!$req_url){
	die("Please add your m3u or txt link to the end of the address compart with '/'.");
}
$req_url = preg_replace('/(https?:\/)([^\/\n])/',"$1/$2",$req_url);
?>
2.host的提取与header的设置
从初始链接提取协议及host部分作为Referer和Origin，自动识别客户端UserAgent，设置headers数组备用。

<?php
preg_match('/https?:\/\/[^\/\n]+/',$req_url,$match_arr1);
$referer = $origin = $match_arr1[0];
$userAgent = $_SERVER['HTTP_USER_AGENT']??'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36';
$headers = [
	"User-Agent: $userAgent",
	"Referer: $referer",
	"Origin: $origin",
	"Accept-Language: en-US,en;q=0.9"
];
?>
3.使用curl发送请求并获取响应
<?php
$ch = curl_init($req_url);//创建curl句柄
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);//跟随重定向
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);//不直接输出
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);//忽略SSL验证
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);//设置httpheader
$response = curl_exec($ch);//发送请求并获取响应
curl_close($ch);//关闭curl句柄
if (curl_error($ch)) {
	echo 'CURL请求失败'.PHP_EOL;
	exit;
}
?>
4.响应内容预处理及列表类型判断
由于有些txt列表无分类，故不能用#genre#作为判断依据

<?php
#响应内容预处理
$response = preg_replace('/\n+/',"\n",$response);//去除连续空白行
$response = preg_replace('/#+/',"#",$response);//去除连续#
#列表类型判断
if (strpos($response,'#EXTM3U')!==false){
	#m3u处理部分
} else if (strpos($response,',')!==false){
	#txt处理部分
} else {
	die("Your file isn't the M3U or txt format list.");
}
exit;
?>
5.m3u转txt
31-32行：如果匹配到的链接在结果中已存在，则跳过。（实现url去重）
34行：如果提取到的分类和上一次的相同，则赋值为空，否则更新分类。（实现txt格式下分类的预生成，注意结尾要换行）
35行：将一行txt数据链接到结果中。（实现m3u每两行数据转一行txt数据，注意结尾要换行）

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
6.txt转m3u
33-34行：如果匹配到分类，则更新分类参数。（实现提取分类标题，注意结尾要换行）
35-36行：如果匹配到链接，但结果中已存在，则跳过。（实现url去重）
38行：如果匹配到链接，但结果中不存在，则链接到结果中。（实现txt中的一行数据转换成m3u的两行数据，注意结尾要换行）

<?php
	#txt处理部分
	$response = str_replace("\n#","\n",$response);//去除行首#
	$response = preg_replace('/([^e])#\n/',"$1\n",$response);//去除行尾#
	#格式化txt
	if (preg_match_all('/.+,.+#.+/',$response,$match_urls)){
		for ($i=0;$i<count($match_urls[0]);$i++){
			preg_match_all('/#/',$match_urls[0][$i],$match_count);
			$counts[] = count($match_count[0]);
		}
		$max_count = max($counts);
		for ($i=0;$i<$max_count;$i++){
			$response = preg_replace('/(.+,)(.+)#(.+)/',"$1$2\n$1$3",$response);
		}
	}
	if (strpos($response,'#genre#')==false){//无分组
		preg_match_all('/(.+),(.+)/',$response,$matches);
		$result = '#EXTM3U'.PHP_EOL;
		for($i=0;$i<count($matches[0]);$i++){
			if (strpos($result,$matches[2][$i])){
				continue;
			} else {
				$result .= '#EXTINF:-1 ,'.$matches[1][$i].PHP_EOL.$matches[2][$i].PHP_EOL;
			}
		}
	} else {//有分组
		#分类去重
		$response = txt_classification_oneness($response);
		#以下实现url去重及转换
		preg_match_all('/(.+),(.+)/',$response,$matches);
		$result = '#EXTM3U'.PHP_EOL;
		for($i=0;$i<count($matches[0]);$i++){
			if ($matches[2][$i] == '#genre#'){
				$classification = $matches[1][$i];
			} else if (strpos($result,$matches[2][$i])){
				continue;
			} else {
				$result .= '#EXTINF:-1 group-title="'.$classification.'",'.$matches[1][$i].PHP_EOL.$matches[2][$i].PHP_EOL;
			}
		}
	}
	echo $result;
?>
7.txt格式下的分类去重
提取每个分类或分类段（均保留最后的换行符，统一格式以便生成结果时没有多余的空行），逐一检查分类是否重复，若重复则将该分类（置空）及分类段移到前面对应的分类段后面。

<?php
function txt_classification_oneness($txt){
	preg_match_all('/.*,#genre#\n|(?:.*,[^#\n]+\n)+/',$txt,$matches_txt);//匹配每个分类或分类段
	$counts_txt = count($matches_txt[0]);
	for ($i=2;$i<$counts_txt-1;$i+=2){//遍历每个分类
		for ($j=0;$j<$i;$j+=2){//检查前面是否已经出现过
			if ($matches_txt[0][$j]==$matches_txt[0][$i]){
				$b = $matches_txt[0][$i+1];
				for ($k=$i;$k>$j+2;$k--){
					$matches_txt[0][$k + 1] = $matches_txt[0][$k - 1];
				}
				$matches_txt[0][$k] = '';
				$matches_txt[0][$k+1] = $b;
			}
		}
	}
	$result = '';
	for ($i=0;$i<$counts_txt;$i++){
		if($matches_txt[0][$i]){
			$result .= $matches_txt[0][$i];
		}
	}
	return $result;
}
?>
