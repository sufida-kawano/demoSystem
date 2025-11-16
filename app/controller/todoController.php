<?php
class todo
{
    public function __construct() {
        loginCheck();
    }
    public function action_index()
    {
        $todoArr = ORM::for_table('todo')->where('delete_flg',0)->order_by_desc('id')->find_array();
        if(isset($_SESSION['message'])){
            $resultMeg = $_SESSION['message']['result'];
            unset($_SESSION['message']);
        }
        //View呼び出し
        include_once(dirname(__FILE__). "/../view/todo_list.php");
    }
    public function action_edit($targetId)
    {
        $todoObj = ORM::for_table('todo')->where('id',$targetId)->find_one();
        $contents = json_decode($todoObj->contents_json,true);

        //View呼び出し
        include_once(dirname(__FILE__). "/../view/todo_edit.php");
    }
    public function action_execution($targetId)
    {
      
        $contents = isset($_POST['contents']) ? $_POST['contents'] : array();

        try {
            // idiorm 接続
            $executionObj = ORM::for_table('todo')->where('id',$targetId)->find_one();
            if($executionObj){
                $executionObj->updated_at = date('Y-m-d H:i:s');
                $_SESSION['message']['result'] = '更新が完了しました';
            }else{
                $executionObj = ORM::for_table('todo')->create();
                $executionObj->created_at = date('Y-m-d H:i:s');
                $_SESSION['message']['result'] = '登録が完了しました';
            }
            $executionObj->contents_json = json_encode($contents,true);
            $executionObj->save();

        } catch (Exception $e) {
            echo 'エラー内容: ',  $e->getMessage(), "\n";
            exit;
        }
        redirectUrl("/todo");
    }
    public function action_delete($targetId)
    {
        try {
            // idiorm 接続
            $executionObj = ORM::for_table('todo')->where('id',$targetId)->find_one();
            $executionObj->delete_flg =1;
            $executionObj->deleted_at = date('Y-m-d H:i:s');
            $executionObj->save();
        } catch (Exception $e) {
            echo 'エラー内容: ',  $e->getMessage(), "\n";
            exit;
        }
        $_SESSION['message']['result'] = '削除が完了しました';
        redirectUrl("/todo");
    }
    public function action_complete($targetId)
    {
        try {
            // idiorm 接続
            $executionObj = ORM::for_table('todo')->where('id',$targetId)->find_one();
            $executionObj->complete_flg =1;
            $executionObj->updated_at = date('Y-m-d H:i:s');
            $executionObj->save();
        } catch (Exception $e) {
            echo 'エラー内容: ',  $e->getMessage(), "\n";
            exit;
        }
        $_SESSION['message']['result'] = 'ステータス変更が完了しました';
        redirectUrl("/todo");
    }
}
