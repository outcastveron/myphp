<?php
header('Content-Type: text/json;charset=UTF-8');
$sTvList = file_get_contents("TVBOX/通用格式地址);

$sMsu = "#EXTM3U\r\n";
$vTvlist = preg_split("/\n/",$sTvList);
$lUrlList = array();
$sGroupName = "";
foreach ($vTvlist as $value) 
{
    
    if(empty($value))
    {
        continue;
    }
    if(strpos($value,'http')!==false)
    {
        //url
        $sTvname = preg_split("/,/",$value);
        $lUrlList[$sGroupName][$sTvname[0]][] = $sTvname[1];
    }else{
        //是组号
        if(strpos($value,'genre')==false)
        {
            continue;
        }
        $sGroupName  = preg_split("/,/",$value)[0];
        $lUrlList[$sGroupName] = array();
    }
}

foreach ($lUrlList as $sGroupName => $aGroupList) 
{
    foreach ($aGroupList as $sTvname => $aTvlist) 
    {
        foreach ($aTvlist as $sTvurl) 
        {
            $sMsu .= '#EXTINF:-1 group-title=" ' .$sGroupName .'",' . $sTvname . PHP_EOL . $sTvurl . PHP_EOL;
        }
    }
}
echo($sMsu);
?>
