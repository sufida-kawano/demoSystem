<?php
class invoice
{
    public function __construct() {
        loginCheck();
    }
    public function action_index()
    {
        $invoiceArr = ORM::for_table('invoice')->where('delete_flg',0)->order_by_desc('id')->find_array();
        $customerArr = ORM::for_table('customer')->where('delete_flg',0)->order_by_desc('id')->find_array();
        $customerNameArr = array();
        foreach ((array) $customerArr as $key => $value) {
            $customerContents = json_decode($value['contents_json'], true);
            $customerNameArr[$value['id']] = $customerContents['company_name'];
        }
        //View呼び出し
        include_once(dirname(__FILE__). "/../view/invoice_list.php");
    }
    public function action_operation($targetId)
    {
        $targetId = $targetId === '' ? null : $targetId;
        $invoiceObj = ORM::for_table('invoice')->where('id',$targetId)->find_one();
        $contents = json_decode($invoiceObj->contents_json,true);
        $subContents = json_decode($invoiceObj->sub_contents_json,true);
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
        include_once(dirname(__FILE__). "/../view/invoice_operation.php");
    }
    // 登録・更新処理
    public function action_processing($targetId)
    {
        $contents = isset($_POST['contents']) ? $_POST['contents'] : array();
        $subContents = isset($_POST['subContents']) ? $_POST['subContents'] : array();

        try {
            $invoiceObj = ORM::for_table('invoice')->where('id',$targetId)->find_one();
            if($invoiceObj){
                $invoiceObj->updated_at = date('Y-m-d H:i:s');
                $_SESSION['result']['message'] = '更新が完了しました';
                $_SESSION['result']['num'] = 2;
            }else{
                $invoiceObj = ORM::for_table('invoice')->create();
                $invoiceObj->created_at = date('Y-m-d H:i:s');
                $_SESSION['result']['message'] = '登録が完了しました';
                $_SESSION['result']['num'] = 1;
            }
            $invoiceObj->contents_json = json_encode($contents,true);
            $invoiceObj->sub_contents_json = json_encode($subContents,true);
            $invoiceObj->save();
            $targetId = $invoiceObj->id;

        } catch (Exception $e) {
            echo 'エラー内容: ',  $e->getMessage(), "\n";
            exit;
        }
        redirectUrl("/invoice/operation/$targetId");
    }
        public function action_print($targetId)
    {
        // 請求書情報
        $invoiceObj = ORM::for_table('invoice')->where('id',$targetId)->find_one();
        $contents = json_decode($invoiceObj->contents_json,true);
        $subContents = json_decode($invoiceObj->sub_contents_json,true);

        // 顧客管理情報
        $customerObj = ORM::for_table('customer')->where('id',$contents['customer_id'])->where('delete_flg',0)->find_one();
        $customerContents = json_decode($customerObj->contents_json,true);

        //View呼び出し
        include_once(dirname(__FILE__). "/../view/invoice_print.php");
    }
}
