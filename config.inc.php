<?php
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//File:     config.inc.php
//Author:   Sun Haiwei(Tzweb.com)
//Purpose:  This page is display information of web site config
///////////////////////////////////////////////////////////////////////////////////////////////////////////

	if(!defined('IN_TZWEBINFO')){ exit('Access Denied'); }

	// 以下变量请根据空间商提供的账号参数修改,如有疑问,请联系服务器提供商

	$dbhost = 'localhost';					// 数据库服务器
	$dbuser = 'root';						// 数据库用户名
	$dbpw = 'root';							// 数据库密码
	$dbname = 'tanchisys';					// 数据库名
	$pconnect = 0;							// 数据库持久连接 0=关闭, 1=打开

	// 如程序登录不正常 或者对 cookie 作用范围有特殊要求,或,请修改下面变量,否则请保持默认

	$safecodename = 'login_check_code';
	$cookiepre = 'Tanchisys_';				// cookie 前缀
	$cookiedomain = ''; 					// cookie 作用域：127.0.0.1是本地访问
	$cookiepath = '/';						// cookie 作用路径

	// 以下变量为特别选项,一般情况下没有必要修改

	$headercache = 0; 	// 页面缓存开关 0=关闭, 1=打开
	$tplrefresh = 1;	// 模板自动刷新开关 0=关闭, 1=打开
	$htmlfresh = 1; 	// 静态页生成开关 0=关闭, 1=打开
	$headercharset = 1;	// 强制设置字符集,只乱码时使用
	$onlinehold = 300;	// 在线保持时间
	$enable_gzip = 1;   //获得系统是否启用了 gzip  0=未启用, 1=启用
	$pcdisplay = 0;     //省份和地级市是否显示

	// 程序投入使用后不能修改的变量
	$database = 'mysql';				// MySQL 版本请设置 'mysql', PgSQL 版本请设置 'pgsql'
	$charset = 'utf-8';					// 程序默认字符集, 可选 'gbk', 'utf-8'
	$cpcharset = 'utf-8';				// 后台程序默认字符集, 可选 'gbk', 'utf-8'
	$dbcharset = 'utf8';				// MySQL 字符集, 可选 'gbk', 'utf8', 留空为按照程序字符集设定

	// 程序安全控制
	$authkey = "TZZhe06751We33103T81Zwl71UTan67chi502d6GD8aTech86IN021Da6Tec31HY7500"; //初始认证密码钥匙 
	$authemail = '100577888@qq.com';

	$dbreport = 0;				// 是否发送数据库错误报告? 0=否, 1=是
	$errorreport = 1;			// 是否报告 PHP 错误, 0=只报告给管理员和版主(更安全), 1=报告给任何人
	$attackevasive = 0;			// 防护大量正常请求造成的拒绝服务攻击, 0=关闭, 1=cookie 刷新限制, 2=限制代理访问, 3=cookie+代理限制
	$virdirflag = 1;			//Web服务器是否启动虚拟目录？ 0=否, 1=是
	
	//[*****************************数据库数据表信息********************************]//

	$accesslog_table = TABLEPRE."accesslog";			//数据库表tc_accesslog,访问日志记录表;
	$activity_table = TABLEPRE."activity";				//数据库表tc_activity,约会活动信息表;
	$ad_table = TABLEPRE."ad";							//数据库表tc_ad,广告内容信息表;
	$address_table = TABLEPRE."address";				//数据库表tc_admin,收货地址信息表;
	$addressbook_table = TABLEPRE."addressbook";		//数据库表tc_addressbook,通讯录信息表;
	$addbook_table_prefix = TABLEPRE."addressbook_";	//数据库表tc_addressbook_,通讯录信息表前缀;
	$admin_table = TABLEPRE."admin";					//数据库表tc_admin,管理员信息表;
	$admlog_table = TABLEPRE."admlog";					//数据库表tc_admlog,管理员操作日志信息表;		
	$adpos_table = TABLEPRE."adpos";					//数据库表tc_adpos,广告位置信息表;
	$apilog_table = TABLEPRE."apilog";					//数据库表exp_apilog,接口日志信息表;
	$apiuser_table = TABLEPRE."apiuser";				//数据库表tc_apiuser,接口账户信息表;	
	$apiver_table = TABLEPRE."apiversion";				//数据库表tc_apiver,接口版本控制信息表;	
	$appbug_table = TABLEPRE."appbug";					//数据库表tc_appbug,APP错误日志表;	
	$apply_table = TABLEPRE."apply";					//数据库表tc_apply,约会活动报名订单信息表;	
	$bankcard_table = TABLEPRE."bankcard";				//数据库表tc_bacnkcard,商家会员银行卡信息表;
	$banklib_table = TABLEPRE."banklib";				//数据库表tc_banklib,银行信息表;
	$cart_table = TABLEPRE."cart";						//数据库表tc_cart,购物车信息表;
	$cpmenu_table = TABLEPRE."cpmenu";					//数据库表tc_cpmenu,后台管理菜单信息表;
	$crontablog_table = TABLEPRE."crontablog";			//数据库表tc_crontablog,系统定时执行日志记录信息表;
	$district_table = TABLEPRE."district";				//数据库表tc_district,地区信息表;
	$drawcash_table = TABLEPRE."drawcash";				//数据库表tc_drawcash,提现信息表;
	$express_table = TABLEPRE."express";				//数据库表tc_express,快递公司信息表;
	$feedback_table = TABLEPRE."feedback";				//数据库表tc_feedback,意见反馈信息表;
	$fodder_table = TABLEPRE."fodder";					//数据库表tc_fodder,食材信息表;
	$food_table = TABLEPRE."food";						//数据库表tc_food,商家食品信息表;
	$foodclass_table = TABLEPRE."foodclass";			//数据库表tc_foodclass,食品分类信息表;
	$foodphoto_table = TABLEPRE."foodphoto";			//数据库表tc_foodphoto,食品图片库信息表;
	$foodseries_table = TABLEPRE."foodseries";			//数据库表tc_foodclass,食品菜系分类信息表;
	$foodstorage_table = TABLEPRE."foodstorage";		//数据库表tc_foodstorage,食品库存信息表;
	$foodtype_table = TABLEPRE."foodtype";				//数据库表tc_foodtype,食品类型分类信息表;
	$friendzone_table = TABLEPRE."friendzone";			//数据库表tc_friendzone,朋友圈信息表;
	$fzclass_table = TABLEPRE."fzclass";				//数据库表tc_fzclass,朋友圈信息分类信息表;
	$fzphoto_table = TABLEPRE."fzphoto";				//数据库表tc_fzphoto,朋友圈照片库信息表;	
	$fzpool_table = TABLEPRE."fzpool";					//数据库表tc_fzpool,朋友圈帖子缓存池信息表;	
	$fzrecord_table = TABLEPRE."fzrecord";				//数据库表tc_fzphoto,朋友圈照片库信息表;	
	$keyword_table = TABLEPRE."keyword";				//数据库表tc_keyword,搜索关键字信息表;
	$member_table = TABLEPRE."member";					//数据库表tc_member,个人会员信息表;	    
	$memberfriend_table = TABLEPRE."memberfriend";		//数据库表tc_memberfriend,会员好友信息记录表;	                                   
	$membermsg_table = TABLEPRE."membermsg";			//数据库表tc_memberlog,会员添加好友消息信息表;	
	$memberonline_table = TABLEPRE."memberonline";		//数据库表tc_memberonline,会员在线信息表;
	$memberrecord_table = TABLEPRE."memberrecord";		//数据库表tc_memberrecord,会员操作记录表;
	$memberremark_table = TABLEPRE."memberremark";		//数据库表tc_memberremark,会员好友备注信息表;
	$membersetting_table = TABLEPRE."membersetting";	//数据库表membersetting_table,会员设置信息表;
	$memberzone_table_prefix = TABLEPRE."memberzone_";	//数据库表tc_memberzone_,会员浏览朋友圈信息日志表;
	$msg_table = TABLEPRE."msg";						//数据库表tc_msg,消息信息表;	
	$msgstate_table = TABLEPRE."msgstate";				//数据库表tc_msgstate,消息状态信息表;	
	$news_table = TABLEPRE."news";						//数据库表tc_news,新闻资讯信息表;	
	$newsclass_table = TABLEPRE."newsclass";			//数据库表tc_news,新闻资讯分类表;
	$order_table = TABLEPRE."order";					//数据库表tc_order,订单信息表;	
	$orderitem_table = TABLEPRE."orderitem";			//数据库表tc_orderfood_item,订单产品项信息表;
	$orderlog_table = TABLEPRE."orderlog";				//数据库表tc_orderlog,订单日志记录表;
	$orderrefund_table = TABLEPRE."orderrefund";		//数据库表tc_orderrefund,订单退款信息表;	
	$paylog_table = TABLEPRE."paylog";					//数据库表tc_paylog,在线支付日志记录表;	
	$pushclass_table = TABLEPRE."pushclass";			//数据库表tc_pushclass,推送消息分类信息表;
	$pushlog_table = TABLEPRE."pushlog";				//数据库表tc_pushmsg,推送消息内容信息表;
	$pushmsg_table = TABLEPRE."pushmsg";				//数据库表tc_pushlog,友盟消息推送日志表;
	$pushrecord_table = TABLEPRE."pushrecord";			//数据库表tc_pushrecord,个人会员推送记录表;
	$pushstatus_table = TABLEPRE."pushstatus";			//数据库表tc_pushstatus,消息推送状态信息表;
	$pushtoken_table = TABLEPRE."pushtoken";			//数据库表tc_pushtoken,推送令牌信息表;
	$pushtpl_table = TABLEPRE."pushtpl";				//数据库表tc_pushtpl,短信及推送消息模板信息表;
	$review_table = TABLEPRE."review";					//数据库表tc_review,点评信息表;
	$reviewphoto_table = TABLEPRE."reviewphoto";		//数据库表tc_review,点评图片信息表;	
	$role_table = TABLEPRE."role";						//数据库表tc_role,管理员角色组信息表;	
	$shop_table = TABLEPRE."shop";						//数据库表tc_shop,商家信息表;
	$shopcate_table = TABLEPRE."shop";					//数据库表tc_shopcate,商家分类信息表;
	$shoplog_table = TABLEPRE."shoplog";				//数据库表tc_shoplog,商家会员日志表;	
	$shopphoto_table = TABLEPRE."shopphoto";			//数据库表tc_shopphoto,商家图片库信息表;
	$smalltable_table = TABLEPRE."smalltable";			//数据库表tc_smalltable,小饭桌分类信息表;
	$smslog_table = TABLEPRE."smslog";					//数据库表tc_smslog,短信日志表;
	$story_table = TABLEPRE."story";					//数据库表tc_story,商家故事信息表;	
	$storyphoto_table = TABLEPRE."reviewphoto";			//数据库表tc_storyphoto,商家故事图片信息表;	
	$taste_table = TABLEPRE."taste";					//数据库表tc_taste,口味分类信息表;
	$tztown_table = TABLEPRE."tztown";					//数据库表tc_tztown,台州乡镇街道信息表;	
	$valcode_table = TABLEPRE."valcode";				//数据库表tc_valcode,临时验证码信息表;
	$wbalancelog_table = TABLEPRE."wbalancelog";		//数据库表tc_wbalancelog,商家余额变更日志表;
	$wxuser_table = TABLEPRE."wxuser";					//数据库表tc_wxuser,个人会员微信信息表;

	//[********************************变量设置******************************************]//
	$pathflag = "/";
	$preflag = "..";
	$prepath = $preflag.$pathflag;
	$pprepath = $prepath.$prepath;

	//前台网页图片、CSS、JS等设置,服务器路径, 属性 777, 必须为 web 可访问到的目录
	$compiledir = 'tcdata'.$pathflag;				//编译或者缓冲后数据
	$admincpdir = 'admtc'.$pathflag;				//后台管理目录名称
	$uploadfilesdir = 'uploadfiles'.$pathflag;
	$includedir = 'include'.$pathflag;
	$staticdir = 'static'.$pathflag;
	$defdir = 'default'.$pathflag;
	$imgdir = 'images'.$pathflag;
	$cssdir = 'css'.$pathflag;
	$jsdir = 'js'.$pathflag;
	$cachedir = 'cache'.$pathflag;
	$admindir = 'admin'.$pathflag;	
	$shopcpdir = 'shop'.$pathflag;	
	$dbbakdir = 'dbbak'.$pathflag;
	$htmldir = 'html'.$pathflag;
	$appdir = 'app'.$pathflag;
	$webappdir = 'webapp'.$pathflag;
	$pcdir = 'pc'.$pathflag;
	
	$cache_tophp = $cachedir.'tophp'.$pathflag;     //缓冲生成php的文件路径
	$cache_tojs = $cachedir.'tojs'.$pathflag;       //缓冲生成js的文件路径
	$cache_tohtml = $cachedir.'tohtml'.$pathflag;   //缓冲生成html的文件路径

	$addir  = $uploadfilesdir.'ad'.$pathflag;					//广告图片路径
	$idnumdir  = $uploadfilesdir.'idnum'.$pathflag;				//身份证图片路径
	$healthdir  = $uploadfilesdir.'health'.$pathflag;			//健康证图片路径
	$newsdir  = $uploadfilesdir.'news'.$pathflag;				//新闻资讯图片路径
	$productdir  = $uploadfilesdir.'product'.$pathflag;			//积分产品图片路径
	$shopdir  = $uploadfilesdir.'shop'.$pathflag;				//商家会员图片路径
	$memberdir  = $uploadfilesdir.'member'.$pathflag;			//个人会员图片路径
	$shopphotodir  = $uploadfilesdir.'shopphoto'.$pathflag;		//商家相册图片路径
	$fzphotodir  = $uploadfilesdir.'fzphoto'.$pathflag;			//朋友圈相册图片路径
	$fzbgdir  = $uploadfilesdir.'fzbg'.$pathflag;				//朋友圈顶部背景图片路径
	$admerdir  = $uploadfilesdir.'admin'.$pathflag;				//管理员头像路径
	$fooddir  = $uploadfilesdir.'food'.$pathflag;				//美食图片路径
	$catedir  = $uploadfilesdir.'category'.$pathflag;			//商家分离图片路径
	$reviewdir  = $uploadfilesdir.'review'.$pathflag;			//点评图片路径
	$qrcodedir  = $uploadfilesdir.'qrcode'.$pathflag;			//二维码图片路径
	$storydir  = $uploadfilesdir.'story'.$pathflag;				//商家故事图片附件路径
	$bankdir  = $uploadfilesdir.'bank'.$pathflag;				//银行图片路径
	$expressdir  = $uploadfilesdir.'express'.$pathflag;		    //快递公司路径
	$helpdir  = $uploadfilesdir.'help'.$pathflag;				//帮助附件路径

	//后台网页图片、CSS、JS等设置
	$adminimgdir = $pathflag.$staticdir.$imgdir.$admindir;
	$admincssdir = $pathflag.$staticdir.$cssdir.$admindir;
	$adminjsdir = $pathflag.$staticdir.$jsdir.$admindir;	

	//商家会员中心网页图片、CSS、JS等设置
	$shopimgdir = $pathflag.$staticdir.$imgdir.$shopcpdir;
	$shopcssdir = $pathflag.$staticdir.$cssdir.$shopcpdir;
	$shopjsdir = $pathflag.$staticdir.$jsdir.$shopcpdir;	
	
	//页码设置
	$default_pagesize = 30;
	
	$adm_pagesize = 50;
	$adm_news_pagesize = 50;	
	$adm_photo_pagesize = 60;

	$app_pagesize = 20;				   //测试每页显示5条
	$app_photoreview_pagesize = 20;    //测试每页显示5条
	$app_shop_pagesize = 20;
	$app_shopreivew_pagesize = 3;	   //测试每页显示5条
	$app_address_pagesize = 20;		  //测试每页显示5条
	
	$shop_pagesize = $shop_cate_pagesize = 20;   
	$shop_photo_pagesize = 18;   
	$shop_log_pagesize = $shop_review_pagesize = $shop_order_pagesize = 10;

	//网址设置	
	$cpurl = 'http://adm.tanchi.com';						     //平台域名地址
	$apiurl = 'http://api.tanchi.com/app/';					 	 //API接口域名地址
	$loc_serverip = '60.191.144.87'; //贪吃服务器IP地址

	//短信验证码配置
	$smsconfig_array = array(
		'apiurl'=>'http://42.121.1.167:8080/submit',
		'account'=>'tanchi',
		'password'=>'a123456',
		'signname'=>'【贪吃】',
	);

	//跑腿应用配置
	$expconfig_array = array(
		'appuid'=>1,  										//跑腿应用APP分配应用编号
		'appid'=>'expqhpmi07fazolitrc',  					//跑腿应用APP分配应用ID
		'appsecret'=>'yU7d0NkPvVhWy4oBicZCygYVgWJMuyjg',  	//跑腿应用APP分配应用密钥
		'secretkey'=>'sNxMVu6C',  							//跑腿应用APP分配加密密码
		'saltsn'=>'wA1NbRu4jhpzS3Dx',  						//跑腿应用APP分配随机码
		'serverip'=>'60.191.144.87',  						//跑腿应用APP服务器IP
		'apiurl'=>'http://exp.tanchi.com/api/app/',  		//跑腿应用APP分配接口前缀网址
	);

	//手机微站配置
	$webapp_config_array = array(
		'serverip'=>'60.191.144.87',  						//手机微站服务器IP
		'apiurl'=>'http://wx.tanchi.com/',  			//手机微站接口前缀网址
	);

	//在线编辑目录设置
	$editordir = 'fckeditor';
	$editorpath = $includedir.$editordir.$pathflag.'editor';

	//APP下载地址
	$appdownurl_array =array(
	'1'=>'https://itunes.apple.com/cn/app/tan-chi-si-fang-peng-ren-wai/id1040050979?l=en&mt=8',  //iphone
	'2'=>'http://adm.tanchi.com/app/soft/tanchi1.apk',  //android
	'3'=>'http://a.app.qq.com/o/simple.jsp?pkgname=com.zc.tanchi1',  //wechat
	'4'=>'http://share.tanchi.com/app/download',  //windows phone	
	'5'=>'http://share.tanchi.com/app/download',  //本地
	);

	//友盟消息推送设置
	$umeng_array = array(
		'apiurl'=>'http://msg.umeng.com/api/send',
		'uploadurl'=>'http://msg.umeng.com/upload',
		'pushtype'=>'filecast',   //groupcast  组播   //unicast  单播   //filecast  文件播
		'production_mode'=>'false',  //false属于测试状态，true表示正式
		'ios'=>array(
			'appkey'=>'55ebeea5e0f55a196b005cab',
			'appsecret'=>'k5rro7z5swdnhrockpjtdjwrrcvrmiej',
		),
		'android'=>array(
			'appkey'=>'5629df07e0f55a5907001e99',
			'msgsecret' =>'c40904e0326735aafd616cb7edb6b463',
			'appsecret'=>'9hdhrvmfzsyz0me2fhzymbtdhugx7mp9',
		),
	);

	//环信Easemob
	$easemob_apiurl = 'https://a1.easemob.com/310117002784246/1111/';
	$easemob_config_array = array('grant_type'=>'client_credentials','client_id'=>'YXA6fShTMP3LEeO2Xh_z9oM5Yg','client_secret'=>'YXA61A-0ZxkoDFGNmGFQhMdkJxCHixE');

	//中国天气网 www.weather.com.cn
	$cnweather_openurl = 'http://open.weather.com.cn/data/';
	$cnweather_appid = '675364dac63a4a59';
	$cnweather_privatekey = '38c030_SmartWeatherAPI_54ba164';

	//二维码长度设置
	$paysn_len = 8;       //支付码长度
	$ssn_length = 8;     //跑腿码长度
	$shippingno_length = 8;  //物流单号
	$ssn_lastpos = 'p';

	//其他设置
	$location_rangeid = 5;     //默认5公里
	$def_rangeid = 10;    	   //默认10公里
	$earth_radius = 6378.137;  //地球半径
	$earth_secondm = 30.92;    //1秒大约为30.92米; 

	//公用数组设置

	$pictype = array('gif','jpg','png','bmp','psd','ico','zip', 'rar', 'txt', 'doc', 'xls', 'pdf','mp3','flv','mp4'); 

	$linkflag_array = array('-','_','+');									//url连接符号

	$postfix_array = array('.php','.html','.htm','.shtml','.xml','.js');	//页面文件名称后缀名称

	//============================================================================

?>