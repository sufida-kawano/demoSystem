<?php
class Login
{
    public function __construct()
    {
    }
    public function action_index()
    {
        // var_dump(password_hash(1234, PASSWORD_DEFAULT));
        // exit;
       // ログインが成功している状態であれば、フロントページに遷移
        loginCheckFirst();
        // セッションからエラーメッセージを取得して、セッションから削除
        $errmessage = isset($_SESSION['LOGIN']['ERRMESSAGE']) ? htmlspecialchars($_SESSION['LOGIN']['ERRMESSAGE']) : '';
        //View呼び出し
        include_once(dirname(__FILE__) . "/../view/login.php");
    }
    public function action_logout()
    {
        $_SESSION = array();
        session_destroy();
        //View呼び出し
        redirectUrl('/login');
    }
    public function action_cheak()
    {
        // POST以外でのアクセスの場合
        if (empty($_POST)) {
            die('正規のアクセス方法ではないためアクセスできません。');
        }

        $loginID = htmlspecialchars($_POST['login_id']) ?? '';
        $loginPassword = htmlspecialchars($_POST['login_password']) ?? '';
        
        // ログイン情報の取得
        $accountObj = ORM::for_table('account')->where('login_id', $loginID)->find_one();
        $adminLoginPassword = $accountObj->login_password;
        $targetid = $accountObj->id;

        // ログインパスワードと、ハッシュ化しているパスワードがあっているかの照合
        if (password_verify($loginPassword, $adminLoginPassword)) {
            // IDをセッションに格納
            $_SESSION['LOGIN']['LOGIN_STATUS'] = uniqid(rand() . '_');
            $_SESSION['LOGIN']['ACCOUNT_ID'] = $targetid;

        } else {
            // ログイン内容が一致しない時は、エラー内容をログイン画面に表示
            $_SESSION['LOGIN']['ERRMESSAGE'] = "ID,パスワードが一致しませんでした。";
        }
        // 管理画面に遷移
        redirectUrl('/login');
    }
}