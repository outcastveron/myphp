<?php
$fmt = isset($_GET['fmt']) ? $_GET['fmt'] : 'hls';
$id = isset($_GET['id']) ? $_GET['id'] : 'xmws';
$dom = array('http://mapi.hldbtv.com/', 'http://mapi.dtradio.com.cn/', 'http://zhibo.ijntv.cn/', 'http://mapi.ahtv.cn/', 'http://www.nxtv.com.cn/', 'http://mapi1.kxm.xmtv.cn/', 'https://mapi.m2oplus.nmtv.cn/', 'http://www.hnntv.cn/', 'http://mapi.0561rtv.cn/', 'http://mapi.chinashishi.net/', 'https://www.lztv.tv/', 'https://www.gsqytv.com.cn/', 'http://mapi.zunyifb.com/', 'https://mapi.wzrtv.cn/', 'http://www.sjzntv.cn/', 'http://www.bdgdw.com/', 'http://mapi.zztv.tv/', 'http://mapi.jmtv.com.cn/', 'http://www.21ytv.com/', 'https://mapi.ngcz.tv/', 'https://mobile.kan0512.com/', 'https://www.0515yc.cn/', 'https://mapi.huaihai.tv/', 'http://mapi.habctv.com/', 'http://mobile.appwuhan.com/', 'http://v2.thmz.com/', 'http://www.mytaizhou.net/', 'http://www.jlntv.cn/', 'http://mobile.jzgbdst.cn/', 'http://www.cfrtv.cn/', 'https://plusmapi.wrbtv.cn/', 'http://mapi.cfrtv.cn/', 'http://www.hshan.com/', 'http://mapi.rzw.com.cn/', 'http://www.wfcmw.cn/', 'https://mapi.cbbn.net/', 'http://www.sxsztv.com/', 'https://mapi.scmstv.cn/', 'http://mapi.zyrb.com.cn/', 'https://mapi.hoolo.tv/', 'http://hdd-api.jiaxingren.com/', 'http://mapi.wzqmt.com/', 'http://mapi.yingxi.tv/', 'http://v.fjtv.net/', 'http://mapi.ptbtv.com/', 'https://mapi.kangbatv.com/', 'http://mapi.pznews.com/', 'http://www.tsbtv.tv/');
$ref = array('', '', '', '', '', 'https://kxmapp.mapi1.kxm.xmtv.cn/', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://live.fjtv.net/', '', '', '', '');
$n = array(//[dom_id,api_id,ch_id,isrefer]
    'jlws' => [27,1,'9',false], //吉林卫视
    'jlwshd' => [27,1,'288',false], //吉林卫视高清
    'jlwshd1' => [27,1,'337',false], //吉林卫视高清
    'jlds' => [27,1,'33',false], //吉林都市
    'jldshd' => [27,1,'317',false], //吉林都市高清
    'jlsh' => [27,1,'11',false], //吉林生活
    'jlys' => [27,1,'12',false], //吉林影视
    'jlggxw' => [27,1,'35',false], //吉林公共新闻
    'jlzywh' => [27,1,'13',false], //吉林综艺文化
    'jlxc' => [27,1,'34',false], //吉林乡村
    'jldbxq' => [27,1,'37',false], //吉林东北戏曲
    'jldbxqhd' => [27,1,'319',false], //吉林东北戏曲
    'jljygw' => [27,1,'14',false], //家有购物 吉林
    'jlsp1' => [27,1,'75',false], //四平新闻综合 吉林
    'jllyxw' => [27,1,'27',false], //辽源新闻综合 吉林
    'jlthxw' => [27,1,'28',false], //通化新闻综合 吉林
    'jlbsxw' => [27,1,'68',false], //白山新闻综合 吉林
    'jlbsgg' => [27,1,'261',false], //白山公共 吉林
    'jlsyzh' => [27,1,'76',false], //松原新闻综合 吉林
    'jlsygg' => [27,1,'226',false], //松原公共 吉林
    'jlbcxw' => [27,1,'31',false], //白城新闻综合 吉林
    'jlcbs' => [27,1,'259',false], //长白山 吉林
    'jlthja' => [27,1,'84',false], //集安综合 吉林
    'jlccna' => [27,1,'94',false], //农安综合 吉林
    'jlthmhk' => [27,1,'136',false], //梅河口 吉林
    'jlthlh' => [27,1,'142',false], //柳河综合 吉林
    'jljlps' => [27,1,'144',false], //磐石 吉林
    'jlybwq' => [27,1,'148',false], //汪清 吉林
    'jlspsl' => [27,1,'150',false], //双辽 吉林
    'jlthhn' => [27,1,'156',false], //辉南新闻综合 吉林
    'jllydf' => [27,1,'164',false], //东丰综合 吉林
    'jlthth' => [27,1,'168',false], //通化县 吉林
    'jlspyt' => [27,1,'172',false], //伊通综合 吉林
    'jlspls' => [27,1,'180',false], //梨树新闻 吉林
    'jlgzl' => [27,1,'184',false], //公主岭综合 吉林
    'jlybtm' => [27,1,'188',false], //图们1 吉林
    'jlbcty' => [27,1,'190',false], //通榆 吉林
    'jlbcda' => [27,1,'192',false], //大安 吉林
    'jlbczl' => [27,1,'194',false], //镇赉综合 吉林
    'jlsyfy' => [27,1,'196',false], //扶余 吉林
    'jlsyqa' => [27,1,'198',false], //乾安综合 吉林
    'jlybyj' => [27,1,'215',false], //延吉 吉林
    'jlbctn' => [27,1,'223',false], //洮南 吉林
    'jlbsfs' => [27,1,'228',false], //抚松综合 吉林
    'jljlsl' => [27,1,'232',false], //舒兰新闻综合 吉林
    'jlbslj' => [27,1,'238',false], //临江 吉林
    'jlbsjy' => [27,1,'242',false], //靖宇综合 吉林
    'jlybdh' => [27,1,'246',false], //敦化 吉林
    'jlyblj' => [27,1,'251',false], //龙井 吉林
    'jlybhc' => [27,1,'255',false], //珲春 吉林
    'jljlhd' => [27,1,'270',false], //桦甸综合 吉林
    'jlbsjy1' => [27,1,'274',false], //江源 吉林
    'jlccjt' => [27,1,'282',false], //九台 吉林
    'jlccdh' => [27,1,'329',false], //德惠综合 吉林
    'jlccsy' => [27,1,'331',false], //双阳综合 吉林
    'jzxwzh' => [28,5,'2',false], //锦州新闻综合 辽宁
    'jzjy' => [28,5,'3',false], //锦州教育 辽宁
    'jzgg' => [28,5,'4',false], //锦州公共 辽宁
    'hldxwzh' => [0,0,'12',false], //葫芦岛新闻综合 辽宁
    'hldgg' => [0,0,'13',false], //葫芦岛公共 辽宁
    'dtxwzh' => [1,0,'16',false], //大同新闻综合 山西
    'dtgg' => [1,0,'8',false], //大同公共 山西
    'dtmdsh' => [1,0,'9',false], //大同煤都生活 山西
    'sxsztv1' => [36,1,'4',false], //朔州1 山西
    'sxsztv2' => [36,1,'5',false], //朔州2 山西
    'wnxwzh' => [32,1,'3',false], //渭南新闻综合 陕西
    'wngg' => [32,1,'4',false], //渭南公共 陕西
    "rzxwzh" => [33,0,"6",false],//日照新闻综合 山东
    "rzgg" => [33,0,"13",false],//日照公共 山东
    "rzkj" => [33,0,"12",false],//日照科教 山东
    "rzfc" => [33,0,"14",false],//日照房车 山东
    "wftv1" => [34,1,"4",false],//潍坊新闻综合 山东
    "wftv2" => [34,1,"3",false],//潍坊农业 山东
    "wftv3" => [34,1,"8",false],//潍坊公共 山东
    "wftv4" => [34,1,"7",false],//潍坊科教 山东
    "sdzbxw" => [35,0,"5",false],//淄博新闻 山东
    "sdzbds" => [35,0,"41",false],//淄博都市 山东
    "sdzbkj" => [35,0,"39",false],//淄博科教 山东
    "sdzbsh" => [35,0,"9",false],//淄博生活 山东
    "sdzbgg" => [35,0,"37",false],//淄博公共 山东
    "ahws" => [3,0,"47",false],//安徽卫视
    "ahys" => [3,0,"72",false],//安徽影视
    "ahjjsh" => [3,0,"71",false],//安徽经济生活
    "ahzyty" => [3,0,"73",false],//安徽综艺体育
    "ahnykj" => [3,0,"51",false],//安徽农业科教
    "ahgg" => [3,0,"50",false],//安徽公共
    "ahgj" => [3,0,"70",false],//安徽国际
    "ahyd" => [3,0,"68",false],//安徽移动
    "jcah" => [3,0,"85",false],//睛彩安徽
    "ahhbxw" => [8,0,"4",false],//淮北新闻综合 安徽
    "ahhbgg" => [8,0,"6",false],//淮北公共 安徽
    "ahhbjy" => [8,0,"5",false],//淮北教育 安徽
    'xmws' => [5,0,'84',true],//厦门卫视 福建
    'xmtv1' => [5,0,'16',true],//厦门1 福建
    'xmtv2' => [5,0,'17',true],//厦门2 福建
    'xmyd' => [5,0,'52',true],//厦门移动 福建
    'fjptxw' => [44,0,'4',false],//莆田新闻综合 福建
    'fjpt2' => [44,0,'5',false],//莆田2 福建
    'fjptxy' => [44,0,'6',false],//莆田仙游 福建
    'qzsstv' => [9,0,'12',false],//石狮 福建
    'nmgws' => [6,0,'161',false],//内蒙古卫视
    'nmgxwzh' => [6,0,'162',false],//内蒙古新闻综合
    'nmgmyws' => [6,0,'164',false],//内蒙古蒙语卫视
    'nmgmywh' => [6,0,'163',false],//内蒙古蒙语文化
    'nmgse' => [6,0,'165',false],//内蒙古少儿
    'nmgwtyl' => [6,0,'166',false],//内蒙古文体娱乐
    'nmgnm' => [6,0,'167',false],//内蒙古农牧
    'nmgjjsh' => [6,0,'168',false],//内蒙古经济生活
    'nmgsjgw' => [6,0,'153',false],//内蒙古三佳购物
    'cfxwzh' => [29,1,'1',false],//赤峰新闻综合 内蒙古
    'cfjjfw' => [29,1,'3',false],//赤峰经济服务 内蒙古
    'cfysyl' => [29,1,'2',false],//赤峰影视娱乐 内蒙古
    'wlcbxw' => [30,0,'25',false],//乌兰察布新闻综合 内蒙古
    'wlcbjj' => [30,0,'7',false],//乌兰察布经济生活 内蒙古
    'wlcbsh' => [30,0,'8',false],//乌兰察布生活 内蒙古
    'cfahzh' => [31,0,'16',false],//敖汉综合 内蒙古
    'cfaqhy' => [31,0,'22',false],//阿旗汉语 内蒙古
    'cfaqmy' => [31,0,'28',false],//阿旗蒙语 内蒙古
    'cfkaqi' => [31,0,'7',false],//喀旗 内蒙古
    'cfkeqi' => [31,0,'20',false],//克旗 内蒙古
    'cfnczh' => [31,0,'4',false],//宁城综合 内蒙古
    'cfsstv' => [31,0,'12',false],//松山 内蒙古
    'cfwnt' => [31,0,'18',false],//翁旗 内蒙古
    'cfblzq' => [31,0,'24',false],//巴林左旗 内蒙古
    'cfybs' => [31,0,'14',false],//元宝山 内蒙古
    'haiws' => [7,2,'19',false],//海南卫视
    'ssws' => [7,2,'7',false],//三沙卫视 海南
    'haijj' => [7,2,'4',false],//海南经济
    'haixw' => [7,2,'5',false],//海南新闻
    'haigg' => [7,2,'6',false],//海南公共
    'haiwl' => [7,2,'8',false],//海南文旅
    'haise' => [7,2,'9',false],//海南少儿
    'gslzxw' => [10,1,'1',false],//兰州新闻综合 甘肃
    'gslzsh' => [10,1,'16',false],//兰州生活经济 甘肃
    'gslzwl' => [10,1,'17',false],//兰州文旅 甘肃
    'gsqyzh' => [11,1,'24',false],//庆阳综合 甘肃
    'gsqygg' => [11,1,'25',false],//庆阳公共 甘肃
    'gzzyzh' => [12,0,'4',false],//遵义综合 贵州
    'gzzygg' => [12,0,'5',false],//遵义公共 贵州
    'gzzyds' => [12,0,'7',false],//遵义都市 贵州
    'sckbws' => [45,0,'17',false],//康巴卫视 四川
    'scmszh' => [37,0,'8',false],//眉山综合 四川
    'scmsgg' => [37,0,'9',false],//眉山公共 四川
    'sczyxw' => [38,0,'137',false],//资阳新闻综合 四川
    'sczyyj' => [38,0,'138',false],//资阳雁江 四川
    'gdtaishan' => [47,2,'2',false],//台山 广东
    'gxwzxw' => [13,0,'22',false],//梧州新闻综合 广西
    'gxwzgg' => [13,0,'23',false],//梧州公共 广西
    'gxwzjy' => [13,0,'15',false],//梧州教育生活 广西
    'hesjzxw' => [14,1,'2',false],//石家庄新闻综合 河北
    'hesjzyl' => [14,1,'3',false],//石家庄娱乐 河北
    'hesjzsh' => [14,1,'4',false],//石家庄生活 河北
    'hesjzds' => [14,1,'5',false],//石家庄都市 河北
    'hebdxw' => [15,1,'1',false],//保定新闻综合 河北
    'hebdgg' => [15,1,'2',false],//保定公共 河北
    'hebdsh' => [15,1,'3',false],//保定生活健康 河北
    'hazzxw' => [16,0,'10',false],//郑州新闻综合 河南
    'hazzsd' => [16,0,'11',false],//郑州商都 河南
    'hazzwt' => [16,0,'12',false],//郑州文体旅游 河南
    'hazzys' => [16,0,'13',false],//郑州影视戏曲 河南
    'hazzfn' => [16,0,'14',false],//郑州妇女儿童 河南
    'hazzds' => [16,0,'15',false],//郑州都市生活 河南
    'hbws' => [24,3,'17',false],//湖北卫视（武汉线路）
    'hbwhxw' => [24,3,'20',false],//武汉新闻综合 湖北
    'hbwhdsj' => [24,3,'5',false],//武汉电视剧 湖北
    'hbwhkj' => [24,3,'6',false],//武汉科技生活 湖北
    'hbwhjj' => [24,3,'7',false],//武汉经济 湖北
    'hbwhwt' => [24,3,'8',false],//武汉文体 湖北
    'hbwhwy' => [24,3,'9',false],//武汉外语 湖北
    'hbwhse' => [24,3,'2',false],//武汉少儿 湖北
    'hbwhjy' => [24,3,'16',false],//武汉教育 湖北
    'hbjmxw' => [17,0,'4',false],//荆门新闻 湖北
    'hbjmjy' => [17,0,'7',false],//荆门教育 湖北
    'hnyzxw' => [18,7,'58',false],//永州新闻综合 湖南
    'hnyzgg' => [18,7,'40',false],//永州公共 湖南
    'hnczxw' => [19,0,'25',false],//郴州新闻综合 湖南
    'hnczgg' => [19,0,'21',false],//郴州公共 湖南
    'hnczcctv1' => [19,0,'23',false],//CCTV1（郴州线路）
    'jsszxwzh' => [20,4,'60',false],//苏州新闻综合 江苏
    'jsszshjj' => [20,4,'51',false],//苏州社会经济 江苏
    'jsszwhsh' => [20,4,'52',false],//苏州文化生活 江苏
    'jsszshzx' => [20,4,'53',false],//苏州生活资讯 江苏
    'jsyc1' => [21,2,'1',false],//盐城新闻综合 江苏
    'jsyc2' => [21,2,'2',false],//盐城法制生活 江苏
    'jsyc3' => [21,2,'3',false],//盐城城市公共 江苏
    'jsxz1' => [22,0,'46',false],//徐州1 江苏
    'jsxz2' => [22,0,'47',false],//徐州2 江苏
    'jsxz3' => [22,0,'48',false],//徐州3 江苏
    'jsxz4' => [22,0,'49',false],//徐州4 江苏
    'jshazh' => [23,0,'17',false],//淮安综合 江苏
    'jshagg' => [23,0,'18',false],//淮安公共 江苏
    'jshays' => [23,0,'19',false],//淮安影视娱乐 江苏
    'jswxxw' => [25,1,'2',false],//无锡新闻综合 江苏
    'jswxyl' => [25,1,'3',false],//无锡娱乐 江苏
    'jswxds' => [25,1,'4',false],//无锡都市资讯 江苏
    'jswxsh' => [25,1,'5',false],//无锡生活 江苏
    'jswxjj' => [25,1,'6',false],//无锡经济 江苏
    'jstz1' => [26,1,'5',false],//泰州1 江苏
    'jstz2' => [26,1,'6',false],//泰州2 江苏
    'jstz3' => [26,1,'7',false],//泰州3 江苏
    'jspzzh' => [46,0,'7',false],//邳州综合 江苏
    'hzzh' => [39,0,'16',false],//杭州综合 浙江
    'hzmz' => [39,0,'17',false],//杭州明珠 浙江
    'hzsh' => [39,0,'18',false],//杭州生活 浙江
    'hzys' => [39,0,'21',false],//杭州影视 浙江
    'hzse' => [39,0,'20',false],//杭州少儿体育 浙江
    'hzds' => [39,0,'22',false],//杭州导视 浙江
    'zjjxxw' => [40,6,'11',false],//嘉兴新闻综合 浙江
    'zjjxgg' => [40,6,'14',false],//嘉兴公共 浙江
    'zjjxwh' => [40,6,'12',false],//嘉兴文化影视 浙江
    'wzxwzh' => [41,0,'4',false],//温州新闻综合 浙江
    'wzjjkj' => [41,0,'5',false],//温州经济科教 浙江
    'wzdssh' => [41,0,'6',false],//温州都市生活 浙江
    'wzgg' => [41,0,'7',false],//温州公共 浙江
    'hzfyzh' => [39,0,'32',false],//富阳新闻综合 浙江
    'hudqxw' => [42,0,'1',false],//德清新闻综合 浙江
    'hudqwh' => [42,0,'2',false],//德清文化生活 浙江
);
$m = array(//[dom_id,(drm/drmx/drml),playurl]
    'fjdnws' => [43,'drml','http://stream5.fjtv.net/dnpd/playlist.m3u8'],//东南卫视 福建
    'fjhxws' => [43,'drml','http://stream6.fjtv.net/haixia/playlist.m3u8'],//海峡卫视 福建
    'fjzh' => [43,'drml','http://stream5.fjtv.net/zhpd/playlist.m3u8'],//福建综合
    'fjgg' => [43,'drml','http://stream5.fjtv.net/ggpd/playlist.m3u8'],//福建乡村振兴·公共
    'fjxw' => [43,'drml','http://stream5.fjtv.net/xwpd/playlist.m3u8'],//福建新闻
    'fjdsj' => [43,'drml','http://stream5.fjtv.net/dsjpd/playlist.m3u8'],//福建电视剧
    'fjly' => [43,'drml','http://stream6.fjtv.net/dspd/playlist.m3u8'],//福建旅游
    'fjjj' => [43,'drml','http://stream6.fjtv.net/jjpd/playlist.m3u8'],//福建经济
    'fjwt' => [43,'drml','http://stream6.fjtv.net/typd/playlist.m3u8'],//福建文体
    'fjse' => [43,'drml','http://stream6.fjtv.net/child/playlist.m3u8'],//福建少儿
    'fjcctv1' => [43,'drml','http://stream10.fjtv.net/cctv1/playlist.m3u8'],//CCTV1（福建线路）
    'fjcctv13' => [43,'drml','http://stream10.fjtv.net/cntv13/playlist.m3u8'],//CCTV13（福建线路）
    'fjptxw1' => [43,'drml','http://stream4.fjtv.net/fzbllk/playlist.m3u8'],//莆田新闻综合（福建线路）
    'fjsmyx' => [43,'drml','http://stream10.fjtv.net/yxtvnews/playlist.m3u8'],//尤溪综合 福建
    'fjsmsx' => [43,'drml','http://stream9.fjtv.net/sxtv/playlist.m3u8'],//沙县综合 福建
    'jnxwzh' => [2,'drmx','http://ts1.ijntv.cn/jnxw/playlist.m3u8'], //济南新闻综合 山东
    "jnds" => [2,'drmx','http://ts1.ijntv.cn/jnds/playlist.m3u8'],//济南都市 山东
    "jnys" => [2,'drmx','http://ts1.ijntv.cn/jnyd/playlist.m3u8'],//济南影视 山东
    "jnyl" => [2,'drmx','http://ts2.ijntv.cn/jnyl/playlist.m3u8'],//济南娱乐 山东
    "jnsh" => [2,'drmx','http://ts2.ijntv.cn/jnsh/playlist.m3u8'],//济南生活 山东
    "jnsw" => [2,'drmx','http://ts1.ijntv.cn/jnsw/playlist.m3u8'],//济南商务 山东
    "jnse" => [2,'drmx','http://ts2.ijntv.cn/jnse/sd1/live.m3u8'],//济南少儿 山东
    "jnxwhd" => [2,'drmx','http://ts1.ijntv.cn/xwhd/playlist.m3u8'],//济南新闻综合高清 山东
    "jnyshd" => [2,'drmx','https://ts1.ijntv.cn/yshd/playlist.m3u8'],//济南影视高清 山东
    "jnlz" => [2,'drmx','http://ts4.ijntv.cn/ltv1/playlist.m3u8'],//济南鲁中 山东
    "jnkj" => [2,'drmx','http://ts4.ijntv.cn/ltv2/playlist.m3u8'],//济南科教 山东
    "jnqtx" => [2,'drmx','http://ts3.ijntv.cn/jnqtx/playlist.m3u8'],//济南网 山东
    "jnyd" => [2,'drmx','https://ts5.ijntv.cn/ydtv/playlist.m3u8'],//济南移动电视 山东
    "jnyddt" => [2,'drmx','https://ts5.ijntv.cn/dttv/playlist.m3u8'],//济南地铁电视 山东
    "jnydcs" => [2,'drmx','https://ts5.ijntv.cn/citytv/playlist.m3u8'],//济南城市电视 山东
    'nxws' => [4,'drmx','http://stream.nxtv.com.cn/wspd/playlist.m3u8'],//宁夏卫视
    'nxgg' => [4,'drmx','http://stream.nxtv.com.cn/ggpd/playlist.m3u8'],//宁夏公共
    'nxjj' => [4,'drmx','http://stream.nxtv.com.cn/jjpd/playlist.m3u8'],//宁夏经济
    'nxys' => [4,'drmx','http://stream.nxtv.com.cn/yspd/playlist.m3u8'], //宁夏影视
    'nxse' => [4,'drmx','http://stream.nxtv.com.cn/sepd/playlist.m3u8'], //宁夏少儿
);

if (isset($_GET['n'])) {
    $r = $_GET['ref'];
    $u = $_GET['p'] . $_GET['n'];
    $gk = array_keys($_GET);
    $gv = array_values($_GET);
    for ($j = isset($_GET['fmt']) ? 4 : 3; $j < count($gk); $j++) {
        $u = $u . (strpos($u, '?') ? '&' : '?') . $gk[$j] . '=' . $gv[$j];
    }
    if ($fmt == 'hls') {
        $m3u8 = str_replace('?', '&', m3u8($u, $ref[$r]));
        getPHPm3u($m3u8, $u, $r);
    } else {
        if ($fmt == 'ts') {
            $d = ts($u, $ref[$r]);
        }
    }
} else {
    if (!!$n[$id]) {
        if ($n[$id][1] == 0) {
            $d = file_get_contents($dom[$n[$id][0]] . 'api/v1/channel.php?channel_id=' . $n[$id][2]);
        } else {
            if ($n[$id][1] > 0) {
                $ch = curl_init();
                if ($n[$id][1] == 3) {
                    $cli = md5(rand() . time());
                    $tok = md5($client . "com.hoge.android.wuhan");
                    $uu = 'zswh6/channel_detail.php?appid=16&appkey=rFUm5PYocCj6e1h0m03t3WarVJcMV98c&client_id_android=' . $cli . '&device_token=' . $tok . '&channel_id=';
                    $t = explode(".", microtime(true));
                    $t = $t[0] . $t[1];
                    $ran = $t . substr(md5(time()), 0, 6);
                    $s = base64_encode(hash('sha1', "c9e1074f5b3f9fc8ea15d152add07294&S1M1MXczMFhPQXNPZXc0RU1vVWdwV2NRTU9JMmhHMFI=&5.6.0&" . $ran, ''));
                    $h = array("User-Agent: m2oSmartCity_104 1.0.0", "X-API-TIMESTAMP: {$ran}", "X-API-SIGNATURE: {$s}", "X-API-VERSION: 5.6.0", "X-AUTH-TYPE: sha1", "X-API-KEY: c9e1074f5b3f9fc8ea15d152add07294", "Host: mobile.appwuhan.com", "Connection: Keep-Alive");
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
                } else {
                    if ($n[$id][1] == 6) {
                        $uu = 'm2o/plus/channel_detail.php?channel_id=';
                    } else {
                        if ($n[$id][1] == 5) {
                            $uu = 'share/channel_detail.php?appid=1&appkey=d3a3ZMgAhVmgqcrBXJwdKOsfCNFm3gr6&channel_id=';
                        } else {
                            if ($n[$id][1] == 4) {
                                $uu = 'szh/channel_detail.php?appid=37&appkey=BHAk5KonEtoiZfqw4SW9taIYZF8NLxId&channel_id=';
                            } else {
                                $uu = 'm2o/channel/channel_info.php?' . ($n[$id][1] == 2 ? 'channel_' : '') . 'id=';
                            }
                        }
                    }
                    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0)");
                    if ($n[$id][1] == 7) {
                        curl_setopt($ch, CURLOPT_REFERER, $dom[$n[$id][0]]);
                    }
                }
                curl_setopt($ch, CURLOPT_URL, $dom[$n[$id][0]] . $uu . $n[$id][2]);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $d = curl_exec($ch);
                curl_close($ch);
            }
        }
        $json = json_decode($d);
        $playurl = $json[0]->m3u8;
        if ($n[$id][3]) {
            //print_r($json);
            $m3u8 = str_replace('?', '&', m3u8($playurl, $ref[$n[$id][0]]));
            getPHPm3u($m3u8, $playurl, $n[$id][0]);
        } else {
            //echo $json[0]->m3u8;
            header('Location:' . $json[0]->m3u8);
        }
    }
    if (!!$m[$id]) {
        $salt = "862DF6728D919D06E3182D5129832559";
        $playerVersion = '4.03';
        $stime= floor(microtime(1)*1000);
        $refererurl = ($ref[$m[$id][0]]!='')?$ref[$m[$id][0]]:'null';
        $hash =md5($salt.$playerVersion.$refererurl.$stime.$m[$id][2].$salt);
        $ch = curl_init($dom[$m[$id][0]] . 'm2o/player/' . $m[$id][1] . '.php?url=' . $m[$id][2] . "&playerVersion=$playerVersion&refererurl=$refererurl&time=$stime&hash=$hash");
        $h= array(
                "User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36",
                "Cookie: __statCU=1234567890.000",
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
        $playurl = curl_exec($ch);
        curl_close($ch);
        header('Location:'.$playurl);
        //echo $playurl;
    }
}

function getPHPm3u($_m3u8, $_u, $_r)
{
    $phpself = substr($_SERVER['PHP_SELF'], strripos($_SERVER['PHP_SELF'], "/") + 1);
    preg_match("/^http(s)?:\\/\\/(.*?).m3u8/", $_u, $a);
    $b = str_replace(substr($a[0], strripos($a[0], "/") + 1), '', $a[0]);
    if (strpos($_m3u8, '.m3u8')) {
        preg_match("/\n(.*?).m3u8/", $_m3u8, $c);
        preg_match('/^http(s)?:\\/\\/(.*)\\//U', $b, $pa);
        $p = strpos($c[1], '/') == 0 ? substr($pa[0], 0, strlen($pa[0]) - 1) : $b;
        echo str_replace($c[0], "\n" . $phpself . '?n=' . $c[1] . '.m3u8&p=' . $p . '&ref=' . $_r, $_m3u8);
    } else {
        if (strpos($_m3u8, '.ts')) {
            preg_match_all("/\n(.*?).ts/", $_m3u8, $c);
            preg_match('/^http(s)?:\\/\\/(.*)\\//U', $b, $pa);
            for ($i = 0; $i < count($c[0]); $i++) {
                $p = strpos($c[1][$i], '/') == 0 ? substr($pa[0], 0, strlen($pa[0]) - 1) : $b;
                $_m3u8 = str_replace($c[0][$i], "\n" . $phpself . '?fmt=ts&n=' . $c[1][$i] . '.ts&p=' . $p . '&ref=' . $_r, $_m3u8);
            }
            echo $_m3u8;
        }
    }
}
function m3u8($url, $refer)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_REFERER, $refer);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
function ts($url, $refer)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_REFERER, $refer);
    $result = curl_exec($ch);
    curl_close($ch);
}
?>
