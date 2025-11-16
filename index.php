<?php
// switch (true) {
//     case !isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']):
//     case $_SERVER['PHP_AUTH_USER'] !== 'nitele':
//     case $_SERVER['PHP_AUTH_PW']   !== 'admin':
//         header('WWW-Authenticate: Basic realm="Enter username and password."');
//         header('Content-Type: text/plain; charset=utf-8');
//         die('このページを見るにはログインが必要です');
// }

//PHP設定
ini_set("memory_limit", "2048M");
date_default_timezone_set('Asia/Tokyo');
//ini_set('display_errors', "On");

//キャッシュを残さない設定
header('Expires: Tue, 1 Jan 2019 00:00:00 GMT');
header('Last-Modified:' . gmdate( 'D, d M Y H:i:s' ) . 'GMT');
header('Cache-Control:no-cache,no-store,must-revalidate,max-age=0');
header('Cache-Control:pre-check=0,post-check=0',false);
header('Pragma:no-cache');
header( 'Cache-Control: max-age=0' );

//セッション開始
session_cache_limiter('none');
session_start();

//GETパラメータが無い時
if(!isset($_GET['url'])){$_GET['url'] = "login";}
//GETパラメータを配列に格納
$getParams = explode('/', $_GET['url']);
//振り分け処理
dispatcher($getParams);

function dispatcher($getParams){
    
	//パラメータ取得=========================================================
	$rooting = isset($getParams[0]) && $getParams[0] != "" ? $getParams[0] : "login";
	$method = isset($getParams[1]) ? "action_".$getParams[1] : "action_index";
	$param1 = isset($getParams[2]) ? $getParams[2] : "";
	$param2 = isset($getParams[3]) ? $getParams[3] : "";
	$param3 = isset($getParams[4]) ? $getParams[4] : "";
	$param4 = isset($getParams[5]) ? $getParams[5] : "";
	//======================================================================
	include(dirname(__FILE__).'/app/config/idiorm.php');
	include(dirname(__FILE__).'/app/config/db.php');
	include(dirname(__FILE__).'/app/config/const.php');

	//include(dirname(__FILE__).'/app/config/line/phpQuery-onefile.php');
	//include(dirname(__FILE__).'/app/config/line/line_function.php');
	
	//セッションが無ければリダイレクト（ログイン処理）//=======================
	/*
	if($rooting !== "login" && !isset($_SESSION['loginstate'])){
		header("Location:$urlpath");
	}
	*/
	
	//Common読み込み//======================================================
	include(dirname(__FILE__).'/app/config/common.php');
	//クラス読み込み
        $baseUrlPack = array("login");
	if(in_array($rooting,$baseUrlPack)){
            include(dirname(__FILE__).'/app/controller/'.$rooting.'Controller.php');
	}elseif($rooting != "public" && $rooting != "assets" && $rooting != "favicon.ico"){
            include(dirname(__FILE__).'/app/controller/'.$rooting.'Controller.php');
	}
	
	if($rooting != "public" && $rooting != "assets" && $rooting != "favicon.ico" && $method != "assets"){
		//インスタンス化（コントローラ呼び出し）
		$obj = new $rooting();
		//処理メソッド呼び出し
		try {
			@$obj->$method($param1,$param2,$param3,$param4);
		} catch ( Exception $ex ) {
			exit;
		}
	}
	//======================================================================
}
?>
