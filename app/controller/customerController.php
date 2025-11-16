<?php
class customer
{
    public function __construct() {
        loginCheck();
    }
    public function action_index()
    {
        // 顧客マスタDBからデータの取得
        $viewList = ORM::for_table('customer')->where('delete_flg',0)->order_by_desc('id')->find_array();
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
        include_once(dirname(__FILE__). "/../view/customer_list.php");
    }
    // 登録・更新ページ
    public function action_operation($targetId)
    {
        $targetId = $targetId === '' ? null : $targetId;
        $customerObj = ORM::for_table('customer')->where('id',$targetId)->find_one();
        $contents = json_decode($customerObj->contents_json,true);

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
        include_once(dirname(__FILE__). "/../view/customer_operation.php");
    }
    // 登録・更新処理
    public function action_processing($targetId)
    {
        $contents = isset($_POST['contents']) ? $_POST['contents'] : array();

        try {
            $customerObj = ORM::for_table('customer')->where('id',$targetId)->find_one();
            if($customerObj){
                $customerObj->updated_at = date('Y-m-d H:i:s');
                $_SESSION['result']['message'] = '更新が完了しました';
                $_SESSION['result']['num'] = 2;
            }else{
                $customerObj = ORM::for_table('customer')->create();
                $customerObj->created_at = date('Y-m-d H:i:s');
                $_SESSION['result']['message'] = '登録が完了しました';
                $_SESSION['result']['num'] = 1;
            }
            $customerObj->contents_json = json_encode($contents,true);
            $customerObj->save();
            $targetId = $customerObj->id;

        } catch (Exception $e) {
            echo 'エラー内容: ',  $e->getMessage(), "\n";
            exit;
        }
        redirectUrl("/customer/operation/$targetId");
    }
    public function action_delete($targetId)
    {
        try {
            // idiorm 接続
            $customerObj = ORM::for_table('customer')->where('id',$targetId)->find_one();
            $customerObj->delete_flg =1;
            $customerObj->deleted_at = date('Y-m-d H:i:s');
            $customerObj->save();
            $_SESSION['result']['message'] = '削除が完了しました';
            $_SESSION['result']['num'] = 3;
        } catch (Exception $e) {
            echo 'エラー内容: ',  $e->getMessage(), "\n";
            exit;
        }
        redirectUrl("/customer");
    }
}
