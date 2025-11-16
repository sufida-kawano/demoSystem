<?php
class apo
{
    public function __construct() {
        loginCheck();
    }
    public function action_index()
    {
        $apoArr = ORM::for_table('apo')->where('delete_flg',0)->order_by_desc('id')->find_array();
        $customerArr = ORM::for_table('customer')->where('delete_flg',0)->order_by_desc('id')->find_array();
        $customerNameArr = array();
        foreach ((array) $customerArr as $key => $value) {
            $customerContents = json_decode($value['contents_json'], true);
            $customerNameArr[$value['id']] = $customerContents['company_name'];
        }
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
        include_once(dirname(__FILE__). "/../view/apo_list.php");
    }
    public function action_operation($targetId)
    {
        $targetId = $targetId === '' ? null : $targetId;
        $todoObj = ORM::for_table('apo')->where('id',$targetId)->find_one();
        $contents = json_decode($todoObj->contents_json,true);
        $customerArr = ORM::for_table('customer')->where('delete_flg',0)->order_by_desc('id')->find_array();

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
        include_once(dirname(__FILE__). "/../view/apo_edit.php");
    }
    public function action_processing($targetId)
    {
        $contents = isset($_POST['contents']) ? $_POST['contents'] : array();

        try {
            $apoObj = ORM::for_table('apo')->where('id',$targetId)->find_one();
            if($apoObj){
                $apoObj->updated_at = date('Y-m-d H:i:s');
                $_SESSION['result']['message'] = '更新が完了しました';
                $_SESSION['result']['num'] = 2;
            }else{
                $apoObj = ORM::for_table('apo')->create();
                $apoObj->created_at = date('Y-m-d H:i:s');
                $_SESSION['result']['message'] = '登録が完了しました';
                $_SESSION['result']['num'] = 1;
            }
            $apoObj->contents_json = json_encode($contents,true);
            $apoObj->save();
            $targetId = $apoObj->id;

        } catch (Exception $e) {
            echo 'エラー内容: ',  $e->getMessage(), "\n";
            exit;
        }
        redirectUrl("/apo/operation/$targetId");
    }
    public function action_delete($targetId)
    {
        try {
            // idiorm 接続
            $executionObj = ORM::for_table('apo')->where('id',$targetId)->find_one();
            $executionObj->delete_flg =1;
            $executionObj->deleted_at = date('Y-m-d H:i:s');
            $executionObj->save();
            $_SESSION['result']['message'] = '削除が完了しました';
            $_SESSION['result']['num'] = 3;
        } catch (Exception $e) {
            echo 'エラー内容: ',  $e->getMessage(), "\n";
            exit;
        }
        redirectUrl("/apo");
    }
}
