<?php
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//File:     ajax.php
//Author:   Sun Haiwei(Tzweb.com)
//Purpose:  This page is display informations of ajax.
///////////////////////////////////////////////////////////////////////////////////////////////////////////

session_start();
require_once ('include/common.inc.php');
require_once ('include/dblink.inc.php');
require_once ('include/global.func.php');

require_once $compiledir.$cache_tophp.'cache_root.php';

$returnvalue = '';
switch(strtolower($action))
{
	case 'checkusername':
		$returnvalue = checkusername();
		break;
	case 'checknick':
		$returnvalue = checknick();
		break;
	case 'checkmobile':
		$returnvalue = checkmobile();
		break;
	case 'postimp':
		$returnvalue = postimp();
		break;
	case 'impagree':
		$returnvalue = impagree();
		break;
	case 'subscribe':
		$returnvalue = subscribe();
		break;
	case 'modifysubmail':
		$returnvalue = modifysubmail();
		break;
	case 'getmvcode':
		$returnvalue = getmvcode();
		break;
	case 'addfav':
		$returnvalue = addfav();
		break;
	case 'favtoshop':
		$returnvalue = favtoshop();
		break;
	case 'addfriend':
		$returnvalue = addfriend();
		break;
	case 'dishfav':
		$returnvalue = dishfav();
		break;
	default:
		break;
}

echo $returnvalue;

function checkusername()
{
	global $dblink,$member_table;
	$username = empty($_GET['username'])?trim($_POST['username']):trim($_GET['username']);
	$select_member_sql = "select id from ".$member_table." where username='$username'";
	$query_member = $dblink->query($select_member_sql);
	$membernum = $dblink->num_rows($query_member);
	if($membernum>=1){ echo 1; }
	else{ echo 2; }
}

function checknick()
{
	global $dblink,$member_table;
	$nick = empty($_GET['nick'])?trim($_POST['nick']):trim($_GET['nick']);
	$select_member_sql = "select id from ".$member_table." where nick='$nick'";
	$query_member = $dblink->query($select_member_sql);
	$membernum = $dblink->num_rows($query_member);
	if($membernum>=1){ echo 1; }
	else{ echo 2; }
}

function checkmobile()
{
	global $dblink,$member_table;
	$mobile = empty($_GET['mobile'])?trim($_POST['mobile']):trim($_GET['mobile']);
	$select_member_sql = "select id from ".$member_table." where mobile='$mobile'";
	$query_member = $dblink->query($select_member_sql);
	$membernum = $dblink->num_rows($query_member);
	if($membernum>=1){ echo 1; }
	else{ echo 2; }
}

function postimp()
{
	global $dblink,$impression_table,$nowdatetime;
	$shopid = empty($_GET['shopid'])?trim($_POST['shopid']):trim($_GET['shopid']);
	$userid = empty($_GET['userid'])?trim($_POST['userid']):trim($_GET['userid']);
	$impvalue = empty($_GET['impvalue'])?trim($_POST['impvalue']):trim($_GET['impvalue']);

	$ip = getip();

	$select_impression_sql = "select id from ".$impression_table." where shopid='$shopid' and mid='$userid' and ip='$ip'";
	$query_impression = $dblink->query($select_impression_sql);
	$impcount = $dblink->num_rows($query_impression);	
	if($impcount<=6)
	{
		$select_impinfo_sql = "select id from ".$impression_table." where shopid='$shopid' and mid='$userid' and ip='$ip' and content='$impvalue'";
		$query_impinfo = $dblink->query($select_impinfo_sql);
		$impnum = $dblink->num_rows($query_impinfo);
		if($impnum==0)
		{
			$insert_impression_sql = "insert into ".$impression_table."(shopid,mid,content,addtime,updatetime,ip,audit,cmt,isshow)values('$shopid','$userid','$impvalue','$nowdatetime','$nowdatetime','$ip','0','0','0')";	
			$dblink->query($insert_impression_sql);	

			echo 1;
		}
		else{ echo 2; }
	}
	else{ echo 3;}
}

function impagree()
{
	global $dblink,$impression_table;
	$shopid = empty($_GET['shopid'])?trim($_POST['shopid']):trim($_GET['shopid']);
	$impid = empty($_GET['impid'])?trim($_POST['impid']):trim($_GET['impid']);

	$ip = getip();

	$select_impression_sql = "select id from ".$impression_table." where shopid='$shopid' and mid='$impid' and ip='$ip'";
	$query_impression = $dblink->query($select_impression_sql);
	$impcount = $dblink->num_rows($query_impression);	
	if($impcount<=6)
	{
		$update_impinfo_sql = "update ".$impression_table." set agreenum=agreenum+1 where id='$impid' and shopid='$shopid'";
		$dblink->query($update_impinfo_sql);
		echo 1;
	}
	else if($impcount<=0){ echo 2; }
	else{ echo 3; }
}

function subscribe()
{
	global $dblink,$subscribe_table,$nowdatetime,$cookiepre;
	$shopid = empty($_GET['shopid'])?trim($_POST['shopid']):trim($_GET['shopid']);
	$userid = empty($_GET['userid'])?trim($_POST['userid']):trim($_GET['userid']);
	$txtvalue = empty($_GET['txtvalue'])?trim($_POST['txtvalue']):trim($_GET['txtvalue']);
	$ip = getip();

	if($_SESSION[$cookiepre.'memberid'] && $_SESSION[$cookiepre.'membername'] && $_SESSION[$cookiepre.'membertoken'] && $_SESSION[$cookiepre.'memberkey'])
	{
		$select_impression_sql = "select id from ".$impression_table." where shopid='$shopid' and mid='$userid' and ip='$ip'";
		$query_impression = $dblink->query($select_impression_sql);
		$impcount = $dblink->num_rows($query_impression);	
		if($impcount<=6)
		{
			$select_impinfo_sql = "select id from ".$impression_table." where shopid='$shopid' and mid='$userid' and ip='$ip' and content='$impvalue'";
			$query_impinfo = $dblink->query($select_impinfo_sql);
			$impnum = $dblink->num_rows($query_impinfo);
			if($impnum==0)
			{
				$insert_impression_sql = "insert into ".$impression_table."(shopid,mid,content,addtime,updatetime,ip,audit,cmt,isshow)values('$shopid','$userid','$impvalue','$nowdatetime','$nowdatetime','$ip','0','0','0')";	
				$dblink->query($insert_impression_sql);	

				echo 1;
			}
			else{ echo 2; }
		}
	}
	else{ echo 3;}
}

function modifysubmail()
{
	global $dblink,$subscribe_table,$nowdatetime,$cookiepre;
	$mid = empty($_GET['mid'])?trim($_POST['mid']):trim($_GET['mid']);
	$subemail = empty($_GET['subemail'])?trim($_POST['subemail']):trim($_GET['subemail']);
	$curip = getip();

	if($_SESSION[$cookiepre.'memberid'] && $_SESSION[$cookiepre.'membername'] && $_SESSION[$cookiepre.'membertoken'] && $_SESSION[$cookiepre.'memberkey'] && $subemail)
	{
		$select_submail_sql = "select id from ".$subscribe_table." where audit=1 and isshow=0 and mid='$mid'";
		$query_submail = $dblink->query($select_submail_sql);
		$smcount = $dblink->num_rows($query_submail);	
		if($smcount<=0)
		{
			$insert_membersub_sql = "insert into ".$subscribe_table."(mid,email,conttype,addtime,updatetime,ip,audit,isshow)values('$mid','$subemail','','$nowdatetime','$nowdatetime','$curip','1','0')";
			$dblink->query($insert_membersub_sql);

			echo 1;
		}
		elseif($smcount>=1)
		{
			$update_submail_sql = "update ".$subscribe_table." set email='".$subemail."' where audit=1 and isshow=0 and mid=".$mid;
			$dblink->query($update_submail_sql);

			echo 2; 
		}
	}
	else{ echo 3;}
}

function getmvcode()
{
	global $dblink,$subscribe_table,$nowdatetime,$cookiedomain,$cookiepre,$root;
	$curmid = empty($_GET['mid'])?trim($_POST['mid']):trim($_GET['mid']);
	$curmobile = empty($_GET['mobilevalue'])?trim($_POST['mobilevalue']):trim($_GET['mobilevalue']);
	$curip = getip();

	if($_SESSION[$cookiepre.'memberid'] && $_SESSION[$cookiepre.'membername'] && $_SESSION[$cookiepre.'membertoken'] && $_SESSION[$cookiepre.'memberkey'] && $curmid && $curmobile)
	{
		
		$session_mid = $_SESSION[$cookiepre.'memberid'];
		$vcnum = randStr(6,'');

		$_SESSION[$cookiepre.$curmobile.'_'.$curmid] = $vcnum;

		$smsmobile = array($curmobile);
		$smscontent = $root['sitename'].'已收到您的手机验证信息，您的验证码：'.$vcnum.',请您登录'.$root['sitename'].'<a href="'.$root['siteurl'].'" target="_blank">www'.$cookiedomain.'</a>'.$root['smssign'];
		$smscfrom = '会员手机号码验证';

		require_once 'open/sms/sms.config.php';	
		$statusCode = sendsms($smsmobile,$smscontent);
		if($statusCode!=null && $statusCode=="0")
		{
			$insert_sms_sql = "insert into ".$sms_table."(mid,shopid,mobiles,content,sendtime,cfrom,ip,audit)values('$session_mid','0','$curmobile','$smscontent','$nowdatetime','$smscfrom','$curip','1')";
			$dblink->query($insert_sms_sql);

			echo 1;
		}
		else{ echo 2;}
	}
	else{ echo 3;}
}

function addfav()
{
	global $dblink,$wishlist_table,$nowdatetime,$cookiepre;
	$shopid = empty($_GET['shopid'])?trim($_POST['shopid']):trim($_GET['shopid']);
	$funid = empty($_GET['funid'])?trim($_POST['funid']):trim($_GET['funid']);
	$mid = empty($_GET['mid'])?trim($_POST['mid']):trim($_GET['mid']);
	$cfrom = empty($_GET['cfrom'])?trim($_POST['cfrom']):trim($_GET['cfrom']);
	$curip = getip();

	if($_SESSION[$cookiepre.'memberid'] && $_SESSION[$cookiepre.'membername'] && $_SESSION[$cookiepre.'membertoken'] && $_SESSION[$cookiepre.'memberkey'] && $shopid && $mid && $cfrom)
	{
		$select_favinfo_sql = "select id from ".$wishlist_table." where audit=1 and isshow=0 and typeid='$funid' and mid='$mid' and shopid='$shopid' limit 0,1";
		$query_favinfo = $dblink->query($select_favinfo_sql);
		$favnum = $dblink->num_rows($query_favinfo);	
		if($favnum==0)
		{
			$insert_favinfo_sql = "insert into ".$wishlist_table."(typeid,mid,shopid,cfrom,addtime,updatetime,ip,audit,isshow)values('$funid','$mid','$shopid','$cfrom','$nowdatetime','$nowdatetime','$curip','1','0')";
			$dblink->query($insert_favinfo_sql);

			echo 1;
		}
		else{ echo 2; }	
	}
	else{ echo 3;}
}

function favtoshop()
{
	global $dblink,$wishlist_table,$nowdatetime,$cookiepre;
	$shopid = empty($_GET['shopid'])?trim($_POST['shopid']):trim($_GET['shopid']);
	$funid = empty($_GET['funid'])?trim($_POST['funid']):trim($_GET['funid']);
	$mid = empty($_GET['mid'])?trim($_POST['mid']):trim($_GET['mid']);
	$cfrom = empty($_GET['cfrom'])?trim($_POST['cfrom']):trim($_GET['cfrom']);
	$curip = getip();

	$funid = $funid?$funid:3;

	if($_SESSION[$cookiepre.'memberid'] && $_SESSION[$cookiepre.'membername'] && $_SESSION[$cookiepre.'membertoken'] && $_SESSION[$cookiepre.'memberkey'] && $shopid && $mid && $cfrom)
	{
		$select_favinfo_sql = "select id from ".$wishlist_table." where audit=1 and isshow=0 and typeid='$funid' and mid='$mid' and shopid='$shopid' limit 0,1";
		$query_favinfo = $dblink->query($select_favinfo_sql);
		$favnum = $dblink->num_rows($query_favinfo);	
		if($favnum==0)
		{
			$insert_favinfo_sql = "insert into ".$wishlist_table."(typeid,mid,shopid,cfrom,addtime,updatetime,ip,audit,isshow)values('$funid','$mid','$shopid','$cfrom','$nowdatetime','$nowdatetime','$curip','1','0')";
			$dblink->query($insert_favinfo_sql);

			echo 1;
		}
		else{ echo 2; }	
	}
	else{ echo 3;}
}

function addfriend()
{
	global $dblink,$member_table,$friends_table,$nowdatetime,$cookiepre;
	$meid = empty($_GET['meid'])?trim($_POST['meid']):trim($_GET['meid']);
	$fid = empty($_GET['fid'])?trim($_POST['fid']):trim($_GET['fid']);
	$curip = getip();

	if($_SESSION[$cookiepre.'memberid'] && $_SESSION[$cookiepre.'membername'] && $_SESSION[$cookiepre.'membertoken'] && $_SESSION[$cookiepre.'memberkey'] && $meid && $fid)
	{
		$select_member_sql = "select id from ".$member_table." where id='$fid' and audit=1 and islock=0 limit 0,1";
		$query_member = $dblink->query($select_member_sql);
		$membernum = $dblink->num_rows($query_member);
		if($membernum==1)
		{
			$insert_friend_sql = "insert into ".$friends_table."(mid,fid,addtime,updatetime,ip,audit,isshow)values('$meid','$fid','$nowdatetime','$nowdatetime','$curip','1','0')";
			$dblink->query($insert_friend_sql);	
		
			echo 1;
		}
		else{ echo 2; }	
	}
	else{ echo 3;}
}

function dishfav()
{
	global $dblink,$favdish_table,$nowdatetime,$cookiepre;
	$shopid = empty($_GET['shopid'])?trim($_POST['shopid']):trim($_GET['shopid']);
	$dishid = empty($_GET['dishid'])?trim($_POST['dishid']):trim($_GET['dishid']);
	$memberid = empty($_GET['memberid'])?trim($_POST['memberid']):trim($_GET['memberid']);
	$curip = getip();


	if($_SESSION[$cookiepre.'memberid'] && $_SESSION[$cookiepre.'membername'] && $_SESSION[$cookiepre.'membertoken'] && $_SESSION[$cookiepre.'memberkey'] && $shopid && $dishid && $memberid)
	{
		$select_favdish_sql = "select id from ".$favdish_table." where audit=1 and isshow=0 and mid='$memberid' and shopid='$shopid' and dishid='$dishid' limit 0,1";
		$query_favdish = $dblink->query($select_favdish_sql);
		$fdnum = $dblink->num_rows($query_favdish);	
		if($fdnum==0)
		{
			$insert_favdish_sql = "insert into ".$favdish_table."(typeid,mid,shopid,dishid,addtime,updatetime,ip,audit,isshow)values('1','$memberid','$shopid','$dishid','$nowdatetime','$nowdatetime','$curip','1','0')";
			$dblink->query($insert_favdish_sql);

			echo 1;
		}
		else{ echo 2; }	
	}
	else{ echo 3;}
}

$dblink->close();

?>