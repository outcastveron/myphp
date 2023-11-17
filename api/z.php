<?php
/*
//.m3u格式(含带分组，epg，台标等格式)转化为.txt格式
//.txt格式转化为.m3u普通格式
  使用方法:  1  需转化的.m3u文件，后缀更改为m3u.txt，上传服务器，
                 然后在浏览器中以"http://自已服务器/M3U.php"打开即可全选复制保存使用
              2  需转化的.txt文件上传至服务器，重命名为m3u.txt。           
*/
header("Content-Type:text/html; charset=utf-8");
$info=file_get_contents('./m3u.txt');//"m3u"文件名可设置成变量
if(preg_match("/(EXTINF)/",$info))
{
$e = str_replace("\n","@",$info);
preg_match_all('|,(.*?)@(.*?)@|i',$e,$m);
for($a=0;$a<500;$a++){  //$a最大值根据需要可修改
if($m[1][$a]==null){echo"";}else{
print_r ("<br>".$m[1][$a].",".$m[2][$a]);
}}}
else{
print_r ("#EXTM3U");
$k = preg_split("/[,]/", "$info");
$e = str_replace("\n","<br>#EXTINF:-1 @",$info);
$e = str_replace(",","<br>",$e);
$e = str_replace("@",",",$e);
$e = str_replace("$k[0]","#EXTINF:-1 ,$k[0]",$e);//解决第一组
$e = str_replace("#EXTINF:-1 ,<br>","",$e);
print_r ("<br>".$e);
}
?>
