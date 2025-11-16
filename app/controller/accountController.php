<?php
class account
{
    public function __construct() {
        loginCheck();
    }
    public function action_index()
    {
        $loginAccountId = (int)$_SESSION['LOGIN']['ACCOUNT_ID'] ?? '';
        $accountObj = ORM::for_table('account')->where('id',$loginAccountId)->find_one();
        $targetId = $accountObj->id;
        $contents = json_decode($accountObj->contents_json,true);

        $resultMeg = false;
        $resultNum = false;
        if(isset($_SESSION['result'])){
            // メッセージ
            $resultMeg = $_SESSION['result']['message'];
            $resultNum = $_SESSION['result']['num'];
            // セッションを削除
            unset($_SESSION['result']);
        }
        //View呼び出し
        include_once(dirname(__FILE__). "/../view/account_operation.php");
    }
    // 登録・更新処理
    public function action_processing($targetId)
    {
        $contents = isset($_POST['contents']) ? $_POST['contents'] : array();
        $loginId = isset($_POST['login_id']) ? $_POST['login_id'] : "";
        $loginPassword = isset($_POST['login_password']) ? $_POST['login_password'] : "";

        try {
            $accountObj = ORM::for_table('account')->where('id',$targetId)->find_one();
            if($accountObj){
                $accountObj->updated_at = date('Y-m-d H:i:s');
                $_SESSION['result']['message'] = '更新が完了しました';
                $_SESSION['result']['num'] = 2;
            }else{
                $accountObj = ORM::for_table('account')->create();
                $accountObj->created_at = date('Y-m-d H:i:s');
                $_SESSION['result']['message'] = '登録が完了しました';
                $_SESSION['result']['num'] = 1;
            }
            $accountObj->contents_json = json_encode($contents,true);
            if ($loginId != "") {
                $accountObj->login_id = $loginId;
            }
            if ($loginPassword != "") {
                $accountObj->login_password = password_hash($loginPassword, PASSWORD_DEFAULT);
            }
            $accountObj->save();
            $targetId = $accountObj->id;

        } catch (Exception $e) {
            echo 'エラー内容: ',  $e->getMessage(), "\n";
            exit;
        }
        redirectUrl("/account");
    }
    public function action_delete($targetId)
    {
        try {
            // idiorm 接続
            $accountObj = ORM::for_table('account')->where('id',$targetId)->find_one();
            $accountObj->delete_flg =1;
            $accountObj->deleted_at = date('Y-m-d H:i:s');
            $accountObj->save();
            $_SESSION['result']['message'] = '削除が完了しました';
            $_SESSION['result']['num'] = 3;
        } catch (Exception $e) {
            echo 'エラー内容: ',  $e->getMessage(), "\n";
            exit;
        }
        redirectUrl("/account");
    }
}
