<?php
//redirect
function redirectUrl($path)
{
	header('Location:' . SYSTEM_DIR . $path);
	exit;
}

//user login check
function loginCheckFirst()
{
	if (isset($_SESSION['LOGIN']['LOGIN_STATUS'])) {
		header('Location:' . SYSTEM_DIR . '/todo');
		exit;
	}
}

//user login check
function loginCheck()
{
	if (!isset($_SESSION['LOGIN']['LOGIN_STATUS'])) {
		header('Location:' . SYSTEM_DIR . '/login/logout');
		exit;
	}
}

/**************
 * 暗号化
 ***************/
function encveldom($target)
{
	$key = 'brandingstyle46509';
	$c_t = openssl_encrypt($target, 'AES-128-ECB', $key);
	return $c_t;
}
/**************
 * 複合化
 ***************/
function decveldom($c_t)
{
	$key = 'brandingstyle46509';
	$p_t = openssl_decrypt($c_t, 'AES-128-ECB', $key);
	return $p_t;
}

/**************
 * 不可逆暗号
 ***************/
function register_password($string)
{
	return password_hash($string, PASSWORD_DEFAULT);
}


// ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
// ページング系の関数
// ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function paging_pagesekect($listPageList, $pageselect)
{
	echo "<select id='pageselect_base' name=''>";
	foreach ((array)$listPageList as $pageNo) {

		$page = $pageNo + 1;
		if ($page == $pageselect) {
			echo "<option value='$page' selected>$page</option>";
		} else {
			echo "<option value='$page'>$page</option>";
		}
	}
	echo "</select>";
}
